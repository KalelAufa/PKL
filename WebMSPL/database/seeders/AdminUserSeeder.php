<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $password = env('ADMIN_SEED_PASSWORD');

        if (empty($password)) {
            $this->command->error('ADMIN_SEED_PASSWORD not set in .env — skipping admin seeder.');
            return;
        }

        User::updateOrCreate(
            ['email' => 'admin@ptmsp.co.id'],
            [
                'name' => 'Admin MSP',
                'password' => Hash::make($password),
                'role' => 'admin',
            ]
        );
    }
}
