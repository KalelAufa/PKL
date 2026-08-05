<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title'         => 'Outsourcing Profesional',
                'slug'          => 'outsourcing',
                'icon'          => 'fas fa-users',
                'excerpt'       => 'Penyediaan tenaga kerja tersertifikasi dan handal untuk mendukung operasional harian perusahaan Anda.',
                'description'   => '<p>Kami pastikan rangkaian layanan outsourcing kami bisa memberi solusi dan layanan terbaik, sesuai tuntutan zaman. Melalui ekosistem proteksi terpadu, kami menawarkan solusi masa depan menggunakan teknologi ramah lingkungan dan sistem manajemen yang efisien.</p><p>Komitmen kami juga menjamin kenyamanan bagi pelanggan di mana pun berada.</p>',
                'hero_image'    => 'hero-bg.png',
                'gallery_image_1' => 'landscaping.png',
                'gallery_image_2' => 'parking-mgmt.png',
                'is_affiliate'  => false,
                'status'        => 'published',
                'order'         => 0,
                'category'      => null,
            ],
            [
                'title'         => 'Perizinan Lingkungan',
                'slug'          => 'perizinan-lingkungan',
                'icon'          => 'fas fa-file-alt',
                'excerpt'       => 'Bantuan pengurusan dokumen perizinan lingkungan yang lengkap dan sesuai regulasi untuk mendukung kepatuhan bisnis Anda.',
                'description'   => 'Kami menyediakan layanan konsultasi dan pengurusan perizinan lingkungan yang lengkap, mencakup UKL-UPL, Amdal, Izin Lingkungan, hingga dokumen pendukung lainnya. Tim kami yang berpengalaman akan mendampingi proses pengurusan dari awal hingga terbit, memastikan setiap dokumen memenuhi persyaratan regulasi yang berlaku.',
                'hero_image'    => 'perizinan-hero.png',
                'gallery_image_1' => 'perizinan-1.jpg',
                'gallery_image_2' => 'perizinan-2.jpg',
                'is_affiliate'  => false,
                'status'        => 'published',
                'order'         => 1,
                'category'      => null,
            ],
            [
                'title'         => 'Pest Control',
                'slug'          => 'pest-control',
                'icon'          => 'fas fa-bug',
                'excerpt'       => 'Layanan pengendalian hama profesional untuk menjaga kebersihan dan kesehatan lingkungan gedung Anda.',
                'description'   => 'Layanan pengendalian hama profesional yang menangani berbagai jenis hama seperti kecoa, tikus, nyamuk, semut, rayap, dan lalat. Kami menggunakan metode dan bahan yang aman bagi manusia dan lingkungan, namun efektif dalam memberantas hama. Layanan ini mencakup inspeksi awal, perawatan berkala, dan tindak lanjut untuk memastikan area Anda terbebas dari hama.',
                'hero_image'    => 'pest-hero.png',
                'gallery_image_1' => 'pest-1.jpg',
                'gallery_image_2' => 'pest-2.jpg',
                'is_affiliate'  => false,
                'status'        => 'published',
                'order'         => 2,
                'category'      => null,
            ],
            // Outsourcing sub-services
            [
                'title'         => 'Cleaning Service',
                'slug'          => 'cleaning-service',
                'icon'          => 'fas fa-broom',
                'excerpt'       => 'Solusi kebersihan profesional untuk gedung perkantoran, pusat perbelanjaan, dan area komersial lainnya dengan tenaga terlatih dan peralatan modern.',
                'description'   => 'Kami menyediakan layanan kebersihan profesional yang mencakup gedung perkantoran, pusat perbelanjaan, hotel, rumah sakit, dan area komersial lainnya. Didukung oleh tenaga kerja terlatih dan peralatan modern, kami memastikan lingkungan yang bersih, sehat, dan nyaman bagi seluruh penghuni gedung.',
                'hero_image'    => 'cleaning.png',
                'gallery_image_1' => 'cleaning.png',
                'gallery_image_2' => 'cleaning.png',
                'is_affiliate'  => false,
                'status'        => 'published',
                'order'         => 0,
                'category'      => 'outsourcing',
            ],
            [
                'title'         => 'Security',
                'slug'          => 'security',
                'icon'          => 'fas fa-shield-alt',
                'excerpt'       => 'Layanan keamanan terpadu dengan personel terlatih dan bersertifikasi untuk melindungi aset dan menciptakan lingkungan yang aman.',
                'description'   => 'Layanan keamanan terpadu yang dirancang untuk melindungi aset, properti, dan personel klien kami. Personel keamanan kami telah melalui pelatihan ketat dan bersertifikasi, dilengkapi dengan pengetahuan tentang prosedur pengamanan, penanganan darurat, dan pelaporan.',
                'hero_image'    => 'security.png',
                'gallery_image_1' => 'layanan-security.png',
                'gallery_image_2' => 'security.png',
                'is_affiliate'  => false,
                'status'        => 'published',
                'order'         => 1,
                'category'      => 'outsourcing',
            ],
            [
                'title'         => 'Office Support',
                'slug'          => 'office-support',
                'icon'          => 'fas fa-briefcase',
                'excerpt'       => 'Tenaga administrasi dan operasional kantor yang andal untuk mendukung kelancaran aktivitas bisnis sehari-hari.',
                'description'   => 'Kami menyediakan tenaga administrasi dan operasional kantor yang terampil dan berpengalaman untuk mendukung kelancaran aktivitas bisnis sehari-hari. Mulai dari resepsionis, asisten administrasi, staf pengarsipan, hingga operator telepon.',
                'hero_image'    => 'office-support.png',
                'gallery_image_1' => 'office-support.png',
                'gallery_image_2' => 'office-support.png',
                'is_affiliate'  => false,
                'status'        => 'published',
                'order'         => 2,
                'category'      => 'outsourcing',
            ],
            [
                'title'         => 'Driver',
                'slug'          => 'driver',
                'icon'          => 'fas fa-car',
                'excerpt'       => 'Pengemudi profesional yang menjamin keamanan, kenyamanan, dan ketepatan waktu dalam perjalanan bisnis Anda.',
                'description'   => 'Layanan pengemudi profesional yang siap mendukung mobilitas bisnis Anda. Seluruh pengemudi kami memiliki pengalaman mengemudi yang luas, pengetahuan rute yang baik, serta sikap profesional dan sopan.',
                'hero_image'    => 'driver.png',
                'gallery_image_1' => 'driver.png',
                'gallery_image_2' => 'driver.png',
                'is_affiliate'  => false,
                'status'        => 'published',
                'order'         => 3,
                'category'      => 'outsourcing',
            ],
            [
                'title'         => 'Parking Management',
                'slug'          => 'parking-management',
                'icon'          => 'fas fa-parking',
                'excerpt'       => 'Sistem pengelolaan parkir yang efisien dan terintegrasi untuk memaksimalkan kapasitas dan keamanan area parkir.',
                'description'   => 'Sistem pengelolaan parkir yang efisien dan terintegrasi untuk memaksimalkan kapasitas dan keamanan area parkir Anda. Layanan kami mencakup pengaturan lalu lintas kendaraan, pengelolaan tiket parkir, penjagaan area parkir, serta perawatan peralatan parkir.',
                'hero_image'    => 'parking-mgmt.png',
                'gallery_image_1' => 'parking-mgmt.png',
                'gallery_image_2' => 'parking-mgmt.png',
                'is_affiliate'  => false,
                'status'        => 'published',
                'order'         => 4,
                'category'      => 'outsourcing',
            ],
            [
                'title'         => 'Landscaping',
                'slug'          => 'landscaping',
                'icon'          => 'fas fa-leaf',
                'excerpt'       => 'Perawatan dan penataan area hijau yang estetis untuk menciptakan lingkungan asri dan profesional.',
                'description'   => 'Layanan perawatan dan penataan area hijau yang estetis untuk menciptakan lingkungan yang asri, sejuk, dan profesional. Tim landscaping kami terdiri dari tenaga ahli yang berpengalaman dalam perencanaan taman, pemeliharaan tanaman, pemangkasan, pemupukan, dan pengendalian hama.',
                'hero_image'    => 'landscaping.png',
                'gallery_image_1' => 'landscaping.png',
                'gallery_image_2' => 'landscaping.png',
                'is_affiliate'  => false,
                'status'        => 'published',
                'order'         => 5,
                'category'      => 'outsourcing',
            ],
        ];

        foreach ($services as $data) {
            Service::firstOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
