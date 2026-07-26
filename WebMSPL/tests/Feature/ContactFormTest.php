<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_loads(): void
    {
        $response = $this->get('/hubungi-kami');

        $response->assertStatus(200);
    }

    public function test_contact_form_submission(): void
    {
        $response = $this->post('/contact-submit', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => 'Test message body.',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_contact_form_validation(): void
    {
        $response = $this->post('/contact-submit', [
            'name' => '',
            'email' => 'not-an-email',
            'message' => '',
        ]);

        $response->assertStatus(302);
    }
}
