<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // Home page
            ['page' => 'home', 'key' => 'hero_title', 'type' => 'text', 'value' => 'Solusi Outsourcing Terpercaya untuk Bisnis Anda', 'label' => 'Hero Title'],
            ['page' => 'home', 'key' => 'hero_subtitle', 'type' => 'text', 'value' => 'Lebih dari 15 tahun memberikan layanan profesional di bidang alih daya dengan jaminan kualitas dan kepuasan.', 'label' => 'Hero Subtitle'],
            ['page' => 'home', 'key' => 'hero_image', 'type' => 'image', 'value' => 'hero-bg.png', 'label' => 'Hero Background Image'],
            ['page' => 'home', 'key' => 'stat_1_value', 'type' => 'text', 'value' => '15+', 'label' => 'Statistic 1 Value'],
            ['page' => 'home', 'key' => 'stat_1_label', 'type' => 'text', 'value' => 'Tahun Pengalaman', 'label' => 'Statistic 1 Label'],
            ['page' => 'home', 'key' => 'stat_2_value', 'type' => 'text', 'value' => '200+', 'label' => 'Statistic 2 Value'],
            ['page' => 'home', 'key' => 'stat_2_label', 'type' => 'text', 'value' => 'Klien Korporat', 'label' => 'Statistic 2 Label'],
            ['page' => 'home', 'key' => 'stat_3_value', 'type' => 'text', 'value' => '5000+', 'label' => 'Statistic 3 Value'],
            ['page' => 'home', 'key' => 'stat_3_label', 'type' => 'text', 'value' => 'Tenaga Kerja Tersalurkan', 'label' => 'Statistic 3 Label'],
            ['page' => 'home', 'key' => 'about_title', 'type' => 'text', 'value' => 'Tentang PT Mentari Satya Perkasa', 'label' => 'About Section Title'],
            ['page' => 'home', 'key' => 'about_description', 'type' => 'text', 'value' => 'PT Mentari Satya Perkasa adalah perusahaan penyedia jasa alih daya (outsourcing) yang berkomitmen memberikan solusi sumber daya manusia berkualitas. Dengan pengalaman lebih dari 15 tahun, kami telah dipercaya oleh berbagai perusahaan korporat di Indonesia untuk menyediakan tenaga kerja profesional di bidang cleaning service, security, office support, driver, parking management, dan landscaping.', 'label' => 'About Section Description'],
            ['page' => 'home', 'key' => 'about_image', 'type' => 'image', 'value' => 'about-team.png', 'label' => 'About Section Image'],
            ['page' => 'home', 'key' => 'about_metric_1', 'type' => 'text', 'value' => '98%', 'label' => 'About Metric 1 Value'],
            ['page' => 'home', 'key' => 'about_metric_1_label', 'type' => 'text', 'value' => 'Client Retention', 'label' => 'About Metric 1 Label'],
            ['page' => 'home', 'key' => 'about_metric_2', 'type' => 'text', 'value' => '24/7', 'label' => 'About Metric 2 Value'],
            ['page' => 'home', 'key' => 'about_metric_2_label', 'type' => 'text', 'value' => 'Support Tim', 'label' => 'About Metric 2 Label'],
            ['page' => 'home', 'key' => 'about_metric_3', 'type' => 'text', 'value' => '100%', 'label' => 'About Metric 3 Value'],
            ['page' => 'home', 'key' => 'about_metric_3_label', 'type' => 'text', 'value' => 'Compliance', 'label' => 'About Metric 3 Label'],
            ['page' => 'home', 'key' => 'innovation_image_1', 'type' => 'image', 'value' => 'landscaping.png', 'label' => 'Gambar Inovasi (Kiri Atas)'],
            ['page' => 'home', 'key' => 'innovation_image_2', 'type' => 'image', 'value' => 'parking-mgmt.png', 'label' => 'Gambar Inovasi (Kanan Bawah)'],

            // News page
            ['page' => 'news', 'key' => 'hero_image', 'type' => 'image', 'value' => 'berita-hero.png', 'label' => 'Gambar Background Hero Berita'],

            // Contact page
            ['page' => 'contact', 'key' => 'address', 'type' => 'text', 'value' => 'Jl. Raya Kebayoran Lama No. 12, Jakarta Selatan, DKI Jakarta 12210', 'label' => 'Alamat Kantor'],
            ['page' => 'contact', 'key' => 'phone', 'type' => 'text', 'value' => '+62 21 1234 5678', 'label' => 'Nomor Telepon'],
            ['page' => 'contact', 'key' => 'email', 'type' => 'text', 'value' => 'info@ptmsp.co.id', 'label' => 'Alamat Email'],

            // About page
            ['page' => 'about', 'key' => 'hero_title',           'type' => 'text',  'value' => 'Tentang Kami',                                    'label' => 'Hero Title'],
            ['page' => 'about', 'key' => 'hero_subtitle',        'type' => 'text',  'value' => 'Membangun fondasi kepercayaan melalui layanan outsourcing dan kepatuhan lingkungan yang presisi untuk industri modern di Indonesia.', 'label' => 'Hero Subtitle'],
            ['page' => 'about', 'key' => 'hero_badge',           'type' => 'text',  'value' => 'Mitra Solusi Proteksi',                           'label' => 'Badge/Eyebrow Hero'],
            ['page' => 'about', 'key' => 'story',                'type' => 'text',  'value' => 'Berdiri dengan visi untuk menjadi pilar pendukung utama bagi operasional industri, PT Mentari Satya Perkasa (MSP) telah berkembang dari sebuah entitas konsultasi menjadi mitra strategis yang komprehensif. Perjalanan kami didorong oleh satu prinsip utama: Integritas Tanpa Kompromi.', 'label' => 'Company Story'],
            ['page' => 'about', 'key' => 'cta_button_primary',   'type' => 'text',  'value' => 'Hubungi Kami Sekarang',                           'label' => 'Teks Tombol CTA Utama'],
            ['page' => 'about', 'key' => 'cta_button_secondary', 'type' => 'text',  'value' => 'Lihat Layanan Kami',                              'label' => 'Teks Tombol CTA Sekunder'],

            // Services page
            ['page' => 'services', 'key' => 'hero_title',           'type' => 'text',  'value' => 'Layanan Kami',                                 'label' => 'Hero Title'],
            ['page' => 'services', 'key' => 'hero_subtitle',        'type' => 'text',  'value' => 'Solusi terintegrasi untuk kebutuhan proteksi dan operasional bisnis Anda. Kami menghadirkan standar layanan tertinggi untuk memastikan kelancaran dan kepatuhan perusahaan Anda.', 'label' => 'Hero Subtitle'],
            ['page' => 'services', 'key' => 'sister_badge',         'type' => 'text',  'value' => 'LAYANAN AFILIASI',                             'label' => 'Badge Seksi Afiliasi'],
            ['page' => 'services', 'key' => 'sister_title',         'type' => 'text',  'value' => 'Pengadaan Barang & IT Support',                'label' => 'Judul Seksi Afiliasi'],
            ['page' => 'services', 'key' => 'sister_description',   'type' => 'text',  'value' => 'Untuk kebutuhan pengadaan peralatan kantor, infrastruktur IT, dan dukungan teknis, layanan ini disediakan secara khusus oleh sister company kami, PT TNS, untuk memberikan fokus dan keahlian yang lebih spesifik.', 'label' => 'Deskripsi Seksi Afiliasi'],
            ['page' => 'services', 'key' => 'sister_url',           'type' => 'text',  'value' => 'https://tns.co.id',                            'label' => 'URL Website Afiliasi (PT TNS)'],
            ['page' => 'services', 'key' => 'sister_cta_label',     'type' => 'text',  'value' => 'Kunjungi Website PT TNS',                      'label' => 'Teks Tombol Afiliasi'],
            ['page' => 'services', 'key' => 'cta_button_primary',   'type' => 'text',  'value' => 'Jadwalkan Konsultasi',                         'label' => 'Teks Tombol CTA Utama'],
            ['page' => 'services', 'key' => 'cta_button_secondary', 'type' => 'text',  'value' => 'Lihat Layanan Lainnya',                        'label' => 'Teks Tombol CTA Sekunder'],

            // Contact page hero
            ['page' => 'contact', 'key' => 'hero_title',            'type' => 'text',  'value' => 'Hubungi Kami',                                 'label' => 'Hero Title'],
            ['page' => 'contact', 'key' => 'hero_subtitle',         'type' => 'text',  'value' => 'Kami siap membantu Anda dengan solusi outsourcing, pengelolaan lingkungan, dan pengendalian hama terbaik untuk bisnis Anda.', 'label' => 'Hero Subtitle'],
            ['page' => 'contact', 'key' => 'hero_cta',              'type' => 'text',  'value' => 'Kirim Pesan',                                  'label' => 'Teks Tombol Hero'],
            ['page' => 'contact', 'key' => 'contact_info_title',    'type' => 'text',  'value' => 'Informasi Kontak',                             'label' => 'Judul Seksi Info Kontak'],
            ['page' => 'contact', 'key' => 'contact_info_subtitle', 'type' => 'text',  'value' => 'Jangan ragu untuk menghubungi kami. Tim kami akan segera merespons pertanyaan Anda.', 'label' => 'Subjudul Seksi Info Kontak'],
            ['page' => 'contact', 'key' => 'map_title',             'type' => 'text',  'value' => 'Lokasi Kami',                                  'label' => 'Judul Seksi Peta'],

            // News page
            ['page' => 'news', 'key' => 'hero_title',         'type' => 'text', 'value' => 'Berita & Artikel Terbaru',                                                                                                                          'label' => 'Judul Hero (fallback tanpa berita featured)'],
            ['page' => 'news', 'key' => 'hero_subtitle',      'type' => 'text', 'value' => 'Informasi terbaru seputar layanan, kegiatan, dan pengumuman penting dari PT Mentari Satya Perkasa.',                                                'label' => 'Subjudul Hero (fallback)'],
            ['page' => 'news', 'key' => 'newsletter_title',   'type' => 'text', 'value' => 'Tetap Terhubung dengan MSP',                                                                                                                         'label' => 'Judul Seksi Newsletter'],
            ['page' => 'news', 'key' => 'newsletter_subtitle','type' => 'text', 'value' => 'Dapatkan informasi terbaru seputar layanan, artikel, dan pengumuman penting dari PT Mentari Satya Perkasa langsung di email Anda.',                  'label' => 'Subjudul Seksi Newsletter'],

            // Footer
            ['page' => 'footer', 'key' => 'company_description', 'type' => 'text', 'value' => 'PT Mentari Satya Perkasa adalah perusahaan penyedia jasa alih daya terpercaya di Indonesia. Dengan pengalaman lebih dari 15 tahun, kami berkomitmen memberikan solusi tenaga kerja profesional dan berkualitas untuk mendukung kesuksesan bisnis Anda.', 'label' => 'Deskripsi Perusahaan'],

            // Email templates
            ['page' => 'emails', 'key' => 'reply_eyebrow',       'type' => 'text', 'value' => 'Balasan dari Kami',                                                                                                          'label' => 'Balasan — Label Eyebrow'],
            ['page' => 'emails', 'key' => 'reply_hero_title',    'type' => 'text', 'value' => 'Halo, terima kasih sudah menghubungi kami.',                                                                                  'label' => 'Balasan — Judul Hero'],
            ['page' => 'emails', 'key' => 'reply_hero_subtitle', 'type' => 'text', 'value' => 'Kami sudah membaca pesan Anda dan siap membantu. Berikut balasan dari tim',                                                   'label' => 'Balasan — Subjudul Hero'],
            ['page' => 'emails', 'key' => 'reply_greeting',      'type' => 'text', 'value' => 'Yth.',                                                                                                                        'label' => 'Balasan — Sapaan (sebelum nama penerima)'],
            ['page' => 'emails', 'key' => 'reply_intro',         'type' => 'text', 'value' => 'Kami sudah membaca pesan Anda dan berikut balasan resmi dari tim kami.',                                                      'label' => 'Balasan — Paragraf Pembuka'],
            ['page' => 'emails', 'key' => 'reset_eyebrow',       'type' => 'text', 'value' => 'Reset Password',                                                                                                              'label' => 'Reset Password — Label Eyebrow'],
            ['page' => 'emails', 'key' => 'reset_hero_title',    'type' => 'text', 'value' => 'Mau ganti password? Kami bantu.',                                                                                              'label' => 'Reset Password — Judul Hero'],
            ['page' => 'emails', 'key' => 'reset_hero_subtitle', 'type' => 'text', 'value' => 'Klik tombol di bawah untuk membuat password baru. Kalau bukan Anda yang minta, abaikan saja email ini.',                      'label' => 'Reset Password — Subjudul Hero'],
            ['page' => 'emails', 'key' => 'reset_expiry',        'type' => 'text', 'value' => 'Tautan ini kedaluwarsa dalam 60 menit sejak email ini dikirim.',                                                              'label' => 'Reset Password — Teks Peringatan Kedaluwarsa'],
            ['page' => 'emails', 'key' => 'reset_button',        'type' => 'text', 'value' => 'Reset Password Sekarang',                                                                                                     'label' => 'Reset Password — Teks Tombol'],
            ['page' => 'emails', 'key' => 'reset_security',      'type' => 'text', 'value' => 'Jika Anda tidak meminta reset password, segera hubungi administrator sistem. Jangan bagikan tautan ini kepada siapapun.',     'label' => 'Reset Password — Catatan Keamanan'],
        ];

        foreach ($contents as $content) {
            PageContent::create($content);
        }
    }
}
