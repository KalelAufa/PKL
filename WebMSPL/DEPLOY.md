# Panduan Deploy WebMSPL ke VPS (Ubuntu + Nginx)

Panduan lengkap deploy **PT Mentari Satya Perkasa** ke VPS.
Stack: **Ubuntu 22.04/24.04 · PHP 8.3 · MariaDB/MySQL · Nginx · Composer · Node.js**

> ⚠️ Tanda yang **WAJIB DIGANTI** diberi `⚠️ GANTI:` di awal baris.
> Baca **Bagian 0 — Persiapan** dulu sebelum mulai.

---

## Daftar Isi

0. [Persiapan (WAJIB dibaca dulu)](#0-persiapan)
1. [Install LEMP Stack](#1-install-lemp-stack)
2. [Buat Database + User](#2-buat-database--user)
3. [Deploy Kode](#3-deploy-kode)
4. [Setup Laravel](#4-setup-laravel)
5. [Permission File](#5-permission-file)
6. [Konfigurasi Nginx](#6-konfigurasi-nginx)
7. [HTTPS Let's Encrypt](#7-https-lets-encrypt)
8. [Verifikasi & Troubleshooting](#8-verifikasi--troubleshooting)

---

## 0. Persiapan

Sebelum deploy, siapkan 4 hal berikut. Semua WAJIB ada, kalau tidak proses akan gagal di tengah.

### 0.1 GD Extension aktif (PALING KRUSIAL)

Aplikasi ini memakai fungsi `imagecreatefromjpeg()` / `imagecreatefrompng()` / `imagecreatefromwebp()` di `app/Helpers/ImageHelper.php` untuk **konversi semua upload gambar ke WebP**.

**Tanpa GD extension, semua fitur upload gambar (berita, layanan, tim, logo) akan CRASH.**

Cara cek setelah PHP terinstall (di VPS):

```bash
php -m | grep gd
```

Harus muncul `gd`. Kalau tidak muncul, install:

```bash
sudo apt install -y php8.3-gd
sudo systemctl restart php8.3-fpm
```

### 0.2 Gmail App Password (untuk kirim email)

Aplikasi mengirim email balasan contact form via SMTP. Kalau pakai Gmail:

1. Buka https://myaccount.google.com/ → **Keamanan** → aktifkan **Verifikasi 2 Langkah (2FA)**.
2. Setelah 2FA aktif, buka https://myaccount.google.com/apppasswords
3. Pilih **App** = "Mail", **Device** = "Lainnya" → isi "WebMSPL VPS".
4. Salin password 16 karakter yang muncul (format `xxxx xxxx xxxx xxxx`).
5. Simpan — ini ⚠️ **GANTI** di `.env` bagian `MAIL_PASSWORD` (tanpa spasi).

> Alternatif non-Gmail: Mailgun, Amazon SES, Mailtrap (dev), atau SMTP hosting sendiri. Ganti `MAIL_HOST` / `MAIL_PORT` / `MAIL_USERNAME` sesuai provider.

### 0.3 Domain pointing ke IP VPS

1. Beli / punya domain (contoh: `ptmsp.co.id`).
2. Di DNS manager (Cloudflare / Niagahoster / provider domain), buat **A record**:
   - **Name**: `@` (root) atau subdomain `www`
   - **Type**: `A`
   - **Value**: IP publik VPS (contoh `103.123.45.67`)
   - **TTL**: Auto / 1 jam
3. Tunggu propagasi (bisa 5 menit — 24 jam). Cek dengan:
   ```bash
   ping domain-anda.com
   ```
   Kalau muncul IP VPS, berarti sudah jalan.

> Gunakan `www` dan `@` dua-duanya kalau mau keduanya bisa diakses.

### 0.4 Repo Git (pastikan `.env` TIDAK ter-commit)

`.env` berisi password DB, APP_KEY, credential email — **JANGAN PERNAH** masuk ke git.

1. **Cek `.gitignore`** sudah berisi (seharusnya sudah):
   ```bash
   cat .gitignore | grep ".env"
   ```
   Harus ada baris `.env`. Kalau tidak, tambahkan:
   ```bash
   echo ".env" >> .gitignore
   ```

2. **Cek `.env` belum ter-commit**:
   ```bash
   git ls-files | grep ".env"
   ```
   Kalau command ini menampilkan `.env`, berarti sudah terlanjur ter-commit → jalankan:
   ```bash
   git rm --cached .env
   git commit -m "chore: remove .env from tracking"
   ```

3. **Push semua perubahan ke remote** (GitHub / GitLab / Bitbucket):
   ```bash
   git add .
   git commit -m "feat: prepare for production deploy"
   git push origin main
   ```

4. **Catatan penting**: `public/build/` dan `public/storage/` juga di-ignore (dibuat ulang saat build di VPS). Jadi jangan khawatir kalau folder itu tidak ada di repo.

---

## 1. Install LEMP Stack

SSH ke VPS:

```bash
ssh root@IP-VPS-ANDA   # ⚠️ GANTI: IP VPS
```

Update sistem:

```bash
sudo apt update && sudo apt upgrade -y
```

Tambah repo PHP 8.3 (Laravel 13 wajib PHP 8.3):

```bash
sudo apt install -y software-properties-common
sudo add-apt-repository -y ppa:ondrej/php
sudo apt update
```

Install PHP + extensions (⚠️ **GD** wajib, jangan skip):

```bash
sudo apt install -y \
  php8.3-fpm \
  php8.3-cli \
  php8.3-mysql \
  php8.3-mbstring \
  php8.3-xml \
  php8.3-curl \
  php8.3-zip \
  php8.3-gd \
  php8.3-bcmath \
  php8.3-intl \
  php8.3-sqlite3
```

Install tools lain:

```bash
sudo apt install -y git nginx mariadb-server composer nodejs npm unzip
```

> ⚠️ Kalau `npm` versi lama (< 18), install Node versi baru:
> ```bash
> curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
> sudo apt install -y nodejs
> ```

Verifikasi semua:

```bash
php -v          # harus PHP 8.3.x
php -m | grep gd   # ⚠️ harus muncul "gd"
composer --version
node -v         # harus v18 atau v20
nginx -v
```

---

## 2. Buat Database + User

Masuk ke MariaDB:

```bash
sudo mysql
```

Jalankan SQL berikut (⚠️ GANTI `STRONG_PASSWORD` dengan password kuat buatan sendiri):

```sql
CREATE DATABASE webmspl CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'webmspl'@'localhost' IDENTIFIED BY 'STRONG_PASSWORD';
GRANT ALL PRIVILEGES ON webmspl.* TO 'webmspl'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

> ⚠️ Simpan password ini. Nanti dipakai di `.env` bagian `DB_PASSWORD`.

---

## 3. Deploy Kode

Pindah ke direktori web:

```bash
cd /var/www
```

Clone repo (⚠️ GANTI URL repo):

```bash
sudo git clone https://github.com/USERNAME/WebMSPL.git webmspl
# ⚠️ GANTI USERNAME/WebMSPL dengan URL repo kamu
```

Masuk folder project:

```bash
cd webmspl
```

Install dependency PHP (production mode — tanpa dev deps):

```bash
composer install --no-dev --optimize-autoloader
```

Install dependency JS + build asset:

```bash
npm install
npm run build
```

> ⚠️ `npm run build` WAJIB dijalankan. Kalau skip, CSS/JS tidak akan muncul (halaman blank).

Buat file `.env` dari template:

```bash
cp .env.example .env
```

Edit `.env`:

```bash
nano .env
```

Isi `.env` production (⚠️ GANTI semua yang bertanda):

```ini
APP_NAME="PT Mentari Satya Perkasa"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com
# ⚠️ GANTI domain-anda.com dengan domain asli

APP_LOCALE=id
APP_FALLBACK_LOCALE=id
APP_FAKER_LOCALE=id_ID

# DB (⚠️ GANTI password sesuai yang dibuat di Bagian 2)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webmspl
DB_USERNAME=webmspl
DB_PASSWORD=STRONG_PASSWORD

# MAIL (⚠️ GANTI sesuai Gmail App Password di Bagian 0.2)
MAIL_MAILER=smtp
MAIL_SCHEME=tls
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=email-anda@gmail.com
MAIL_PASSWORD=xxxxxxxxxxxxxxxx
MAIL_FROM_ADDRESS=info@ptmsp.co.id
MAIL_FROM_NAME="PT Mentari Satya Perkasa"

# SESSION (HTTPS)
SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=true
SESSION_SECURE_COOKIE=true

# LOG (⚠️ wajib daily + info agar log ringkas & rotate harian)
LOG_CHANNEL=daily
LOG_LEVEL=info
LOG_DAILY_DAYS=14

# QUEUE & CACHE (file cukup untuk trafik kecil-menengah)
QUEUE_CONNECTION=sync
CACHE_STORE=file

# Admin seed (⚠️ GANTI password admin kuat — dipakai saat migrate --seed)
ADMIN_SEED_PASSWORD=admin-kuat-2026
```

Simpan: `Ctrl+O` → Enter → `Ctrl+X`.

---

## 4. Setup Laravel

Generate app key:

```bash
php artisan key:generate
```

Migrasi database + seed admin (⚠️ seed butuh `ADMIN_SEED_PASSWORD` di `.env`):

```bash
php artisan migrate --seed
```

> 🚫 **JANGAN import `database.sql` di production.**
>
> File `database.sql` di repo adalah **dump database dev lokal** yang berisi:
> - Password hash admin dev (bisa ditebak)
> - `remember_token` session aktif (risiko hijack)
> - Data test (`tes-1`, `tes@companny`, dsb)
>
> Selalu pakai `php artisan migrate --seed` agar skema dibangun bersih + admin dibuat dari `ADMIN_SEED_PASSWORD` di `.env`.
> `database.sql` hanya untuk backup/restore **dev lokal**, bukan production.

Buat symlink storage (agar gambar WebP yang di-upload bisa diakses publik):

```bash
php artisan storage:link
```

Cache konfigurasi (wajib production, mempercepat load):

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

> Setelah edit `.env` di kemudian hari, jalankan ulang:
> ```bash
> php artisan config:clear && php artisan config:cache
> ```

---

## 5. Permission File

⚠️ **PALING SERING TERLUPAKAN** — tanpa ini, upload gambar dan cache gagal.

```bash
cd /var/www/webmspl

# Ubah kepemilikan ke user web server (www-data)
sudo chown -R www-data:www-data .

# Storage & cache wajib writable (termasuk storage/logs untuk log)
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache

# Cache purifier (mews/purifier — dipakai untuk sanitasi konten)
sudo mkdir -p storage/app/purifier
sudo chmod -R 775 storage/app/purifier

# Folder upload gambar publik
sudo mkdir -p public/images
sudo chmod -R 775 public/images
```

> ⚠️ Aplikasi menyimpan gambar upload ke `public/images/` dan `storage/app/public/news/`. Pastikan `www-data` bisa tulis di sana.

---

## 6. Konfigurasi Nginx

Buat file config (⚠️ GANTI `domain-anda.com`):

```bash
sudo nano /etc/nginx/sites-available/webmspl
```

Isi dengan:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name domain-anda.com www.domain-anda.com;
    # ⚠️ GANTI domain-anda.com

    root /var/www/webmspl/public;
    index index.php index.html;

    charset utf-8;

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header Referrer-Policy "strict-origin-when-cross-origin" always;

    # Upload size (sesuaikan dengan max upload gambar)
    client_max_body_size 10M;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Static assets — cache 1 tahun
    location ~* \.(css|js|jpg|jpeg|png|gif|webp|svg|ico|woff|woff2)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
        access_log off;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Laravel .env — blokir akses langsung
    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Simpan, aktifkan, test:

```bash
sudo ln -s /etc/nginx/sites-available/webmspl /etc/nginx/sites-enabled/
sudo nginx -t          # harus "syntax is ok" + "test is successful"
sudo systemctl reload nginx
```

---

## 7. HTTPS Let's Encrypt

Install Certbot:

```bash
sudo apt install -y certbot python3-certbot-nginx
```

Generate sertifikat SSL (⚠️ GANTI domain):

```bash
sudo certbot --nginx -d domain-anda.com -d www.domain-anda.com
```

Certbot otomatis ubah config Nginx + redirect HTTP → HTTPS. Test auto-renew:

```bash
sudo certbot renew --dry-run
```

---

## 8. Verifikasi & Troubleshooting

### 8.1 Cek aplikasi jalan

1. Buka `https://domain-anda.com` di browser.
2. Pastikan:
   - ✅ CSS/JS terload (tidak blank)
   - ✅ Gambar tampil
   - ✅ Login admin jalan di `/admin/login`
   - ✅ Upload gambar berhasil (WebP)

### 8.2 Cek log kalau error

```bash
# Laravel log (⚠️ daily mode = nama file per hari)
sudo tail -f /var/www/webmspl/storage/logs/laravel-$(date +%Y-%m-%d).log

# Atau semua log hari ini
ls -la /var/www/webmspl/storage/logs/

# Nginx error log
sudo tail -f /var/log/nginx/error.log

# PHP-FPM error log
sudo tail -f /var/log/php8.3-fpm.log
```

### 8.2.1 Format log (sudah ter-redact PII)

Log memakai format ringkas + redact otomatis untuk data sensitif.

**Format:**
```
[2026-08-13 14:32:05] local.INFO: News updated {"id":12,"title":"Sertifikasi ISO","by":"Super Admin"}
```

**Contoh lengkap:**
```
[2026-08-13 08:15:42] local.INFO: User logged in {"email":"[EMAIL]","role":"admin","ip":"[IP]"}
[2026-08-13 09:31:00] local.WARNING: Login failed {"email":"[EMAIL]","ip":"[IP]"}
[2026-08-13 10:02:33] local.INFO: Contact message received {"name":"Budi Santoso","email":"[EMAIL]","service":"outsourcing"}
[2026-08-13 10:02:36] local.ERROR: Contact reply failed {"email":"[EMAIL]","error":"Connection timed out"}
[2026-08-13 11:20:10] local.INFO: Image converted to WebP {"original":"foto-tim.jpg","saved":"news/9f8e7d6c.webp","size_kb":145}
[2026-08-13 13:00:00] local.INFO: News created {"title":"Sertifikasi ISO","author":"Super Admin"}
[2026-08-13 15:00:00] local.WARNING: Contact rate limit exceeded {"ip":"[IP]"}
```

**Keamanan data sensitif (otomatis redact):**
| Data | Jadi di log |
|------|-------------|
| Email (`user@domain.com`) | `[EMAIL]` |
| IP (`103.123.45.67`) | `[IP]` |
| `password`, `token`, `api_key`, `secret`, `cookie` | `[REDACTED]` |

**Level log:**
| Level | Arti | Kapan |
|-------|------|-------|
| `INFO` | Operasi normal | Login, CRUD, upload sukses |
| `WARNING` | Perlu perhatian | Login gagal, rate limit |
| `ERROR` | Ada yang rusak | Email gagal, DB down, upload gagal |
| `CRITICAL` | Darurat | Out of memory, app crash |

**Mencari log spesifik:**
```bash
# Cari error hari ini
grep "ERROR" /var/www/webmspl/storage/logs/laravel-$(date +%Y-%m-%d).log

# Cari aktivitas satu admin
grep "by.*Super Admin" /var/www/webmspl/storage/logs/laravel-$(date +%Y-%m-%d).log

# Cari semua login
grep "User logged in" /var/www/webmspl/storage/logs/laravel-$(date +%Y-%m-%d).log
```

> ⚠️ Kalau perlu debug penuh (lihat stack trace + data lengkap), set sementara:
> ```bash
> nano .env   # ubah LOG_LEVEL=debug
> php artisan config:clear
> ```
> Setelah selesai, kembalikan ke `LOG_LEVEL=info` + `php artisan config:cache`.

### 8.3 Masalah umum

| Gejala | Penyebab | Solusi |
|--------|----------|--------|
| Halaman blank, CSS hilang | `npm run build` belum dijalankan | `cd /var/www/webmspl && npm run build` |
| Upload gambar error | GD tidak aktif | `sudo apt install php8.3-gd && sudo systemctl restart php8.3-fpm` |
| 500 Internal Server Error | Permission storage | `chown -R www-data:www-data storage bootstrap/cache` |
| 403 Forbidden | `.env` akses diblokir | Cek config Nginx `location ~ /\.(?!well-known)` |
| Email tidak terkirim | SMTP salah | Cek `MAIL_*` di `.env`, test via `php artisan tinker` |
| Konfigurasi berubah tapi tidak efek | Config cache | `php artisan config:clear && php artisan config:cache` |
| Login admin gagal | Seeder belum jalan / password salah | `php artisan migrate --seed` + cek `ADMIN_SEED_PASSWORD` |

### 8.4 Update aplikasi setelah deploy

Setiap kali ada perubahan kode:

```bash
cd /var/www/webmspl
git pull origin main

composer install --no-dev --optimize-autoloader
npm install && npm run build

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

sudo chown -R www-data:www-data storage bootstrap/cache
```

---

## Ringkasan — Checklist Deploy

- [ ] GD extension aktif (`php -m | grep gd`)
- [ ] Gmail App Password dibuat (0.2)
- [ ] Domain A record pointing ke VPS (0.3)
- [ ] `.env` TIDAK ter-commit (0.4)
- [ ] PHP 8.3 + extensions terinstall (1)
- [ ] Database + user dibuat (2)
- [ ] Kode ter-clone, `composer install`, `npm run build` (3)
- [ ] `.env` production terisi benar (3)
- [ ] `php artisan key:generate` + `migrate --seed` + `storage:link` (4)
- [ ] Permission `www-data` di storage/bootstrap (5)
- [ ] Nginx config aktif + test ok (6)
- [ ] HTTPS certbot jalan (7)
- [ ] App dicek di browser, upload gambar berhasil (8)
- [ ] Log aktif: `LOG_CHANNEL=daily`, `LOG_LEVEL=info`, cek `storage/logs/laravel-YYYY-MM-DD.log` (8.2)
- [ ] Log ter-redact: email→`[EMAIL]`, IP→`[IP]`, password→`[REDACTED]` (8.2.1)
