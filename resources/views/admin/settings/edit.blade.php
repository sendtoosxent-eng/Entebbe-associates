@extends('layouts.admin')

@section('title', 'Website Editor')

@section('content')

<div class="bg-[#0a2540] text-white rounded-xl p-5 sm:p-6 mb-6">
  <h2 class="font-bold text-lg">Edit the full public website</h2>
  <p class="text-blue-100/80 text-sm mt-1">Use the sections below for global page copy and images. Manage repeatable content with the dedicated editors.</p>
  <div class="flex flex-wrap gap-2 mt-4">
    <a href="{{ route('admin.practice-areas.index') }}" class="bg-white/10 hover:bg-white/20 px-3 py-2 rounded-lg text-xs font-semibold">Practice Areas</a>
    <a href="{{ route('admin.team-members.index') }}" class="bg-white/10 hover:bg-white/20 px-3 py-2 rounded-lg text-xs font-semibold">Team</a>
    <a href="{{ route('admin.track-records.index') }}" class="bg-white/10 hover:bg-white/20 px-3 py-2 rounded-lg text-xs font-semibold">Track Record</a>
    <a href="{{ route('admin.testimonials.index') }}" class="bg-white/10 hover:bg-white/20 px-3 py-2 rounded-lg text-xs font-semibold">Testimonials</a>
    <a href="{{ route('admin.blog-posts.index') }}" class="bg-white/10 hover:bg-white/20 px-3 py-2 rounded-lg text-xs font-semibold">Articles</a>
    <a href="{{ route('admin.faqs.index') }}" class="bg-white/10 hover:bg-white/20 px-3 py-2 rounded-lg text-xs font-semibold">FAQs</a>
  </div>
</div>

@php
  // Human-friendly labels + input type per key. Anything not listed falls back to a text input.
  $fieldMeta = [
    'nav_cta' => ['Navigation CTA', 'text'],
    'hero_badge' => ['Hero Badge Text', 'text'],
    'hero_title' => ['Hero Title', 'text'],
    'hero_subtitle' => ['Hero Subtitle', 'textarea'],
    'hero_image' => ['Hero Background Image', 'image'],

    'stat_practice_areas' => ['Practice Areas Count', 'text'],
    'stat_cases_handled' => ['Cases Handled', 'text'],
    'stat_years_experience' => ['Years Combined Experience', 'text'],
    'stat_countries' => ['East African Countries', 'text'],

    'about_title' => ['About Section Title', 'text'],
    'about_text1' => ['About Paragraph 1', 'textarea'],
    'about_text2' => ['About Paragraph 2', 'textarea'],
    'about_image1' => ['About Image 1', 'image'],
    'about_image2' => ['About Image 2', 'image'],
    'about_image3' => ['About Image 3', 'image'],
    'about_badge_country' => ['Country Badge', 'text'],
    'about_badge_city' => ['City / HQ Badge', 'text'],

    'mission_text' => ['Mission Statement', 'textarea'],
    'vision_text' => ['Vision Statement', 'textarea'],

    'promise_image' => ['Promise Section Image', 'image'],
    'promise_title' => ['Promise Section Title', 'text'],

    'address' => ['Office Address', 'textarea'],
    'phone' => ['Phone Number', 'text'],
    'email' => ['Email Address', 'text'],
    'whatsapp' => ['WhatsApp Number (digits only, no +)', 'text'],
    'office_hours_weekday' => ['Weekday Hours', 'text'],
    'office_hours_saturday' => ['Saturday Hours', 'text'],
    'office_hours_note' => ['Additional Note', 'text'],

    'site_name' => ['Site / Firm Name', 'text'],
    'site_tagline' => ['Tagline', 'text'],
    'logo' => ['Firm Logo', 'image'],
    'footer_text' => ['Footer Description', 'textarea'],
  ];

  $longTextKeys = [
    'practice_subtitle', 'promise1_text', 'promise2_text', 'promise3_text',
    'team_subtitle', 'blog_subtitle', 'newsletter_text', 'newsletter_note',
    'contact_subtitle', 'contact_success_text', 'privacy_note', 'copyright_text',
  ];

  $groupLabels = [
    'navigation' => 'Navigation & Buttons',
    'hero' => 'Hero Section',
    'stats' => 'Stats Band',
    'about' => 'About Section',
    'mission_vision' => 'Mission & Vision',
    'practice_intro' => 'Practice Areas Introduction',
    'promise' => 'Our Promise',
    'track_record_intro' => 'Track Record Introduction',
    'team_intro' => 'Team Introduction',
    'testimonials_intro' => 'Testimonials Introduction',
    'blog_intro' => 'Blog & Newsletter',
    'faq_intro' => 'FAQ Introduction',
    'contact' => 'Contact Information',
    'general' => 'General',
  ];
@endphp

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
  @csrf
  @method('PUT')

  @foreach($groups as $groupKey => $keys)
  <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
      <h3 class="font-bold text-[#000f22]">{{ $groupLabels[$groupKey] ?? ucfirst($groupKey) }}</h3>
    </div>
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
      @foreach($keys as $key)
        @php
          [$label, $type] = $fieldMeta[$key] ?? [ucwords(str_replace('_', ' ', $key)), in_array($key, $longTextKeys, true) ? 'textarea' : 'text'];
          $currentValue = old($key, $settings[$key] ?? '');
          $previewUrl = $currentValue ? asset($currentValue) : null;
        @endphp
        <div class="{{ in_array($type, ['textarea', 'image'], true) ? 'md:col-span-2' : '' }}">
          <label for="setting-{{ $key }}" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">{{ $label }}</label>
          @if($type === 'textarea')
            <textarea id="setting-{{ $key }}" name="{{ $key }}" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] focus:border-transparent outline-none">{{ $currentValue }}</textarea>
          @elseif($type === 'image')
            <div class="flex flex-col sm:flex-row gap-4 items-start">
              @if($previewUrl)
                <img src="{{ $previewUrl }}" alt="Current {{ strtolower($label) }}" class="w-32 h-24 rounded-lg object-cover border border-gray-200 bg-gray-50">
              @endif
              <div class="flex-1 space-y-2">
                <input id="setting-{{ $key }}" type="file" name="{{ $key }}_upload" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:rounded-lg file:border-0 file:bg-[#000f22] file:px-4 file:py-2.5 file:text-sm file:font-semibold file:text-white hover:file:bg-[#7b5800]">
                <input type="text" name="{{ $key }}" value="{{ $currentValue }}" aria-label="Existing {{ strtolower($label) }} path" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-xs text-gray-500 focus:ring-2 focus:ring-[#7b5800] outline-none">
                <p class="text-xs text-gray-400">Upload a replacement or keep/edit the existing path.</p>
              </div>
            </div>
          @else
            <input id="setting-{{ $key }}" type="text" name="{{ $key }}" value="{{ $currentValue }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] focus:border-transparent outline-none">
          @endif
        </div>
      @endforeach
    </div>
  </div>
  @endforeach

  <div class="sticky bottom-0 bg-white border border-gray-200 rounded-xl p-4 flex justify-end shadow-lg">
    <button type="submit" class="bg-[#000f22] text-white px-8 py-3 rounded-lg font-semibold text-sm hover:bg-[#7b5800] transition-all">
      Save Settings
    </button>
  </div>
</form>

@endsection
