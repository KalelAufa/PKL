<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_news_index_page_loads(): void
    {
        $response = $this->get('/berita');

        $response->assertStatus(200);
    }

    public function test_news_detail_page_loads(): void
    {
        $category = Category::factory()->create();
        $news = News::factory()->create([
            'category_id' => $category->id,
            'status' => 'published',
        ]);

        $response = $this->get('/berita/' . $news->slug);

        $response->assertStatus(200);
        $response->assertSee($news->title);
    }

    public function test_draft_news_not_visible(): void
    {
        $category = Category::factory()->create();
        $news = News::factory()->create([
            'category_id' => $category->id,
            'status' => 'draft',
        ]);

        $response = $this->get('/berita/' . $news->slug);

        $response->assertStatus(404);
    }
}
