<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $password = config('app.admin_seed_password') ?: env('ADMIN_SEED_PASSWORD');

        if (empty($password)) {
            $this->command->warn('ADMIN_SEED_PASSWORD not set — skipping admin seeder.');
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
