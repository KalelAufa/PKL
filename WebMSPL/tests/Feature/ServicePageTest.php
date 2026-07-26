<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServicePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_services_index_page_loads(): void
    {
        $response = $this->get('/layanan');

        $response->assertStatus(200);
    }

    public function test_service_detail_page_loads(): void
    {
        $service = Service::factory()->create([
            'status' => 'published',
        ]);

        $response = $this->get('/layanan/' . $service->slug);

        $response->assertStatus(200);
        $response->assertSee($service->title);
    }

    public function test_invalid_service_slug_returns_404(): void
    {
        $response = $this->get('/layanan/tidak-ada');

        $response->assertStatus(404);
    }
}
