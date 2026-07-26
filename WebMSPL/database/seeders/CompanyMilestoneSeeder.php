<?php

namespace Database\Seeders;

use App\Models\CompanyMilestone;
use Illuminate\Database\Seeder;

class CompanyMilestoneSeeder extends Seeder
{
    public function run(): void
    {
        CompanyMilestone::create([
            'label' => 'AWAL PERJALANAN',
            'title' => 'Fondasi Kepercayaan',
            'description' => 'PT Mentari Satya Perkasa didirikan dengan visi menjadi penyedia jasa alih daya terdepan di Indonesia. Berawal dari komitmen untuk memberikan layanan berkualitas, kami mulai membangun fondasi kepercayaan bersama klien pertama kami.',
            'order' => 1,
        ]);

        CompanyMilestone::create([
            'label' => 'EKSPANSI LAYANAN',
            'title' => 'Solusi Terintegrasi',
            'description' => 'Kami memperluas jangkauan layanan dari cleaning service menjadi solusi terintegrasi yang mencakup security, office support, driver, parking management, dan landscaping. Pertumbuhan ini didorong oleh kebutuhan klien akan layanan outsourcing yang komprehensif dan terpercaya.',
            'order' => 2,
        ]);

        CompanyMilestone::create([
            'label' => 'HARI INI',
            'title' => 'Standardisasi Global',
            'description' => 'Dengan pengalaman lebih dari 15 tahun, kami terus berinovasi dan mengadopsi standar internasional dalam setiap layanan. Kini dipercaya oleh lebih dari 200 klien korporat, kami berkomitmen untuk terus meningkatkan kualitas dan memberikan dampak positif bagi masyarakat melalui program CSR yang berkelanjutan.',
            'order' => 3,
        ]);
    }
}
