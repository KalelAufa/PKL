<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'title' => fake()->words(2, true),
            'slug' => fake()->unique()->slug(2),
            'excerpt' => fake()->paragraph(1),
            'description' => fake()->paragraphs(2, true),
            'status' => 'published',
            'order' => fake()->numberBetween(0, 10),
        ];
    }
}
