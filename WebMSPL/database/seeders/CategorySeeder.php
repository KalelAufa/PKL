<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Perusahaan', 'Layanan', 'CSR', 'Penghargaan'];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => strtolower($name),
            ]);
        }
    }
}
