<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Every key the public site expects. Grouped for the admin edit-form layout.
     */
    public const KEYS = [
        'navigation' => ['nav_about', 'nav_practice', 'nav_team', 'nav_reviews', 'nav_blog', 'nav_contact', 'nav_cta'],
        'hero' => ['hero_badge', 'hero_title', 'hero_subtitle', 'hero_image', 'hero_primary_cta', 'hero_secondary_cta'],
        'stats' => ['stat_practice_areas', 'stat_practice_areas_label', 'stat_cases_handled', 'stat_cases_handled_label', 'stat_years_experience', 'stat_years_experience_label', 'stat_countries', 'stat_countries_label'],
        'about' => ['about_title', 'about_text1', 'about_text2', 'about_image1', 'about_image2', 'about_image3', 'about_badge_country', 'about_badge_city'],
        'mission_vision' => ['mission_title', 'mission_text', 'mission_tagline', 'vision_title', 'vision_text', 'vision_tagline'],
        'practice_intro' => ['practice_title', 'practice_subtitle', 'practice_cta'],
        'promise' => ['promise_image', 'promise_title', 'promise1_title', 'promise1_text', 'promise2_title', 'promise2_text', 'promise3_title', 'promise3_text'],
        'track_record_intro' => ['track_record_title'],
        'team_intro' => ['team_eyebrow', 'team_title', 'team_subtitle', 'team_cta'],
        'testimonials_intro' => ['testimonials_eyebrow', 'testimonials_title'],
        'blog_intro' => ['blog_eyebrow', 'blog_title', 'blog_subtitle', 'blog_browse_cta', 'newsletter_title', 'newsletter_text', 'newsletter_button', 'newsletter_note'],
        'faq_intro' => ['faq_eyebrow', 'faq_title'],
        'contact' => ['contact_eyebrow', 'contact_title', 'contact_subtitle', 'address', 'phone', 'email', 'whatsapp', 'office_hours_title', 'office_hours_weekday', 'office_hours_saturday', 'office_hours_note', 'contact_submit_label', 'contact_success_title', 'contact_success_text', 'privacy_note'],
        'general' => ['site_name', 'site_tagline', 'logo', 'footer_text', 'copyright_text'],
    ];

    private const IMAGE_KEYS = ['logo', 'hero_image', 'about_image1', 'about_image2', 'about_image3', 'promise_image'];

    public function edit()
    {
        $settings = Setting::pluck('value', 'key');

        return view('admin.settings.edit', [
            'settings' => $settings,
            'groups' => self::KEYS,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo_upload' => ['nullable', 'image', 'max:4096'],
            'hero_image_upload' => ['nullable', 'image', 'max:8192'],
            'about_image1_upload' => ['nullable', 'image', 'max:8192'],
            'about_image2_upload' => ['nullable', 'image', 'max:8192'],
            'about_image3_upload' => ['nullable', 'image', 'max:8192'],
            'promise_image_upload' => ['nullable', 'image', 'max:8192'],
        ]);

        foreach (self::KEYS as $group => $keys) {
            foreach ($keys as $key) {
                if ($request->has($key)) {
                    Setting::set($key, $request->input($key), $group);
                }
            }
        }

        foreach (self::IMAGE_KEYS as $key) {
            $uploadKey = $key . '_upload';
            if (! $request->hasFile($uploadKey)) {
                continue;
            }

            $current = Setting::get($key);
            if ($current && str_starts_with($current, 'storage/site/')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $current));
            }

            $path = $request->file($uploadKey)->store('site', 'public');
            $group = collect(self::KEYS)->first(fn ($keys) => in_array($key, $keys, true), []);
            $groupName = array_search($group, self::KEYS, true) ?: 'general';
            Setting::set($key, 'storage/' . $path, $groupName);
        }

        return back()->with('status', 'Settings updated.');
    }
}
