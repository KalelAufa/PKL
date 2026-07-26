<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'title' => 'Outsourcing Profesional',
            'slug' => 'outsourcing',
            'icon' => 'cleaning-icon.svg',
            'excerpt' => 'Penyediaan tenaga kerja tersertifikasi dan handal untuk mendukung operasional harian perusahaan Anda.',
            'description' => '<p>Kami pastikan rangkaian layanan outsourcing kami bisa memberi solusi dan layanan terbaik, sesuai tuntutan zaman. Melalui ekosistem proteksi terpadu, kami menawarkan solusi masa depan menggunakan teknologi ramah lingkungan dan sistem manajemen yang efisien.</p><p>Komitmen kami juga menjamin kenyamanan bagi pelanggan di mana pun berada.</p>',
            'hero_image' => 'hero-bg.png',
            'gallery_image_1' => 'landscaping.png',
            'gallery_image_2' => 'parking-mgmt.png',
            'is_affiliate' => false,
            'order' => 0,
        ]);

        Service::create([
            'title' => 'Cleaning Service',
            'slug' => 'cleaning-service',
            'icon' => 'cleaning-icon.svg',
            'excerpt' => 'Solusi kebersihan profesional untuk gedung perkantoran, pusat perbelanjaan, dan area komersial lainnya dengan tenaga terlatih dan peralatan modern.',
            'description' => 'Kami menyediakan layanan kebersihan profesional yang mencakup gedung perkantoran, pusat perbelanjaan, hotel, rumah sakit, dan area komersial lainnya. Didukung oleh tenaga kerja terlatih dan peralatan modern, kami memastikan lingkungan yang bersih, sehat, dan nyaman bagi seluruh penghuni gedung. Program kebersihan kami dirancang secara sistematis dengan standar operasional prosedur yang ketat untuk menjamin konsistensi kualitas.',
            'hero_image' => 'cleaning.png',
            'gallery_image_1' => 'cleaning.png',
            'gallery_image_2' => 'cleaning.png',
            'is_affiliate' => false,
            'order' => 1,
        ]);

        Service::create([
            'title' => 'Security',
            'slug' => 'security',
            'icon' => 'security-icon.svg',
            'excerpt' => 'Layanan keamanan terpadu dengan personel terlatih dan bersertifikasi untuk melindungi aset dan menciptakan lingkungan yang aman.',
            'description' => 'Layanan keamanan terpadu yang dirancang untuk melindungi aset, properti, dan personel klien kami. Personel keamanan kami telah melalui pelatihan ketat dan bersertifikasi, dilengkapi dengan pengetahuan tentang prosedur pengamanan, penanganan darurat, dan pelaporan. Kami menyediakan layanan pengamanan untuk perkantoran, kawasan industri, perumahan, pusat perbelanjaan, dan acara-acara khusus.',
            'hero_image' => 'security.png',
            'gallery_image_1' => 'layanan-security.png',
            'gallery_image_2' => 'security.png',
            'is_affiliate' => false,
            'order' => 2,
        ]);

        Service::create([
            'title' => 'Office Support',
            'slug' => 'office-support',
            'icon' => 'office-icon.svg',
            'excerpt' => 'Tenaga administrasi dan operasional kantor yang andal untuk mendukung kelancaran aktivitas bisnis sehari-hari.',
            'description' => 'Kami menyediakan tenaga administrasi dan operasional kantor yang terampil dan berpengalaman untuk mendukung kelancaran aktivitas bisnis sehari-hari. Mulai dari resepsionis, asisten administrasi, staf pengarsipan, hingga operator telepon, setiap personel telah diseleksi secara ketat untuk memastikan profesionalisme dan kompetensi yang sesuai dengan kebutuhan klien.',
            'hero_image' => 'office-support.png',
            'gallery_image_1' => 'office-support.png',
            'gallery_image_2' => 'office-support.png',
            'is_affiliate' => false,
            'order' => 3,
        ]);

        Service::create([
            'title' => 'Driver',
            'slug' => 'driver',
            'icon' => 'driver-icon.svg',
            'excerpt' => 'Pengemudi profesional yang menjamin keamanan, kenyamanan, dan ketepatan waktu dalam perjalanan bisnis Anda.',
            'description' => 'Layanan pengemudi profesional yang siap mendukung mobilitas bisnis Anda. Seluruh pengemudi kami memiliki pengalaman mengemudi yang luas, pengetahuan rute yang baik, serta sikap profesional dan sopan. Kami memastikan setiap pengemudi memiliki SIM yang valid, catatan mengemudi yang bersih, dan kemampuan komunikasi yang baik untuk mewakili perusahaan Anda dengan positif.',
            'hero_image' => 'driver.png',
            'gallery_image_1' => 'driver.png',
            'gallery_image_2' => 'driver.png',
            'is_affiliate' => false,
            'order' => 4,
        ]);

        Service::create([
            'title' => 'Parking Management',
            'slug' => 'parking-management',
            'icon' => 'parking-icon.svg',
            'excerpt' => 'Sistem pengelolaan parkir yang efisien dan terintegrasi untuk memaksimalkan kapasitas dan keamanan area parkir.',
            'description' => 'Sistem pengelolaan parkir yang efisien dan terintegrasi untuk memaksimalkan kapasitas dan keamanan area parkir Anda. Layanan kami mencakup pengaturan lalu lintas kendaraan, pengelolaan tiket parkir, penjagaan area parkir, serta perawatan peralatan parkir. Dengan personel yang terlatih dan sistem yang terstruktur, kami menjamin pengalaman parkir yang tertib, aman, dan nyaman bagi pengguna gedung.',
            'hero_image' => 'parking-mgmt.png',
            'gallery_image_1' => 'parking-card.png',
            'gallery_image_2' => 'parking-mgmt.png',
            'is_affiliate' => false,
            'order' => 5,
        ]);

        Service::create([
            'title' => 'Landscaping',
            'slug' => 'landscaping',
            'icon' => 'landscaping-icon.svg',
            'excerpt' => 'Perawatan dan penataan area hijau yang estetis untuk menciptakan lingkungan asri dan profesional.',
            'description' => 'Layanan perawatan dan penataan area hijau yang estetis untuk menciptakan lingkungan yang asri, sejuk, dan profesional. Tim landscaping kami terdiri dari tenaga ahli yang berpengalaman dalam perencanaan taman, pemeliharaan tanaman, pemangkasan, pemupukan, pengendalian hama, serta perawatan elemen taman lainnya. Kami melayani perawatan taman perkantoran, kawasan industri, perumahan, dan area komersial lainnya.',
            'hero_image' => 'landscaping.png',
            'gallery_image_1' => 'landscaping-card.png',
            'gallery_image_2' => 'landscaping.png',
            'is_affiliate' => false,
            'order' => 6,
        ]);

        Service::create([
            'title' => 'Perizinan Lingkungan',
            'slug' => 'perizinan-lingkungan',
            'icon' => 'perizinan-icon.svg',
            'excerpt' => 'Bantuan pengurusan dokumen perizinan lingkungan yang lengkap dan sesuai regulasi untuk mendukung kepatuhan bisnis Anda.',
            'description' => 'Kami menyediakan layanan konsultasi dan pengurusan perizinan lingkungan yang lengkap, mencakup UKL-UPL, Amdal, Izin Lingkungan, hingga dokumen pendukung lainnya. Tim kami yang berpengalaman akan mendampingi proses pengurusan dari awal hingga terbit, memastikan setiap dokumen memenuhi persyaratan regulasi yang berlaku.',
            'hero_image' => 'perizinan-hero.png',
            'gallery_image_1' => 'perizinan-1.jpg',
            'gallery_image_2' => 'perizinan-2.jpg',
            'is_affiliate' => false,
            'order' => 7,
        ]);

        Service::create([
            'title' => 'Pest Control',
            'slug' => 'pest-control',
            'icon' => 'pest-control-icon.svg',
            'excerpt' => 'Layanan pengendalian hama profesional untuk menjaga kebersihan dan kesehatan lingkungan gedung Anda.',
            'description' => 'Layanan pengendalian hama profesional yang menangani berbagai jenis hama seperti kecoa, tikus, nyamuk, semut, rayap, dan lalat. Kami menggunakan metode dan bahan yang aman bagi manusia dan lingkungan, namun efektif dalam memberantas hama. Layanan ini mencakup inspeksi awal, perawatan berkala, dan tindak lanjut untuk memastikan area Anda terbebas dari hama.',
            'hero_image' => 'pest-hero.png',
            'gallery_image_1' => 'pest-1.jpg',
            'gallery_image_2' => 'pest-2.jpg',
            'is_affiliate' => false,
            'order' => 8,
        ]);
    }
}
