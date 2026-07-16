Kamu adalah **senior Node.js developer** yang ahli dalam membangun sistem automation WhatsApp menggunakan library **Baileys (WhiskeySockets)**, dengan pengalaman mendalam dalam:
- Arsitektur CLI application berbasis Node.js
- Manajemen session WhatsApp Web protocol
- Sistem broadcast skala besar dengan anti-ban mechanism
- File system automation dan dynamic module loading
- Excel/CSV parsing dan data validation

---

## MISI UTAMA

Bangun sebuah **WhatsApp Broadcasting Bot berbasis CLI (terminal)** menggunakan **Node.js + Baileys** yang berfungsi sebagai **mesin distribusi promosi katalog produk otomatis**. Sistem ini harus mampu:
1. Mengelola katalog produk bertingkat (kategori → subkategori → produk) via folder structure
2. Broadcast pesan ke ratusan target dari file Excel/CSV
3. Beroperasi **100% via terminal** tanpa GUI/dashboard web
4. Auto-detect produk baru tanpa mengubah source code
5. Melindungi akun WhatsApp dari spam detection dan ban

---

## STACK TEKNOLOGI

```
Runtime       : Node.js v18+ (ES Modules atau CommonJS)
WA Library    : @whiskeysockets/baileys (versi terbaru)
Excel Parser  : xlsx / exceljs
CLI Interface : inquirer / prompts / clack
Logging       : winston atau pino
Scheduler     : node-cron (optional, untuk fitur lanjutan)
Utilities     : fs-extra, path, chalk, ora, cli-table3
Validation    : libphonenumber-js (validasi nomor Indonesia)
```

---

## STRUKTUR FOLDER PROJECT

Buat struktur folder berikut secara lengkap dan jelaskan fungsi setiap file/folder:

```
wa-broadcast-bot/
│
├── index.js                        # Entry point utama
├── package.json
├── .env                            # Config environment
├── .gitignore
│
├── src/
│   ├── core/
│   │   ├── whatsapp.js             # Koneksi & session Baileys
│   │   ├── broadcaster.js          # Engine broadcast utama
│   │   ├── sessionManager.js       # QR code & session persistence
│   │   └── rateLimiter.js          # Anti-spam & delay logic
│   │
│   ├── catalog/
│   │   ├── catalogScanner.js       # Auto-scan folder katalog
│   │   ├── productLoader.js        # Load config produk
│   │   └── templateEngine.js       # Render template pesan
│   │
│   ├── targets/
│   │   ├── excelParser.js          # Import & parse Excel/CSV
│   │   ├── numberValidator.js      # Validasi nomor Indonesia
│   │   └── deduplicator.js         # Hapus duplikat target
│   │
│   ├── campaign/
│   │   ├── campaignManager.js      # Manajemen campaign
│   │   ├── progressTracker.js      # Track progress broadcast
│   │   └── resumeHandler.js        # Resume campaign terhenti
│   │
│   ├── cli/
│   │   ├── menu.js                 # Menu interaktif terminal
│   │   ├── selector.js             # Pilih kategori/produk
│   │   └── display.js              # Tampilan terminal (chalk)
│   │
│   └── utils/
│       ├── logger.js               # Winston logger
│       ├── fileHelper.js           # File system utilities
│       └── formatter.js            # Format pesan & data
│
├── campaigns/                      # Katalog produk bertingkat
│   ├── [kategori]/
│   │   ├── [subkategori]/
│   │   │   └── [produk]/
│   │   │       ├── product.json    # Konfigurasi produk
│   │   │       ├── templates/
│   │   │       │   ├── template1.txt
│   │   │       │   └── template2.txt
│   │   │       └── images/
│   │   │           ├── image1.jpg
│   │   │           └── image2.jpg
│
├── targets/                        # File Excel/CSV target
│   └── [nama-target].xlsx
│
├── logs/                           # Log campaign otomatis
│   └── campaign-[timestamp].json
│
├── sessions/                       # Session WhatsApp (auto-generated)
│   └── auth_info_baileys/
│
└── data/
    ├── blacklist.json              # Nomor blacklist
    └── sent-history.json           # Riwayat pengiriman
```

---

## SCHEMA KONFIGURASI PRODUK

Setiap folder produk di dalam `campaigns/` **wajib** memiliki file `product.json` dengan schema berikut:

```json
{
  "id": "string-unik-produk",
  "name": "Nama Produk Lengkap",
  "category": "Nama Kategori",
  "subcategory": "Nama Subkategori",
  "price": {
    "original": 150000,
    "discounted": 99000,
    "currency": "IDR"
  },
  "description": "Deskripsi singkat produk",
  "cta": {
    "text": "Hubungi Sekarang",
    "link": "https://wa.me/628xxxxx",
    "type": "whatsapp"
  },
  "broadcast": {
    "sendImage": true,
    "imageMode": "random",
    "templateMode": "random",
    "delay": {
      "min": 8,
      "max": 20
    }
  },
  "variables": {
    "stok": "Terbatas",
    "garansi": "1 Tahun",
    "lokasi": "Jakarta"
  },
  "active": true
}
```

---

## SCHEMA TEMPLATE PESAN

File `template.txt` mendukung **variable interpolation** dengan format `{{variable}}`:

```
Halo {{nama}} 👋

Kami punya penawaran spesial untuk kamu hari ini!

🛍️ *{{produk}}*
💰 ~~Rp {{harga_asli}}~~ → *Rp {{harga_diskon}}*
📦 Stok: {{stok}}
🛡️ Garansi: {{garansi}}

{{deskripsi}}

📲 *{{cta_text}}*: {{cta_link}}

_Balas pesan ini untuk info lebih lanjut_ 🙏
```

**Variabel yang tersedia secara otomatis:**
| Variable | Sumber |
|---|---|
| `{{nama}}` | Kolom nama dari Excel target |
| `{{produk}}` | `product.json → name` |
| `{{harga_asli}}` | `product.json → price.original` |
| `{{harga_diskon}}` | `product.json → price.discounted` |
| `{{deskripsi}}` | `product.json → description` |
| `{{cta_text}}` | `product.json → cta.text` |
| `{{cta_link}}` | `product.json → cta.link` |
| `{{stok}}` | `product.json → variables.stok` |
| `{{tanggal}}` | Auto-generated (hari ini) |
| `{{waktu}}` | Auto-generated (jam sekarang) |

---

## SPESIFIKASI TIAP MODULE

### 1. `src/core/whatsapp.js` — Koneksi Baileys
```
FUNGSI:
- Inisialisasi koneksi Baileys dengan useMultiFileAuthState
- Tampilkan QR code di terminal saat pertama login
- Auto-reconnect jika koneksi terputus
- Event listener: connection.update, creds.update, messages.upsert
- Export fungsi: connect(), getSocket(), isConnected(), disconnect()

REQUIREMENT:
- Session disimpan di folder /sessions/auth_info_baileys/
- Logging setiap perubahan status koneksi
- Graceful shutdown saat SIGINT/SIGTERM
```

### 2. `src/catalog/catalogScanner.js` — Auto Scanner
```
FUNGSI:
- Scan rekursif folder /campaigns/
- Build tree structure: { kategori → subkategori → [produk] }
- Validasi setiap produk (cek product.json, minimal 1 template, minimal 1 gambar)
- Filter produk dengan active: false
- Cache hasil scan (invalidate jika folder berubah)
- Export fungsi: scanCatalog(), getCategories(), getProducts(kategori, subkategori)

OUTPUT FORMAT:
{
  "Elektronik": {
    "Handphone": ["iPhone 15 Pro", "Samsung S24"],
    "Laptop": ["MacBook Air M3"]
  },
  "Fashion": {
    "Pria": ["Kemeja Batik Premium"]
  }
}
```

### 3. `src/targets/excelParser.js` — Import Target
```
FUNGSI:
- Baca file .xlsx dan .csv dari folder /targets/
- Auto-detect kolom nama dan nomor (flexible header detection)
- Validasi format nomor Indonesia (08xx, 628xx, +628xx, 8xx)
- Normalisasi semua nomor ke format 628xxxxxxxxxx
- Hapus duplikat berdasarkan nomor
- Filter nomor yang ada di blacklist.json
- Filter nomor yang sudah dikirim (sent-history.json) jika resume mode
- Export: parseTargets(filePath), getTargetFiles()

VALIDASI NOMOR:
- Panjang: 10-13 digit (setelah strip karakter non-digit)
- Prefix valid: 08, 628, +628, 8
- Operator valid: 08[1-9]x (semua operator Indonesia)
- Reject: nomor < 10 digit, bukan awalan Indonesia
```

### 4. `src/core/broadcaster.js` — Engine Broadcast
```
FUNGSI:
- Iterasi targets satu per satu (TIDAK paralel)
- Untuk setiap target:
  1. Pilih template secara random (jika templateMode: random)
  2. Render template dengan variable substitution
  3. Pilih gambar secara random (jika imageMode: random)
  4. Simulasikan typing (presence: composing)
  5. Kirim pesan teks atau gambar+caption
  6. Delay acak sesuai config produk
  7. Catat hasil (success/failed) ke log
  8. Update progress tracker
- Cooldown setiap N pesan (configurable)
- Auto-retry maksimal 3x jika gagal
- Stop gracefully jika ada SIGINT

ANTI-BAN MECHANISM:
- Random delay antara min-max detik (dari product.json)
- Cooldown 60-120 detik setiap 30 pesan
- Simulate typing sebelum kirim (1-3 detik)
- Randomisasi urutan template dan gambar
- Rate limiter: max X pesan per jam
```

### 5. `src/cli/menu.js` — Interface Terminal
```
ALUR INTERAKSI USER:

[START]
  ↓
Cek koneksi WhatsApp
  ↓ (jika belum login)
Tampilkan QR Code → Scan dengan HP
  ↓
=== MENU UTAMA ===
1. 🚀 Mulai Campaign Baru
2. 📋 Lanjutkan Campaign (Resume)
3. 📊 Lihat Riwayat Campaign
4. ⚙️  Pengaturan
5. 🚪 Keluar
  ↓ (pilih 1)
=== PILIH KATEGORI ===
> Elektronik
  Fashion
  Makanan
  ↓
=== PILIH SUBKATEGORI ===
> Handphone
  Laptop
  ↓
=== PILIH PRODUK ===
> iPhone 15 Pro  [3 template, 5 gambar]
  Samsung S24    [2 template, 3 gambar]
  ↓
=== PILIH FILE TARGET ===
> target-januari.xlsx  (245 kontak)
  target-vip.xlsx      (89 kontak)
  ↓
=== KONFIRMASI ===
Produk  : iPhone 15 Pro
Target  : 245 kontak (setelah validasi)
Estimasi: ±45 menit
[MULAI] [BATAL]
  ↓
=== PROGRESS BROADCAST ===
[████████░░░░░░░] 45/245 (18.4%)
✅ Berhasil : 43
❌ Gagal    : 2
⏱️  Elapsed  : 00:08:32
🔄 Next     : 00:00:14
[PAUSE] [STOP]
```

### 6. `src/campaign/campaignManager.js` — Campaign Log
```
SCHEMA LOG FILE (/logs/campaign-[timestamp].json):
{
  "campaignId": "uuid",
  "product": { ...product.json },
  "targetFile": "nama-file.xlsx",
  "startTime": "ISO timestamp",
  "endTime": "ISO timestamp | null",
  "status": "running | completed | paused | failed",
  "stats": {
    "total": 245,
    "sent": 43,
    "failed": 2,
    "skipped": 0,
    "remaining": 200
  },
  "results": [
    {
      "number": "6281234567890",
      "name": "Budi",
      "status": "success | failed | skipped",
      "template": "template1.txt",
      "image": "image2.jpg",
      "timestamp": "ISO timestamp",
      "error": null
    }
  ]
}
```

---

## MEKANISME ANTI-BAN (DETAIL)

Implementasikan semua mekanisme berikut:

```javascript
// 1. Random delay antar pesan
const delay = randomBetween(config.delay.min, config.delay.max) * 1000;

// 2. Simulate typing presence
await sock.sendPresenceUpdate('composing', jid);
await sleep(randomBetween(1000, 3000));
await sock.sendPresenceUpdate('paused', jid);

// 3. Cooldown berkala
if (sentCount % 30 === 0) {
  await sleep(randomBetween(60000, 120000)); // 1-2 menit
}

// 4. Rate limiter per jam
const MAX_PER_HOUR = 100;
// Track timestamp pengiriman, tolak jika melebihi limit

// 5. Randomisasi template & gambar
const template = pickRandom(availableTemplates);
const image = pickRandom(availableImages);

// 6. Variasi panjang pesan (padding opsional)
// Tambahkan invisible char atau spasi ekstra secara random

// 7. Jitter pada semua timing (±20%)
const jitter = (value) => value * (0.8 + Math.random() * 0.4);
```

---

## FORMAT VALIDASI NOMOR INDONESIA

```javascript
function validateIndonesianNumber(raw) {
  // Hapus semua non-digit
  let num = raw.toString().replace(/\D/g, '');
  
  // Normalisasi prefix
  if (num.startsWith('0'))     num = '62' + num.slice(1);
  if (num.startsWith('+62'))   num = num.slice(1);
  if (num.startsWith('8'))     num = '62' + num;
  if (!num.startsWith('62'))   return null;
  
  // Validasi panjang (format 628xxxxxxxxxx = 11-13 digit)
  if (num.length < 11 || num.length > 15) return null;
  
  // Validasi prefix operator Indonesia
  const validPrefixes = ['628', '6281', '6282', '6283', '6285', '6287', '6288', '6289'];
  if (!validPrefixes.some(p => num.startsWith(p))) return null;
  
  return num + '@s.whatsapp.net'; // format Baileys
}
```

---

## FILE `.env` CONFIGURATION

```env
# WhatsApp Session
SESSION_NAME=wa-broadcast-bot
LOG_LEVEL=info

# Broadcast Settings
MAX_PER_HOUR=80
COOLDOWN_EVERY=30
COOLDOWN_DURATION_MIN=60
COOLDOWN_DURATION_MAX=120
DEFAULT_DELAY_MIN=8
DEFAULT_DELAY_MAX=20
MAX_RETRY=3

# Campaign
AUTO_RESUME=true
SAVE_HISTORY=true

# Feature Flags
ENABLE_TYPING_SIMULATION=true
ENABLE_RATE_LIMITER=true
ENABLE_BLACKLIST=true
```

---

## CONTOH STRUKTUR KAMPANYE NYATA

Buatkan contoh implementasi untuk struktur berikut:

```
campaigns/
├── Elektronik/
│   └── Handphone/
│       └── iPhone-15-Pro/
│           ├── product.json
│           ├── templates/
│           │   ├── template-casual.txt
│           │   └── template-formal.txt
│           └── images/
│               ├── iphone-front.jpg
│               └── iphone-promo.jpg
│
└── Fashion/
    └── Wanita/
        └── Hijab-Premium/
            ├── product.json
            ├── templates/
            │   └── template-lifestyle.txt
            └── images/
                └── hijab-collection.jpg
```

---

## INSTRUKSI PEMBANGUNAN

Bangun sistem ini dengan urutan berikut:

### FASE 1 — Foundation
1. Setup `package.json` dengan semua dependencies
2. Buat `.env` dan `.gitignore`
3. Implementasi `src/core/whatsapp.js` (koneksi + QR)
4. Implementasi `src/utils/logger.js`

### FASE 2 — Catalog System
5. Implementasi `src/catalog/catalogScanner.js`
6. Implementasi `src/catalog/productLoader.js`
7. Implementasi `src/catalog/templateEngine.js`

### FASE 3 — Target Management
8. Implementasi `src/targets/excelParser.js`
9. Implementasi `src/targets/numberValidator.js`
10. Implementasi `src/targets/deduplicator.js`

### FASE 4 — Broadcast Engine
11. Implementasi `src/core/rateLimiter.js`
12. Implementasi `src/core/broadcaster.js`
13. Implementasi `src/campaign/campaignManager.js`
14. Implementasi `src/campaign/progressTracker.js`

### FASE 5 — CLI Interface
15. Implementasi `src/cli/display.js`
16. Implementasi `src/cli/selector.js`
17. Implementasi `src/cli/menu.js`
18. Implementasi `index.js` (entry point)

### FASE 6 — Sample Data
19. Buat contoh struktur `campaigns/` dengan 2 produk
20. Buat contoh file target `targets/sample.xlsx`
21. Buat `README.md` lengkap dengan cara install dan penggunaan

---

## STANDAR KODE

- Gunakan **async/await** konsisten, tidak ada callback hell
- Setiap fungsi punya **JSDoc comment** minimal 3 baris
- Error handling dengan **try/catch** di semua operasi I/O
- Semua magic number dieksternalisasi ke `.env` atau config
- Log setiap aksi penting menggunakan `logger.js`
- Kode harus **idempotent** — aman dijalankan berulang kali
- Naming convention: **camelCase** untuk variabel/fungsi, **PascalCase** untuk class

---

## OUTPUT YANG DIHARAPKAN

Hasilkan output dalam urutan berikut:

1. **Semua source code** lengkap per file (jangan disingkat)
2. **Contoh `product.json`** untuk 2 produk berbeda
3. **Contoh template pesan** (casual + formal) per produk
4. **`package.json`** dengan semua dependency dan script
5. **`README.md`** mencakup: instalasi, cara login, cara tambah produk, cara jalankan campaign, troubleshooting umum