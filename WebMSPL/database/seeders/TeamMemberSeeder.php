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
            'photo' => 'images/team-aditya.png',
            'order' => 1,
        ]);

        TeamMember::create([
            'name' => 'Sari Wijaya',
            'position' => 'Manajer Operasional',
            'photo' => 'images/team-sari.png',
            'order' => 2,
        ]);

        TeamMember::create([
            'name' => 'Bambang Hartono',
            'position' => 'Manajer Keuangan',
            'photo' => 'images/team-bambang.png',
            'order' => 3,
        ]);

        TeamMember::create([
            'name' => 'Nina Kurnia',
            'position' => 'Manajer HRD',
            'photo' => 'images/team-nina.png',
            'order' => 4,
        ]);
    }
}
