<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceFeature;
use Illuminate\Database\Seeder;

class ServiceFeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            'outsourcing' => [
                ['title' => 'Tenaga Tersertifikasi', 'description' => 'Seluruh tenaga kerja memiliki sertifikasi kompetensi sesuai bidangnya', 'order' => 1],
                ['title' => 'Manajemen Terpadu', 'description' => 'Sistem manajemen SDM terintegrasi untuk hasil maksimal', 'order' => 2],
                ['title' => 'Fleksibel & Skalabel', 'description' => 'Jumlah tenaga kerja dapat disesuaikan dengan kebutuhan bisnis', 'order' => 3],
                ['title' => 'Efisiensi Biaya', 'description' => 'Optimalkan biaya operasional dengan sistem outsourcing yang tepat', 'order' => 4],
            ],
            'cleaning-service' => [
                ['title' => 'Peralatan Modern', 'description' => 'Menggunakan teknologi dan peralatan kebersihan terkini', 'order' => 1],
                ['title' => 'Tenaga Terlatih', 'description' => 'Petugas kebersihan profesional dengan pelatihan berkala', 'order' => 2],
                ['title' => 'Sistem Terjadwal', 'description' => 'Jadwal pembersihan sistematis untuk hasil konsisten', 'order' => 3],
                ['title' => 'Ramah Lingkungan', 'description' => 'Menggunakan bahan pembersih yang aman dan ramah lingkungan', 'order' => 4],
            ],
            'security' => [
                ['title' => 'Bersertifikasi Gada Pratama', 'description' => 'Seluruh personel memiliki sertifikasi keamanan resmi', 'order' => 1],
                ['title' => 'Pelatihan Tanggap Darurat', 'description' => 'Terlatih dalam penanganan situasi darurat dan kebakaran', 'order' => 2],
                ['title' => 'Sistem Pelaporan', 'description' => 'Laporan keamanan harian yang transparan dan detail', 'order' => 3],
                ['title' => '24/7 Monitoring', 'description' => 'Pengawasan dan respon keamanan selama 24 jam', 'order' => 4],
            ],
            'office-support' => [
                ['title' => 'Kompeten & Profesional', 'description' => 'Tenaga administrasi dengan keahlian yang teruji', 'order' => 1],
                ['title' => 'Adaptif & Cepat Belajar', 'description' => 'Mudah beradaptasi dengan sistem dan budaya perusahaan', 'order' => 2],
                ['title' => 'Komunikasi Baik', 'description' => 'Kemampuan komunikasi verbal dan tulisan yang baik', 'order' => 3],
                ['title' => 'Penguasaan Teknologi', 'description' => 'Mahir dalam penggunaan aplikasi perkantoran modern', 'order' => 4],
            ],
            'driver' => [
                ['title' =>'Pengemudi Profesional', 'description' => 'Berpengalaman dengan catatan mengemudi bersih', 'order' => 1],
                ['title' => 'Pengetahuan Rute', 'description' => 'Menguasai rute dan jalur alternatif di berbagai kota', 'order' => 2],
                ['title' => 'Sopan & Santun', 'description' => 'Bersikap profesional dan mewakili citra perusahaan', 'order' => 3],
                ['title' => 'Perawatan Kendaraan', 'description' => 'Mampu melakukan perawatan dasar kendaraan', 'order' => 4],
            ],
            'parking-management' => [
                ['title' => 'Sistem Terintegrasi', 'description' => 'Pengelolaan parkir dengan sistem yang terstruktur', 'order' => 1],
                ['title' => 'Keamanan Terjamin', 'description' => 'Pengawasan 24 jam dengan personel terlatih', 'order' => 2],
                ['title' => 'Kapasitas Maksimal', 'description' => 'Optimasi penggunaan ruang parkir yang tersedia', 'order' => 3],
                ['title' => 'Pelayanan Prima', 'description' => 'Pelayanan ramah dan responsif kepada pengguna parkir', 'order' => 4],
            ],
            'landscaping' => [
                ['title' => 'Desain Estetis', 'description' => 'Penataan taman dengan konsep desain yang menarik', 'order' => 1],
                ['title' => 'Perawatan Rutin', 'description' => 'Jadwal perawatan tanaman yang terjadwal secara berkala', 'order' => 2],
                ['title' => 'Tanaman Berkualitas', 'description' => 'Menggunakan jenis tanaman terbaik untuk hasil optimal', 'order' => 3],
                ['title' => 'Ramah Lingkungan', 'description' => 'Praktik pertamanan yang mendukung kelestarian alam', 'order' => 4],
            ],
            'perizinan-lingkungan' => [
                ['title' => 'Konsultasi Gratis', 'description' => 'Konsultasi awal tanpa biaya untuk kebutuhan perizinan', 'order' => 1],
                ['title' => 'Dokumen Lengkap', 'description' => 'Pengurusan dokumen secara menyeluruh dan sesuai regulasi', 'order' => 2],
                ['title' => 'Pendampingan Penuh', 'description' => 'Didampingi dari awal hingga dokumen terbit', 'order' => 3],
                ['title' => 'Update Regulasi', 'description' => 'Informasi terkini tentang perubahan regulasi lingkungan', 'order' => 4],
            ],
            'pest-control' => [
                ['title' => 'Bahan Aman', 'description' => 'Menggunakan pestisida yang aman bagi manusia dan hewan', 'order' => 1],
                ['title' => 'Metode Efektif', 'description' => 'Teknik pengendalian hama yang terbukti efektif', 'order' => 2],
                ['title' => 'Garansi Layanan', 'description' => 'Jaminan layanan ulang jika hama masih muncul', 'order' => 3],
                ['title' => 'Jadwal Fleksibel', 'description' => 'Penjadwalan perawatan yang dapat disesuaikan', 'order' => 4],
            ],
        ];

        foreach ($features as $slug => $items) {
            $service = Service::where('slug', $slug)->first();
            if (!$service) continue;

            foreach ($items as $item) {
                ServiceFeature::create(array_merge($item, ['service_id' => $service->id]));
            }
        }
    }
}
