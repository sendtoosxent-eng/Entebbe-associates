<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\User;
use Database\Seeders\SettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSiteSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_admin_can_view_every_website_settings_group(): void
    {
        $this->seed(SettingSeeder::class);
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->get(route('admin.settings.edit'))
            ->assertOk()
            ->assertSee('Navigation &amp; Buttons', false)
            ->assertSee('Blog &amp; Newsletter', false)
            ->assertSee('Contact Information', false);
    }

    public function test_an_admin_can_update_public_website_copy(): void
    {
        $this->seed(SettingSeeder::class);
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->put(route('admin.settings.update'), [
                'hero_title' => 'Trusted Counsel for East Africa',
                'contact_title' => 'Speak With Our Legal Team',
            ])
            ->assertRedirect();

        $this->assertSame('Trusted Counsel for East Africa', Setting::get('hero_title'));
        $this->assertSame('Speak With Our Legal Team', Setting::get('contact_title'));
    }
}
