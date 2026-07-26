<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceProcessStep;
use Illuminate\Database\Seeder;

class ServiceProcessStepSeeder extends Seeder
{
    public function run(): void
    {
        $steps = [
            'outsourcing' => [
                ['title' => 'Konsultasi Kebutuhan', 'icon' => 'chat-icon.svg', 'order' => 1],
                ['title' => 'Seleksi & Rekrutmen', 'icon' => 'search-icon.svg', 'order' => 2],
                ['title' => 'Pelatihan & Sertifikasi', 'icon' => 'cert-icon.svg', 'order' => 3],
                ['title' => 'Penempatan', 'icon' => 'placement-icon.svg', 'order' => 4],
                ['title' => 'Monitoring & Evaluasi', 'icon' => 'monitor-icon.svg', 'order' => 5],
            ],
            'cleaning-service' => [
                ['title' => 'Survey Lokasi', 'icon' => 'survey-icon.svg', 'order' => 1],
                ['title' => 'Rencana Kerja', 'icon' => 'plan-icon.svg', 'order' => 2],
                ['title' => 'Mobilisasi Tim', 'icon' => 'team-icon.svg', 'order' => 3],
                ['title' => 'Pelaksanaan', 'icon' => 'work-icon.svg', 'order' => 4],
                ['title' => 'Quality Check', 'icon' => 'check-icon.svg', 'order' => 5],
            ],
            'security' => [
                ['title' => 'Analisis Kebutuhan', 'icon' => 'analysis-icon.svg', 'order' => 1],
                ['title' => 'Penempatan Personel', 'icon' => 'placement-icon.svg', 'order' => 2],
                ['title' => 'Briefing & Pelatihan', 'icon' => 'training-icon.svg', 'order' => 3],
                ['title' => 'Pelaksanaan Tugas', 'icon' => 'work-icon.svg', 'order' => 4],
                ['title' => 'Evaluasi Berkala', 'icon' => 'evaluate-icon.svg', 'order' => 5],
            ],
            'office-support' => [
                ['title' => 'Identifikasi Kebutuhan', 'icon' => 'analysis-icon.svg', 'order' => 1],
                ['title' => 'Seleksi Administratif', 'icon' => 'search-icon.svg', 'order' => 2],
                ['title' => 'Penempatan', 'icon' => 'placement-icon.svg', 'order' => 3],
                ['title' => 'Adaptasi & Onboarding', 'icon' => 'training-icon.svg', 'order' => 4],
                ['title' => 'Evaluasi Kinerja', 'icon' => 'evaluate-icon.svg', 'order' => 5],
            ],
            'driver' => [
                ['title' => 'Verifikasi Dokumen', 'icon' => 'cert-icon.svg', 'order' => 1],
                ['title' => 'Tes Drive', 'icon' => 'work-icon.svg', 'order' => 2],
                ['title' => 'Penempatan', 'icon' => 'placement-icon.svg', 'order' => 3],
                ['title' => 'Briefing Rute', 'icon' => 'chat-icon.svg', 'order' => 4],
                ['title' => 'Monitoring Berkala', 'icon' => 'monitor-icon.svg', 'order' => 5],
            ],
            'parking-management' => [
                ['title' => 'Survey Area Parkir', 'icon' => 'survey-icon.svg', 'order' => 1],
                ['title' => 'Desain Sistem', 'icon' => 'plan-icon.svg', 'order' => 2],
                ['title' => 'Mobilisasi Petugas', 'icon' => 'team-icon.svg', 'order' => 3],
                ['title' => 'Operasional Parkir', 'icon' => 'work-icon.svg', 'order' => 4],
                ['title' => 'Evaluasi & Laporan', 'icon' => 'evaluate-icon.svg', 'order' => 5],
            ],
            'landscaping' => [
                ['title' => 'Konsultasi Desain', 'icon' => 'chat-icon.svg', 'order' => 1],
                ['title' => 'Perencanaan', 'icon' => 'plan-icon.svg', 'order' => 2],
                ['title' => 'Persiapan Lahan', 'icon' => 'work-icon.svg', 'order' => 3],
                ['title' => 'Penanaman & Penataan', 'icon' => 'placement-icon.svg', 'order' => 4],
                ['title' => 'Perawatan Rutin', 'icon' => 'check-icon.svg', 'order' => 5],
            ],
            'perizinan-lingkungan' => [
                ['title' => 'Konsultasi Awal', 'icon' => 'chat-icon.svg', 'order' => 1],
                ['title' => 'Pengumpulan Data', 'icon' => 'search-icon.svg', 'order' => 2],
                ['title' => 'Penyusunan Dokumen', 'icon' => 'plan-icon.svg', 'order' => 3],
                ['title' => 'Pengajuan', 'icon' => 'work-icon.svg', 'order' => 4],
                ['title' => 'Monitoring & Pendampingan', 'icon' => 'monitor-icon.svg', 'order' => 5],
            ],
            'pest-control' => [
                ['title' => 'Inspeksi Awal', 'icon' => 'survey-icon.svg', 'order' => 1],
                ['title' => 'Rencana Perawatan', 'icon' => 'plan-icon.svg', 'order' => 2],
                ['title' => 'Tindak Pengendalian', 'icon' => 'work-icon.svg', 'order' => 3],
                ['title' => 'Monitoring', 'icon' => 'monitor-icon.svg', 'order' => 4],
                ['title' => 'Tindak Lanjut', 'icon' => 'check-icon.svg', 'order' => 5],
            ],
        ];

        foreach ($steps as $slug => $items) {
            $service = Service::where('slug', $slug)->first();
            if (!$service) continue;

            foreach ($items as $item) {
                ServiceProcessStep::create(array_merge($item, ['service_id' => $service->id]));
            }
        }
    }
}
