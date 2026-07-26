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

            // Contact page
            ['page' => 'contact', 'key' => 'address', 'type' => 'text', 'value' => 'Jl. Raya Kebayoran Lama No. 12, Jakarta Selatan, DKI Jakarta 12210', 'label' => 'Alamat Kantor'],
            ['page' => 'contact', 'key' => 'phone', 'type' => 'text', 'value' => '+62 21 1234 5678', 'label' => 'Nomor Telepon'],
            ['page' => 'contact', 'key' => 'email', 'type' => 'text', 'value' => 'info@ptmsp.co.id', 'label' => 'Alamat Email'],

            // About page
            ['page' => 'about', 'key' => 'hero_title', 'type' => 'text', 'value' => 'Tentang Kami', 'label' => 'Hero Title'],
            ['page' => 'about', 'key' => 'hero_subtitle', 'type' => 'text', 'value' => 'Membangun fondasi kepercayaan melalui layanan outsourcing dan kepatuhan lingkungan yang presisi untuk industri modern di Indonesia.', 'label' => 'Hero Subtitle'],
            ['page' => 'about', 'key' => 'story', 'type' => 'text', 'value' => 'Berdiri dengan visi untuk menjadi pilar pendukung utama bagi operasional industri, PT Mentari Satya Perkasa (MSP) telah berkembang dari sebuah entitas konsultasi menjadi mitra strategis yang komprehensif. Perjalanan kami didorong oleh satu prinsip utama: Integritas Tanpa Kompromi.', 'label' => 'Company Story'],

            // Services page
            ['page' => 'services', 'key' => 'hero_title', 'type' => 'text', 'value' => 'Layanan Kami', 'label' => 'Hero Title'],
            ['page' => 'services', 'key' => 'hero_subtitle', 'type' => 'text', 'value' => 'Solusi terintegrasi untuk kebutuhan proteksi dan operasional bisnis Anda. Kami menghadirkan standar layanan tertinggi untuk memastikan kelancaran dan kepatuhan perusahaan Anda.', 'label' => 'Hero Subtitle'],

            // Contact page hero
            ['page' => 'contact', 'key' => 'hero_title', 'type' => 'text', 'value' => 'Hubungi Kami', 'label' => 'Hero Title'],
            ['page' => 'contact', 'key' => 'hero_subtitle', 'type' => 'text', 'value' => 'Kami siap membantu Anda dengan solusi outsourcing, pengelolaan lingkungan, dan pengendalian hama terbaik untuk bisnis Anda.', 'label' => 'Hero Subtitle'],

            // Footer
            ['page' => 'footer', 'key' => 'company_description', 'type' => 'text', 'value' => 'PT Mentari Satya Perkasa adalah perusahaan penyedia jasa alih daya terpercaya di Indonesia. Dengan pengalaman lebih dari 15 tahun, kami berkomitmen memberikan solusi tenaga kerja profesional dan berkualitas untuk mendukung kesuksesan bisnis Anda.', 'label' => 'Deskripsi Perusahaan'],
        ];

        foreach ($contents as $content) {
            PageContent::create($content);
        }
    }
}
