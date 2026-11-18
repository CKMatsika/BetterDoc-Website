<?php

namespace Tests\Feature;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_redirected_to_login(): void
    {
        $this->get(route('admin.leads.index'))->assertRedirect(route('admin.login'));
    }

    public function test_non_admin_cannot_access(): void
    {
        $user = User::factory()->create(['is_admin' => false, 'password' => bcrypt('secret')]);
        $this->actingAs($user)->get(route('admin.leads.index'))->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_login_and_view_leads(): void
    {
        $user = User::factory()->create(['is_admin' => true, 'email' => 'admin@test.com', 'password' => bcrypt('secret')]);
        $this->post(route('admin.login.store'), ['email' => 'admin@test.com', 'password' => 'secret'])->assertRedirect(route('admin.leads.index'));
        $this->get(route('admin.leads.index'))->assertStatus(200);
    }

    public function test_admin_can_mark_contacted(): void
    {
        $user = User::factory()->create(['is_admin' => true, 'email' => 'admin@test.com', 'password' => bcrypt('secret')]);
        $this->actingAs($user);
        $lead = Lead::factory()->create();
        $this->patch(route('admin.leads.contacted', $lead))->assertRedirect();
        $this->assertDatabaseHas('leads', ['id' => $lead->id, 'status' => 'contacted']);
    }

    public function test_admin_csv_export_neutralizes_formula_injection(): void
    {
        $user = User::factory()->create(['is_admin' => true, 'email' => 'admin@test.com', 'password' => bcrypt('secret')]);
        Lead::factory()->create([
            'name' => '=CMD()',
            'organisation' => '+Acme Corp',
        ]);

        $response = $this->actingAs($user)->get(route('admin.leads.export'));
        $response->assertStatus(200);
        $content = $response->streamedContent();
        $this->assertStringContainsString("'=CMD()", $content);
        $this->assertStringContainsString("'+Acme Corp", $content);
    }
}
