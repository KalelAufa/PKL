<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        TeamMember::create([
            'name' => 'Aditya Dharmawan',
            'position' => 'Direktur Utama',
            'photo' => 'team-aditya.png',
            'order' => 1,
        ]);

        TeamMember::create([
            'name' => 'Sari Wijaya',
            'position' => 'Manajer Operasional',
            'photo' => 'team-sari.png',
            'order' => 2,
        ]);

        TeamMember::create([
            'name' => 'Bambang Hartono',
            'position' => 'Manajer Keuangan',
            'photo' => 'team-bambang.png',
            'order' => 3,
        ]);

        TeamMember::create([
            'name' => 'Nina Kurnia',
            'position' => 'Manajer HRD',
            'photo' => 'team-nina.png',
            'order' => 4,
        ]);
    }
}
