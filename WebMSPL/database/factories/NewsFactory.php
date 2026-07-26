<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(2),
            'excerpt' => fake()->paragraph(1),
            'content' => fake()->paragraphs(3, true),
            'category_id' => Category::factory(),
            'author_id' => User::factory(),
            'status' => 'published',
            'is_featured' => false,
            'published_at' => now(),
        ];
    }
}
