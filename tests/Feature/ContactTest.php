<?php

namespace Tests\Feature;

use App\Mail\LeadReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_submission_saves_lead_and_queues_email(): void
    {
        Mail::fake();
        $response = $this->post(route('contact.store'), [
            'name' => 'Jane',
            'organisation' => 'Org',
            'email' => 'jane@example.com',
            'phone' => '123',
            'industry' => 'corporate',
            'size' => '1-50',
            'message' => 'Hi',
        ]);
        $response->assertRedirect(route('thank-you'));
        $this->assertDatabaseHas('leads', ['email' => 'jane@example.com']);
        Mail::assertQueued(LeadReceived::class);
    }

    public function test_validation_fails(): void
    {
        $this->post(route('contact.store'), [])->assertSessionHasErrors(['name', 'organisation', 'email', 'industry', 'size']);
    }

    public function test_throttling(): void
    {
        for ($i = 0; $i < 6; $i++) {
            $this->post(route('contact.store'), [
                'name' => 'Jane',
                'organisation' => 'Org',
                'email' => 'jane@example.com',
                'industry' => 'corporate',
                'size' => '1-50',
            ]);
        }
        $this->post(route('contact.store'), [
            'name' => 'Jane',
            'organisation' => 'Org',
            'email' => 'jane@example.com',
            'industry' => 'corporate',
            'size' => '1-50',
        ])->assertStatus(429);
    }

    public function test_honeypot_redirects(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Bot',
            'organisation' => 'Org',
            'email' => 'bot@example.com',
            'industry' => 'corporate',
            'size' => '1-50',
            'website' => 'spam',
        ])->assertRedirect(route('thank-you'));
        $this->assertDatabaseMissing('leads', ['email' => 'bot@example.com']);
    }
}
