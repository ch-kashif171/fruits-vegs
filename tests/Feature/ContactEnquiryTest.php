<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Services\CaptchaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactEnquiryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Page::factory()->create(['slug' => 'home']);
        Page::factory()->create(['slug' => 'contact']);
    }

    public function test_home_page_displays_captcha_and_honeypot(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('Security Verification');
        $response->assertSee('contact_company_website');
        $response->assertSee('name="captcha"', false);
    }

    public function test_contact_page_displays_captcha_and_honeypot(): void
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(200);
        $response->assertSee('Security Verification');
        $response->assertSee('contact_company_website');
        $response->assertSee('name="captcha"', false);
    }

    public function test_captcha_refresh_endpoint_returns_new_question(): void
    {
        $response = $this->getJson(route('captcha.refresh'));

        $response->assertStatus(200)
            ->assertJsonStructure(['question']);

        $this->assertTrue(session()->has('captcha.answer'));
    }

    public function test_contact_submission_fails_with_invalid_captcha(): void
    {
        CaptchaService::fake('15');

        $response = $this->post(route('contact.store'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+97150000000',
            'message' => 'Hello there',
            'captcha' => '99',
        ]);

        $response->assertSessionHasErrors('captcha');
        $this->assertDatabaseCount('enquiries', 0);
    }

    public function test_contact_submission_fails_when_honeypot_is_filled(): void
    {
        CaptchaService::fake('12');

        $response = $this->post(route('contact.store'), [
            'name' => 'Spam Bot',
            'email' => 'bot@spammer.com',
            'phone' => '+97150000000',
            'message' => 'Buy cheap links now',
            'captcha' => '12',
            'contact_company_website' => 'https://spam-domain.com',
        ]);

        $response->assertSessionHasErrors('contact_company_website');
        $this->assertDatabaseCount('enquiries', 0);
    }

    public function test_contact_submission_succeeds_with_correct_captcha(): void
    {
        CaptchaService::fake('14');

        $response = $this->post(route('contact.store'), [
            'name' => 'Real Customer',
            'email' => 'customer@example.com',
            'phone' => '+97150000000',
            'message' => 'Need wholesale vegetables',
            'captcha' => '14',
            'contact_company_website' => '',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('enquiries', [
            'name' => 'Real Customer',
            'email' => 'customer@example.com',
        ]);
    }
}
