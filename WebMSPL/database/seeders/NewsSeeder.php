<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $adminId = User::where('role', 'admin')->first()->id;
        $perusahaanId = Category::where('slug', 'perusahaan')->value('id');
        $layananId = Category::where('slug', 'layanan')->value('id');
        $csrId = Category::where('slug', 'csr')->value('id');

        $news = [
            [
                'title' => 'PT Mentari Satya Perkasa Resmi Mendapatkan Sertifikasi ISO 9001:2015',
                'slug' => 'sertifikasi-iso-9001-2015',
                'thumbnail' => 'news-1.png',
                'excerpt' => 'Pencapaian baru dalam standar manajemen mutu perusahaan.',
                'content' => '<p>PT Mentari Satya Perkasa dengan bangga mengumumkan bahwa perusahaan telah resmi mendapatkan sertifikasi ISO 9001:2015 untuk Sistem Manajemen Mutu. Sertifikasi ini merupakan bukti komitmen perusahaan dalam memberikan layanan terbaik kepada seluruh mitra dan pelanggan.</p><p>Proses sertifikasi melibatkan audit ketat dari lembaga sertifikasi independen yang menilai seluruh aspek operasional perusahaan, mulai dari manajemen SDM, proses layanan, hingga kepuasan pelanggan.</p><p>Dengan sertifikasi ini, PT Mentari Satya Perkasa semakin percaya diri dalam bersaing di industri jasa outsourcing nasional dan siap melayani kebutuhan sumber daya manusia perusahaan-perusahaan terkemuka di Indonesia.</p>',
                'category_id' => $perusahaanId,
                'author_id' => $adminId,
                'author_role' => 'admin',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Tips Memilih Perusahaan Outsourcing yang Terpercaya',
                'slug' => 'tips-memilih-outsourcing-terpercaya',
                'thumbnail' => 'news-2.png',
                'excerpt' => 'Panduan lengkap dalam memilih mitra outsourcing profesional.',
                'content' => '<p>Memilih perusahaan outsourcing yang tepat adalah keputusan penting bagi kelangsungan bisnis Anda. Berikut beberapa tips yang perlu diperhatikan.</p><p>Pertama, pastikan perusahaan memiliki legalitas yang lengkap dan pengalaman yang relevan di bidangnya. Kedua, periksa rekam jejak dan testimoni dari klien sebelumnya. Ketiga, pastikan mereka memiliki sistem manajemen SDM yang baik, termasuk pelatihan dan sertifikasi tenaga kerja.</p><p>PT Mentari Satya Perkasa hadir sebagai solusi outsourcing terpercaya dengan pengalaman bertahun-tahun dan ribuan tenaga kerja tersertifikasi yang siap ditempatkan di berbagai sektor industri.</p>',
                'category_id' => $layananId,
                'author_id' => $adminId,
                'author_role' => 'admin',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Program Pelatihan Keamanan untuk Personel Security PT MSP',
                'slug' => 'pelatihan-keamanan-personel-security',
                'thumbnail' => 'news-3.png',
                'excerpt' => 'Meningkatkan kompetensi tenaga keamanan melalui pelatihan berkala.',
                'content' => '<p>PT Mentari Satya Perkasa secara rutin mengadakan program pelatihan bagi personel security untuk memastikan kualitas layanan keamanan yang optimal. Pelatihan terbaru mencakup teknis pengamanan, tanggap darurat, dan pelayanan prima.</p><p>Program ini diikuti oleh puluhan personel security yang bertugas di berbagai lokasi klien. Dengan pelatihan berkelanjutan, PT MSP berkomitmen untuk selalu menghadirkan tenaga keamanan yang profesional, sigap, dan berintegritas.</p>',
                'category_id' => $layananId,
                'author_id' => $adminId,
                'author_role' => 'admin',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Peringatan Hari Kebersihan Sedunia: Komitmen PT MSP pada Lingkungan',
                'slug' => 'hari-kebersihan-sedunia-pt-msp',
                'thumbnail' => 'berita-environmental.jpg',
                'excerpt' => 'Berkontribusi dalam menjaga kebersihan lingkungan sekitar.',
                'content' => '<p>Dalam rangka memperingati Hari Kebersihan Sedunia, PT Mentari Satya Perkasa mengadakan aksi bersih-bersih di area sekitar kantor dan fasilitas umum. Kegiatan ini melibatkan seluruh karyawan dan personel cleaning service.</p><p>Kegiatan ini merupakan wujud nyata komitmen PT MSP dalam mendukung kelestarian lingkungan dan kepedulian sosial. Selain itu, perusahaan juga terus mengedukasi pentingnya kebersihan lingkungan kepada seluruh personel di lapangan.</p>',
                'category_id' => $csrId,
                'author_id' => $adminId,
                'author_role' => 'admin',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Kolaborasi PT MSP dengan Perusahaan Manufaktur Terkemuka',
                'slug' => 'kolaborasi-pt-msp-manufaktur',
                'thumbnail' => 'berita-csr.jpg',
                'excerpt' => 'Kemitraan strategis dalam penyediaan tenaga kerja outsourcing.',
                'content' => '<p>PT Mentari Satya Perkasa menjalin kemitraan strategis dengan salah satu perusahaan manufaktur terkemuka di Indonesia. Kerjasama ini mencakup penyediaan tenaga kerja outsourcing untuk berbagai posisi operasional dan administrasi.</p><p>Kerjasama ini menjadi bukti kepercayaan industri terhadap kualitas layanan PT MSP. Perusahaan berkomitmen untuk terus meningkatkan standar layanan dan memperluas jangkauan bisnis ke berbagai sektor industri di Indonesia.</p>',
                'category_id' => $perusahaanId,
                'author_id' => $adminId,
                'author_role' => 'admin',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(25),
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
