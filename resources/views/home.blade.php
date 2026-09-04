<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $settings['site_name'] ?? 'Entebbe Associated Advocates' }} | {{ $settings['site_tagline'] ?? 'Defining Clarity & Results' }}</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
  .glass-chat { backdrop-filter: blur(12px); background-color: rgba(255,255,255,0.95); border: 1px solid rgba(226,232,240,0.5); }
  .practice-card:hover .icon-box { transform: scale(1.1); color: #7b5800; }
  .chat-bubble-in { animation: bubbleIn 0.3s ease forwards; }
  @keyframes bubbleIn { from { opacity:0; transform:translateY(8px); } to { opacity:1; transform:translateY(0); } }
  .typing-dot { animation: typingPulse 1.2s infinite; }
  .typing-dot:nth-child(2) { animation-delay: 0.2s; }
  .typing-dot:nth-child(3) { animation-delay: 0.4s; }
  @keyframes typingPulse { 0%,80%,100% { opacity:.3; transform:scale(0.8); } 40% { opacity:1; transform:scale(1); } }
  .chat-msg-bot { background:#f2f4f6; border-radius:0 16px 16px 16px; }
  .chat-msg-user { background:#0a2540; color:#fff; border-radius:16px 16px 0 16px; margin-left:auto; }
  .team-card-exec { transition: all 0.4s ease; }
  .team-card-exec:hover { transform: translateY(-6px); }
  .team-card-exec:hover .team-overlay { opacity:1; }
  .team-overlay { opacity:0; transition: opacity 0.3s ease; }
  #mobile-menu { display:none; }
  #mobile-menu.open { display:block; }
  .stat-counter { font-variant-numeric: tabular-nums; }
  .team-slider-track { display:flex; transition: transform 0.6s cubic-bezier(0.25,0.46,0.45,0.94); will-change:transform; }
  .team-slide { flex: 0 0 100%; position:relative; }
  .team-avatar-ring { position:relative; width:160px; height:160px; margin:0 auto; }
  .team-avatar-ring::before { content:''; position:absolute; inset:-4px; border-radius:50%; background: conic-gradient(#7b5800 0deg, #fdc34d 90deg, #7b5800 180deg, #0a2540 270deg, #7b5800 360deg); animation: ringRotate 6s linear infinite; }
  .team-avatar-ring::after { content:''; position:absolute; inset:-1px; border-radius:50%; background:white; }
  @keyframes ringRotate { to { transform: rotate(360deg); } }
  .team-avatar-ring img { position:relative; z-index:1; width:152px; height:152px; border-radius:50%; object-fit:cover; object-position:top; top:4px; left:4px; }
  .team-dept-badge { background: rgba(253,195,77,0.15); border:1px solid rgba(253,195,77,0.3); color:#fdc34d; }
  .team-progress-bar { height:3px; background:rgba(255,255,255,0.15); border-radius:999px; overflow:hidden; }
  .team-progress-fill { height:100%; background: linear-gradient(90deg,#7b5800,#fdc34d); border-radius:999px; transition:width 0.1s linear; }
  .team-dot { width:8px; height:8px; border-radius:50%; background:rgba(255,255,255,0.3); transition:all 0.3s ease; cursor:pointer; }
  .team-dot.active { background:#fdc34d; width:24px; border-radius:4px; }
  .team-nav-btn { width:48px; height:48px; border-radius:50%; border:1px solid rgba(255,255,255,0.2); background:rgba(255,255,255,0.05); color:white; display:flex; align-items:center; justify-content:center; transition:all 0.3s; cursor:pointer; }
  .team-nav-btn:hover { background:rgba(123,88,0,0.4); border-color:#7b5800; }
  .team-stat-card { background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.1); border-radius:12px; padding:16px; text-align:center; }
  .expertise-pill { background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); color:rgba(255,255,255,0.8); font-size:12px; padding:4px 12px; border-radius:999px; display:inline-block; }
  .testi-track { display:flex; transition: transform 0.55s cubic-bezier(0.25,0.46,0.45,0.94); }
  .testi-slide { flex:0 0 100%; }
  .testi-dot { width:8px; height:8px; border-radius:50%; background:rgba(255,255,255,0.25); transition:all 0.3s; cursor:pointer; }
  .testi-dot.active { background:#fdc34d; width:28px; border-radius:4px; }
  .blog-card { transition: transform 0.35s ease, box-shadow 0.35s ease; }
  .blog-card:hover { transform: translateY(-6px); box-shadow: 0 20px 60px rgba(0,15,34,0.12); }
  .blog-card:hover .blog-img { transform: scale(1.07); }
  .blog-img { transition: transform 0.6s ease; }
  .blog-category-badge { font-size:11px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; padding:3px 10px; border-radius:4px; }
  .blog-read-more { position:relative; font-weight:700; color:#7b5800; }
  .blog-read-more::after { content:''; position:absolute; bottom:-2px; left:0; width:0; height:2px; background:#7b5800; transition:width 0.3s ease; }
  .blog-card:hover .blog-read-more::after { width:100%; }
  .contact-actions { transition: opacity .2s ease, transform .2s ease, visibility .2s; }
  .contact-actions.is-closed { opacity:0; transform:translateY(12px); visibility:hidden; pointer-events:none; }
  @media (max-width:767px) {
    .mobile-section { padding-top:2.75rem; padding-bottom:2.75rem; }
    .mobile-card { padding:1.5rem; }
  }
</style>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-secondary-container selection:text-on-secondary-container">

@php
  $logo = $settings['logo'] ?? null;
  $logoSrc = $logo ? asset($logo) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuCwD4AlJB1B2JwhDgq5YZzcHCiXSJiZUjOhoLB-sgKlFXXDo52PEXnwYWGUvsRxk8Ern960cRzDSt0qK-CAv7vyydiXigkfgXbiK7gZkU9yrnCWdCH7uEaLTsTOhRZWohWcs65eRvuDFV00t1Dm_eVWMU-B0H4vHcMrRc7lEj5QrYbuibj9u-__QczOtshN8OzKhABra-FLcVTgNk627cyHDiPkEW1iMQ25H_aHPiwXO848wA9AodqhTkL3xw67khoxcr-_EpY0UQ';
  $featuredPost = $blogPosts->firstWhere('is_featured', true) ?? $blogPosts->first();
  $otherPosts = $blogPosts->reject(fn($p) => $featuredPost && $p->id === $featuredPost->id)->values();
  $sidePosts = $otherPosts->slice(0, 2);
  $bottomPosts = $otherPosts->slice(2, 2);
@endphp

<!-- ═══════════════════════════════ TOP NAV ═══════════════════════════════ -->
<nav class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md border-b border-outline-variant/30" id="main-nav">
  <div class="max-w-[1280px] mx-auto px-6 flex justify-between items-center h-16">
    <a href="{{ route('home') }}" class="flex items-center" aria-label="{{ $settings['site_name'] ?? 'Entebbe Associated Advocates' }} home">
      <img src="{{ $logoSrc }}" alt="{{ $settings['site_name'] ?? 'Entebbe Associated Advocates' }} Logo" class="h-14 md:h-[3.75rem] w-auto object-contain">
    </a>
    <div class="hidden md:flex items-center gap-8">
      <a class="nav-link text-on-surface-variant hover:text-secondary transition-colors duration-300 font-body-md" href="#about">{{ $settings['nav_about'] ?? 'About' }}</a>
      <a class="nav-link text-on-surface-variant hover:text-secondary transition-colors duration-300 font-body-md" href="#practice-areas">{{ $settings['nav_practice'] ?? 'Practice Areas' }}</a>
      <a class="nav-link text-on-surface-variant hover:text-secondary transition-colors duration-300 font-body-md" href="#our-team">{{ $settings['nav_team'] ?? 'Our Team' }}</a>
      <a class="nav-link text-on-surface-variant hover:text-secondary transition-colors duration-300 font-body-md" href="#testimonials">{{ $settings['nav_reviews'] ?? 'Reviews' }}</a>
      <a class="nav-link text-on-surface-variant hover:text-secondary transition-colors duration-300 font-body-md" href="#blog">{{ $settings['nav_blog'] ?? 'Blog' }}</a>
      <a class="nav-link text-on-surface-variant hover:text-secondary transition-colors duration-300 font-body-md" href="#contact">{{ $settings['nav_contact'] ?? 'Contact' }}</a>
      <button onclick="document.getElementById('contact').scrollIntoView({behavior:'smooth'})" class="bg-primary-container text-on-primary px-6 py-2 rounded-lg font-label-md hover:bg-secondary transition-all active:scale-95">
        {{ $settings['nav_cta'] ?? 'Consultation' }}
      </button>
    </div>
    <button id="menu-btn" class="md:hidden flex flex-col gap-1.5 p-2" aria-label="Open navigation menu" aria-controls="mobile-menu" aria-expanded="false">
      <span class="w-6 h-0.5 bg-primary block transition-all" id="bar1"></span>
      <span class="w-6 h-0.5 bg-primary block transition-all" id="bar2"></span>
      <span class="w-6 h-0.5 bg-primary block transition-all" id="bar3"></span>
    </button>
  </div>
  <div id="mobile-menu" class="md:hidden bg-surface border-t border-outline-variant/30 px-6 py-4 space-y-4">
    <a href="#about" class="block text-on-surface-variant hover:text-secondary py-2 font-body-md mobile-nav-link">{{ $settings['nav_about'] ?? 'About' }}</a>
    <a href="#practice-areas" class="block text-on-surface-variant hover:text-secondary py-2 font-body-md mobile-nav-link">{{ $settings['nav_practice'] ?? 'Practice Areas' }}</a>
    <a href="#our-team" class="block text-on-surface-variant hover:text-secondary py-2 font-body-md mobile-nav-link">{{ $settings['nav_team'] ?? 'Our Team' }}</a>
    <a href="#testimonials" class="block text-on-surface-variant hover:text-secondary py-2 font-body-md mobile-nav-link">{{ $settings['nav_reviews'] ?? 'Reviews' }}</a>
    <a href="#blog" class="block text-on-surface-variant hover:text-secondary py-2 font-body-md mobile-nav-link">{{ $settings['nav_blog'] ?? 'Blog' }}</a>
    <a href="#contact" class="block text-on-surface-variant hover:text-secondary py-2 font-body-md mobile-nav-link">{{ $settings['nav_contact'] ?? 'Contact' }}</a>
    <button onclick="document.getElementById('contact').scrollIntoView({behavior:'smooth'})" class="w-full bg-primary-container text-on-primary px-6 py-3 rounded-lg font-label-md hover:bg-secondary transition-all">
      {{ $settings['hero_primary_cta'] ?? 'Schedule a Consultation' }}
    </button>
  </div>
</nav>

<!-- ═══════════════════════════════ HERO ═══════════════════════════════ -->
<header class="relative min-h-[88vh] md:min-h-screen flex items-center pt-20 md:pt-16 overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img class="w-full h-full object-cover" src="{{ asset($settings['hero_image'] ?? 'images/law-firm.jpg') }}" alt="Kampala legal district skyline">
    <div class="absolute inset-0 bg-primary/60 backdrop-blur-[2px]"></div>
  </div>
  <div class="relative z-10 max-w-[1280px] mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
    <div class="space-y-6 md:space-y-8 py-12 md:py-0">
      <div class="inline-block px-4 py-1 border-l-4 border-secondary bg-white/10 backdrop-blur-sm">
        <span class="font-label-md text-secondary tracking-widest uppercase">{{ $settings['hero_badge'] ?? 'Premier Legal Counsel' }}</span>
      </div>
      <h1 class="font-display-lg text-display-lg text-white leading-tight">
        {{ $settings['hero_title'] ?? 'Defining Clarity, Responsiveness, and Results.' }}
      </h1>
      <p class="font-body-lg text-body-lg text-primary-fixed max-w-xl">
        {{ $settings['hero_subtitle'] ?? '' }}
      </p>
      <div class="flex flex-col sm:flex-row gap-3 md:gap-4 pt-2 md:pt-4">
        <button onclick="document.getElementById('contact').scrollIntoView({behavior:'smooth'})" class="bg-secondary-container text-on-secondary-fixed border-2 border-secondary-container px-6 md:px-8 py-3.5 md:py-4 font-label-md hover:bg-secondary-fixed hover:border-secondary-fixed transition-all duration-300 shadow-lg shadow-black/20">
          {{ $settings['hero_primary_cta'] ?? 'Schedule a Consultation' }}
        </button>
        <button onclick="document.getElementById('practice-areas').scrollIntoView({behavior:'smooth'})" class="bg-transparent text-white border border-white/30 px-8 py-4 font-label-md hover:bg-white/10 transition-all">
          {{ $settings['hero_secondary_cta'] ?? 'View Practice Areas' }}
        </button>
      </div>
    </div>
  </div>
</header>

<!-- ═══════════════════════════════ STATS BAND ═══════════════════════════════ -->
<section class="bg-primary-container py-12">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
      <div>
        <div class="font-display-lg text-4xl md:text-5xl text-white stat-counter" data-target="{{ $settings['stat_practice_areas'] ?? $practiceAreas->count() }}">0</div>
        <p class="font-label-md text-primary-fixed-dim uppercase mt-2">{{ $settings['stat_practice_areas_label'] ?? 'Practice Areas' }}</p>
      </div>
      <div>
        <div class="font-display-lg text-4xl md:text-5xl text-white stat-counter" data-target="{{ $settings['stat_cases_handled'] ?? 0 }}">0</div>
        <p class="font-label-md text-primary-fixed-dim uppercase mt-2">{{ $settings['stat_cases_handled_label'] ?? 'Cases Handled' }}</p>
      </div>
      <div>
        <div class="font-display-lg text-4xl md:text-5xl text-white stat-counter" data-target="{{ $settings['stat_years_experience'] ?? 0 }}">0</div>
        <p class="font-label-md text-primary-fixed-dim uppercase mt-2">{{ $settings['stat_years_experience_label'] ?? 'Years Combined Exp.' }}</p>
      </div>
      <div>
        <div class="font-display-lg text-4xl md:text-5xl text-white">{{ $settings['stat_countries'] ?? 3 }}</div>
        <p class="font-label-md text-primary-fixed-dim uppercase mt-2">{{ $settings['stat_countries_label'] ?? 'East African Countries' }}</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ ABOUT ═══════════════════════════════ -->
<section class="py-section-padding-desktop mobile-section bg-white" id="about">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
      <div class="lg:col-span-7 space-y-6">
        <h2 class="font-headline-lg text-headline-lg text-primary">{{ $settings['about_title'] ?? 'A Legacy of Technical Excellence' }}</h2>
        <div class="w-20 h-1 bg-secondary"></div>
        <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">{{ $settings['about_text1'] ?? '' }}</p>
        <p class="font-body-md text-body-md text-on-surface-variant">{{ $settings['about_text2'] ?? '' }}</p>
      </div>
      <div class="lg:col-span-5 grid grid-cols-2 gap-4">
        <div class="space-y-4 pt-8">
          <div class="h-48 rounded-xl overflow-hidden shadow-lg">
            <img class="w-full h-full object-cover" src="{{ asset($settings['about_image1'] ?? 'images/office.jpeg') }}" alt="Legal books">
          </div>
          <div class="bg-secondary-container p-6 rounded-xl">
            <span class="text-display-lg font-display-lg text-on-secondary-container">{{ $practiceAreas->count() }}+</span>
            <p class="font-label-md text-on-secondary-container uppercase">Practice Areas</p>
          </div>
        </div>
        <div class="space-y-4">
          <div class="bg-primary p-6 rounded-xl h-48 flex flex-col justify-end">
            <span class="text-headline-md font-display-lg text-white">{{ $settings['about_badge_country'] ?? 'Uganda' }}</span>
            <p class="font-label-sm text-primary-fixed-dim">{{ $settings['about_badge_city'] ?? 'Headquartered in Entebbe' }}</p>
          </div>
          <div class="h-64 rounded-xl overflow-hidden shadow-lg">
            <img class="w-full h-full object-cover" src="{{ asset($settings['about_image2'] ?? 'images/slider1.jpeg') }}" alt="Conference room">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ MISSION & VISION ═══════════════════════════════ -->
<section class="py-section-padding-desktop mobile-section bg-surface-container-low" id="mission">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="bg-white p-12 mobile-card border border-outline-variant/30 rounded-xl relative overflow-hidden group">
        <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity">
          <span class="material-symbols-outlined text-[120px] text-primary">track_changes</span>
        </div>
        <h3 class="font-headline-md text-headline-md text-primary mb-6 relative z-10">{{ $settings['mission_title'] ?? 'Our Mission' }}</h3>
        <p class="font-body-lg text-body-lg text-on-surface-variant relative z-10">{{ $settings['mission_text'] ?? '' }}</p>
        <div class="mt-8 flex items-center text-secondary font-bold gap-2">
          <span class="w-8 h-[2px] bg-secondary"></span> {{ $settings['mission_tagline'] ?? 'Strategic Excellence' }}
        </div>
      </div>
      <div class="bg-primary p-12 mobile-card rounded-xl relative overflow-hidden group">
        <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity">
          <span class="material-symbols-outlined text-[120px] text-white">visibility</span>
        </div>
        <h3 class="font-headline-md text-headline-md text-white mb-6 relative z-10">{{ $settings['vision_title'] ?? 'Our Vision' }}</h3>
        <p class="font-body-lg text-body-lg text-primary-fixed-dim relative z-10">{{ $settings['vision_text'] ?? '' }}</p>
        <div class="mt-8 flex items-center text-secondary-fixed font-bold gap-2">
          <span class="w-8 h-[2px] bg-secondary-fixed"></span> {{ $settings['vision_tagline'] ?? 'Future-Ready Counsel' }}
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ PRACTICE AREAS ═══════════════════════════════ -->
<section class="py-section-padding-desktop mobile-section" id="practice-areas">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="text-center mb-10 md:mb-16 space-y-4">
      <h2 class="font-headline-lg text-headline-lg text-primary">{{ $settings['practice_title'] ?? 'Specialized Legal Practice' }}</h2>
      <p class="text-on-surface-variant max-w-2xl mx-auto">{{ $settings['practice_subtitle'] ?? 'Comprehensive expertise across core legal disciplines designed for the modern enterprise.' }}</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach($practiceAreas as $area)
      <div class="practice-card bg-white p-8 mobile-card border border-outline-variant/30 rounded-xl hover:shadow-xl transition-all duration-300 flex flex-col group">
        <div class="icon-box text-primary mb-6 transition-transform"><span class="material-symbols-outlined text-4xl">{{ $area->icon }}</span></div>
        <h4 class="font-headline-md text-headline-md text-primary mb-3">{{ $area->title }}</h4>
        <p class="text-on-surface-variant text-body-md flex-grow">{{ $area->description }}</p>
        <a class="mt-6 text-secondary font-bold inline-flex items-center gap-2 group-hover:gap-4 transition-all" href="#contact" aria-label="Discuss {{ $area->title }} with our team">{{ $settings['practice_cta'] ?? 'Discuss your matter' }} <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ OUR PROMISE ═══════════════════════════════ -->
<section class="py-section-padding-desktop mobile-section bg-primary text-white">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
      <div class="relative">
        <img class="rounded-xl shadow-2xl relative z-10 h-[500px] w-full object-cover" src="{{ asset($settings['promise_image'] ?? 'images/promise.jpeg') }}" alt="Professional handshake">
        <div class="absolute -bottom-6 -right-6 w-40 h-40 bg-secondary/20 rounded-full blur-3xl"></div>
      </div>
      <div class="space-y-10">
        <h2 class="font-headline-lg text-headline-lg">{{ $settings['promise_title'] ?? 'Our Promise to Clients' }}</h2>
        <div class="space-y-6">
          <div class="flex gap-6">
            <div class="w-12 h-12 flex-shrink-0 bg-secondary/10 flex items-center justify-center rounded-full">
              <span class="material-symbols-outlined text-secondary">verified</span>
            </div>
            <div>
              <h5 class="font-headline-md text-headline-md text-white mb-2">{{ $settings['promise1_title'] ?? 'Unwavering Integrity' }}</h5>
              <p class="text-primary-fixed-dim">{{ $settings['promise1_text'] ?? 'Every action we take is rooted in the highest ethical standards of the legal profession.' }}</p>
            </div>
          </div>
          <div class="flex gap-6">
            <div class="w-12 h-12 flex-shrink-0 bg-secondary/10 flex items-center justify-center rounded-full">
              <span class="material-symbols-outlined text-secondary">psychology</span>
            </div>
            <div>
              <h5 class="font-headline-md text-headline-md text-white mb-2">{{ $settings['promise2_title'] ?? 'Strategic Thinking' }}</h5>
              <p class="text-primary-fixed-dim">{{ $settings['promise2_text'] ?? "We don't just solve legal problems; we provide the strategic foresight needed for growth." }}</p>
            </div>
          </div>
          <div class="flex gap-6">
            <div class="w-12 h-12 flex-shrink-0 bg-secondary/10 flex items-center justify-center rounded-full">
              <span class="material-symbols-outlined text-secondary">flash_on</span>
            </div>
            <div>
              <h5 class="font-headline-md text-headline-md text-white mb-2">{{ $settings['promise3_title'] ?? 'Agile Responsiveness' }}</h5>
              <p class="text-primary-fixed-dim">{{ $settings['promise3_text'] ?? 'In high-stakes business, timing is everything. We respond with the urgency your case demands.' }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ TRACK RECORD ═══════════════════════════════ -->
<section class="py-section-padding-desktop bg-surface-container-highest overflow-hidden">
  <div class="max-w-[1280px] mx-auto px-6">
    <h2 class="font-headline-lg text-headline-lg text-primary mb-12 text-center">{{ $settings['track_record_title'] ?? 'Leading Instructions & Track Record' }}</h2>
    <div class="flex flex-col gap-4">
      @foreach($trackRecords as $record)
      <div class="bg-white p-8 rounded-xl flex flex-col md:flex-row justify-between items-center gap-8 border border-outline-variant/30 hover:border-secondary transition-colors group">
        <div class="space-y-2">
          <span class="text-secondary font-label-md uppercase tracking-wider">{{ $record->category }}</span>
          <h4 class="font-headline-md text-headline-md text-primary">{{ $record->title }}</h4>
          <p class="text-on-surface-variant max-w-2xl">{{ $record->description }}</p>
        </div>
        <span class="material-symbols-outlined text-5xl text-outline-variant group-hover:text-secondary transition-colors flex-shrink-0">{{ $record->icon }}</span>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ TEAM — CINEMATIC SLIDER ═══════════════════════════════ -->
<section class="overflow-hidden relative" id="our-team" style="background: linear-gradient(160deg,#000f22 0%,#05192e 60%,#0a2540 100%);">
  <div class="absolute inset-0 pointer-events-none overflow-hidden">
    <div style="position:absolute;top:-80px;right:-80px;width:500px;height:500px;background:radial-gradient(circle,rgba(123,88,0,0.08) 0%,transparent 70%);border-radius:50%;"></div>
    <div style="position:absolute;bottom:-100px;left:-60px;width:400px;height:400px;background:radial-gradient(circle,rgba(253,195,77,0.05) 0%,transparent 70%);border-radius:50%;"></div>
  </div>

  <div class="relative max-w-[1280px] mx-auto px-6 pt-20 pb-10">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
      <div class="space-y-3">
        <div class="flex items-center gap-3">
          <span class="w-10 h-[2px]" style="background:linear-gradient(90deg,#7b5800,#fdc34d);"></span>
          <span class="font-label-md text-secondary tracking-widest uppercase text-xs">{{ $settings['team_eyebrow'] ?? 'The People Behind Your Case' }}</span>
        </div>
        <h2 class="font-headline-lg text-headline-lg text-white">{{ $settings['team_title'] ?? 'Meet Our Team' }}</h2>
        <p class="text-primary-fixed-dim max-w-xl font-body-md">{{ $settings['team_subtitle'] ?? 'Distinguished advocates and professionals with the expertise, integrity, and dedication your matter deserves.' }}</p>
      </div>
      <div class="flex items-center gap-3">
        <button id="team-prev" class="team-nav-btn" aria-label="Previous"><span class="material-symbols-outlined text-xl">arrow_back</span></button>
        <div class="text-primary-fixed-dim font-label-md text-sm px-2">
          <span id="team-current">01</span><span class="text-white/20 mx-1">/</span><span id="team-total">{{ str_pad($teamMembers->count(), 2, '0', STR_PAD_LEFT) }}</span>
        </div>
        <button id="team-next" class="team-nav-btn" aria-label="Next"><span class="material-symbols-outlined text-xl">arrow_forward</span></button>
      </div>
    </div>

    <div class="mt-10 flex gap-3 overflow-x-auto pb-2" id="team-thumbs" style="scrollbar-width:none;">
      @foreach($teamMembers as $member)
      <button data-thumb="{{ $loop->index }}" class="team-thumb flex-shrink-0 flex items-center gap-3 px-4 py-2.5 rounded-full border transition-all duration-300 {{ $loop->first ? 'border-secondary/60 bg-secondary/10' : 'border-white/10 bg-white/5' }}">
        <div class="w-8 h-8 rounded-full overflow-hidden border-2 {{ $loop->first ? 'border-secondary/60' : 'border-white/20' }} flex-shrink-0">
          <img src="{{ $member->photo_url }}" class="w-full h-full object-cover object-top" alt="{{ $member->name }}">
        </div>
        <span class="text-xs font-label-md whitespace-nowrap {{ $loop->first ? 'text-white' : 'text-primary-fixed-dim' }}">{{ $member->name }}</span>
      </button>
      @endforeach
    </div>
  </div>

  <div class="overflow-hidden relative" id="team-viewport">
    <div class="team-slider-track" id="team-track">
      @foreach($teamMembers as $member)
      <div class="team-slide">
        <div class="max-w-[1280px] mx-auto px-6 pb-16">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div class="flex flex-col items-center text-center space-y-6">
              <div class="relative">
                <div class="team-avatar-ring" style="width:200px;height:200px;">
                  <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" style="width:190px;height:190px;top:5px;left:5px;">
                </div>
                <div class="absolute -bottom-4 left-1/2 -translate-x-1/2">
                  <span class="team-dept-badge font-label-md text-xs px-5 py-2 rounded-full whitespace-nowrap shadow-lg">{{ $member->badge }}</span>
                </div>
              </div>
              <div class="pt-6 w-full max-w-xs">
                <div class="flex items-center gap-3 mb-5 justify-center">
                  <span class="flex-1 h-px bg-white/10"></span>
                  <span class="material-symbols-outlined text-secondary text-sm" style="font-variation-settings:'FILL' 1">{{ $member->icon }}</span>
                  <span class="flex-1 h-px bg-white/10"></span>
                </div>
                <div class="grid grid-cols-3 gap-3">
                  <div class="team-stat-card"><p class="text-2xl font-bold text-white">{{ $member->stat1_value }}</p><p class="text-xs text-primary-fixed-dim mt-1">{{ $member->stat1_label }}</p></div>
                  <div class="team-stat-card"><p class="text-2xl font-bold text-white">{{ $member->stat2_value }}</p><p class="text-xs text-primary-fixed-dim mt-1">{{ $member->stat2_label }}</p></div>
                  <div class="team-stat-card"><p class="text-2xl font-bold text-white">{{ $member->stat3_value }}</p><p class="text-xs text-primary-fixed-dim mt-1">{{ $member->stat3_label }}</p></div>
                </div>
              </div>
            </div>
            <div class="space-y-5">
              <div>
                <p class="text-secondary font-label-md uppercase tracking-widest text-xs mb-2">{{ $member->subtitle }}</p>
                <h3 class="font-display-lg text-white mb-1" style="font-size:clamp(2rem,4vw,3.5rem);line-height:1.1;">{{ $member->name }}</h3>
              </div>
              <div style="width:48px;height:2px;background:linear-gradient(90deg,#7b5800,#fdc34d);"></div>
              <p class="text-primary-fixed-dim font-body-md leading-relaxed">{{ $member->bio }}</p>
              <div>
                <p class="text-xs text-primary-fixed-dim/60 uppercase tracking-widest font-label-sm mb-3">Areas of Expertise</p>
                <div class="flex flex-wrap gap-2">
                  @foreach(($member->expertise ?? []) as $skill)
                  <span class="expertise-pill">{{ $skill }}</span>
                  @endforeach
                </div>
              </div>
              <div class="flex flex-wrap gap-3 pt-2">
                <a href="#contact" class="inline-flex items-center gap-2 bg-secondary text-white px-5 py-2.5 rounded-lg font-label-md hover:bg-secondary-fixed-dim transition-all text-sm" aria-label="Request a consultation with {{ $member->name }}">{{ $settings['team_cta'] ?? 'Request a Consultation' }} <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="max-w-[1280px] mx-auto px-6 pb-16 flex flex-col sm:flex-row items-center justify-between gap-6">
    <div class="w-full max-w-xs">
      <div class="team-progress-bar"><div class="team-progress-fill" id="team-progress" style="width:0%"></div></div>
      <p class="text-primary-fixed-dim text-xs mt-2 font-label-sm">Auto-advancing · click names above to navigate</p>
    </div>
    <div class="flex items-center gap-2" id="team-dots">
      @foreach($teamMembers as $member)
      <div class="team-dot {{ $loop->first ? 'active' : '' }}" data-index="{{ $loop->index }}"></div>
      @endforeach
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ TESTIMONIALS SLIDER ═══════════════════════════════ -->
<section class="py-section-padding-desktop bg-primary overflow-hidden" id="testimonials">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
      <div class="space-y-3">
        <div class="flex items-center gap-3">
          <span class="w-8 h-[2px] bg-secondary"></span>
          <span class="font-label-md text-secondary tracking-widest uppercase text-xs">{{ $settings['testimonials_eyebrow'] ?? 'Client Voices' }}</span>
        </div>
        <h2 class="font-headline-lg text-headline-lg text-white">{{ $settings['testimonials_title'] ?? 'What Our Clients Say' }}</h2>
      </div>
      <div class="flex items-center gap-3">
        <button id="testi-prev" class="team-nav-btn" aria-label="Previous testimonial"><span class="material-symbols-outlined text-xl">arrow_back</span></button>
        <button id="testi-next" class="team-nav-btn" aria-label="Next testimonial"><span class="material-symbols-outlined text-xl">arrow_forward</span></button>
      </div>
    </div>
  </div>

  <div class="overflow-hidden" id="testi-viewport">
    <div class="testi-track" id="testi-track">
      @foreach($testimonials as $t)
      <div class="testi-slide px-6">
        <div class="max-w-[1280px] mx-auto">
          <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-center">
            <div class="lg:col-span-2 space-y-6">
              <div class="text-8xl font-display-lg text-secondary opacity-40 leading-none">"</div>
              <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-full bg-secondary/30 border-2 border-secondary/50 flex items-center justify-center flex-shrink-0">
                  <span class="text-secondary font-bold text-xl">{{ $t->initials }}</span>
                </div>
                <div>
                  <p class="text-white font-bold text-lg">{{ $t->client_name }}</p>
                  <p class="text-primary-fixed-dim text-sm">{{ $t->role_company }}</p>
                  <div class="flex gap-1 mt-1">
                    @for($i = 0; $i < $t->rating; $i++)
                    <span class="material-symbols-outlined text-secondary text-sm" style="font-variation-settings:'FILL' 1">star</span>
                    @endfor
                  </div>
                </div>
              </div>
              <div class="flex items-center gap-2 text-primary-fixed-dim text-sm">
                <span class="material-symbols-outlined text-sm">location_on</span> {{ $t->location }}
              </div>
            </div>
            <div class="lg:col-span-3">
              <p class="text-white font-body-lg text-2xl leading-relaxed italic font-display-lg">"{{ $t->quote }}"</p>
              <div class="mt-8 pt-8 border-t border-white/10">
                <span class="text-primary-fixed-dim text-sm">Practice Area:</span>
                <span class="text-secondary font-bold ml-2">{{ $t->practice_area }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="max-w-[1280px] mx-auto px-6 mt-12 flex justify-center gap-2" id="testi-dots">
    @foreach($testimonials as $t)
    <div class="testi-dot {{ $loop->first ? 'active' : '' }}" data-index="{{ $loop->index }}"></div>
    @endforeach
  </div>
</section>

<!-- ═══════════════════════════════ BLOG & NEWS ═══════════════════════════════ -->
<section class="py-section-padding-desktop bg-surface-container-low" id="blog">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
      <div class="space-y-3">
        <div class="flex items-center gap-3">
          <span class="w-8 h-[2px] bg-secondary"></span>
          <span class="font-label-md text-secondary tracking-widest uppercase text-xs">{{ $settings['blog_eyebrow'] ?? 'Legal Insights' }}</span>
        </div>
        <h2 class="font-headline-lg text-headline-lg text-primary">{{ $settings['blog_title'] ?? 'News & Articles' }}</h2>
        <p class="text-on-surface-variant max-w-xl">{{ $settings['blog_subtitle'] ?? 'Stay informed on legal developments shaping business and daily life across East Africa.' }}</p>
      </div>
      <a href="#article-list" class="inline-flex items-center gap-2 border border-outline-variant text-primary px-6 py-3 rounded-lg font-label-md hover:bg-primary hover:text-white hover:border-primary transition-all w-fit flex-shrink-0">{{ $settings['blog_browse_cta'] ?? 'Browse Articles' }} <span class="material-symbols-outlined text-sm">arrow_downward</span></a>
    </div>

    @if($featuredPost)
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 mb-10" id="article-list">
      <div class="lg:col-span-3 blog-card bg-white rounded-2xl overflow-hidden border border-outline-variant/30 flex flex-col">
        <div class="relative overflow-hidden h-72">
          <img src="{{ $featuredPost->image_url }}" alt="{{ $featuredPost->title }}" class="blog-img w-full h-full object-cover">
          <div class="absolute top-4 left-4"><span class="blog-category-badge bg-secondary text-white">Featured</span></div>
          <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-label-sm text-primary">{{ $featuredPost->category }}</div>
        </div>
        <div class="p-8 flex flex-col flex-grow">
          <div class="flex items-center gap-3 text-xs text-on-surface-variant mb-4">
            <span class="material-symbols-outlined text-sm">calendar_today</span> {{ $featuredPost->published_date?->format('F j, Y') }}
            <span class="w-1 h-1 bg-outline-variant rounded-full"></span>
            <span>{{ $featuredPost->read_time }}</span>
          </div>
          <h3 class="font-headline-md text-headline-md text-primary mb-3 group-hover:text-secondary transition-colors">{{ $featuredPost->title }}</h3>
          <p class="text-on-surface-variant font-body-md leading-relaxed mb-6 flex-grow">{{ $featuredPost->excerpt }}</p>
          <div class="flex items-center justify-between border-t border-outline-variant/30 pt-6">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center">
                <span class="text-on-secondary-container text-xs font-bold">{{ $featuredPost->author_initials }}</span>
              </div>
              <span class="text-sm text-on-surface-variant font-label-sm">{{ $featuredPost->author_name }}</span>
            </div>
            <a href="{{ route('articles.show', $featuredPost) }}" class="blog-read-more text-sm font-label-md">Read Article</a>
          </div>
        </div>
      </div>

      <div class="lg:col-span-2 flex flex-col gap-6">
        @foreach($sidePosts as $post)
        <div class="blog-card bg-white rounded-2xl overflow-hidden border border-outline-variant/30 flex gap-0 flex-col sm:flex-row lg:flex-col xl:flex-row">
          <div class="relative overflow-hidden w-full sm:w-36 lg:w-full xl:w-36 h-40 sm:h-auto flex-shrink-0">
            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="blog-img w-full h-full object-cover">
            <div class="absolute top-2 left-2"><span class="blog-category-badge bg-primary-container text-on-primary text-[10px] px-2 py-0.5">{{ $post->category }}</span></div>
          </div>
          <div class="p-5 flex flex-col justify-between">
            <div>
              <p class="text-xs text-on-surface-variant mb-2 flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_today</span> {{ $post->published_date?->format('F j, Y') }}</p>
              <h4 class="font-headline-md text-base text-primary mb-2 leading-snug">{{ $post->title }}</h4>
            </div>
            <a href="{{ route('articles.show', $post) }}" class="blog-read-more text-sm font-label-md mt-3 inline-block">Read More</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach($bottomPosts as $post)
      <div class="blog-card bg-white rounded-2xl overflow-hidden border border-outline-variant/30">
        <div class="relative overflow-hidden h-48">
          <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="blog-img w-full h-full object-cover">
          <div class="absolute top-3 left-3"><span class="blog-category-badge bg-secondary text-white">{{ $post->category }}</span></div>
        </div>
        <div class="p-6">
          <p class="text-xs text-on-surface-variant mb-3 flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_today</span> {{ $post->published_date?->format('M j, Y') }} · {{ $post->read_time }}</p>
          <h4 class="font-headline-md text-lg text-primary mb-3 leading-snug">{{ $post->title }}</h4>
          <p class="text-on-surface-variant text-sm leading-relaxed mb-4">{{ $post->excerpt }}</p>
          <a href="{{ route('articles.show', $post) }}" class="blog-read-more text-sm font-label-md">Read Article</a>
        </div>
      </div>
      @endforeach

      <div class="rounded-2xl overflow-hidden" style="background: linear-gradient(135deg,#000f22 0%,#0a2540 100%);">
        <div class="p-8 h-full flex flex-col justify-between">
          <div>
            <span class="material-symbols-outlined text-secondary text-4xl mb-4 block">mail_outline</span>
            <h4 class="font-headline-md text-xl text-white mb-3">{{ $settings['newsletter_title'] ?? 'Legal Insights Newsletter' }}</h4>
            <p class="text-primary-fixed-dim text-sm leading-relaxed mb-6">{{ $settings['newsletter_text'] ?? 'Get our monthly digest of key legal developments in Uganda and East Africa — straight to your inbox.' }}</p>
          </div>
          <div class="space-y-3">
            <input type="email" placeholder="Your email address" class="w-full bg-white/10 border border-white/20 text-white placeholder-white/40 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-secondary transition-all">
            <button class="w-full bg-secondary text-white py-3 rounded-lg font-label-md hover:bg-secondary-fixed-dim transition-all text-sm">{{ $settings['newsletter_button'] ?? "Subscribe — It's Free" }}</button>
            <p class="text-white/30 text-xs text-center">{{ $settings['newsletter_note'] ?? 'No spam. Unsubscribe anytime.' }}</p>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</section>

<!-- ═══════════════════════════════ FAQ ═══════════════════════════════ -->
<section class="py-section-padding-desktop bg-white" id="faq">
  <div class="max-w-[900px] mx-auto px-6">
    <div class="text-center mb-16 space-y-4">
      <span class="font-label-md text-secondary tracking-widest uppercase">{{ $settings['faq_eyebrow'] ?? 'Common Questions' }}</span>
      <h2 class="font-headline-lg text-headline-lg text-primary">{{ $settings['faq_title'] ?? 'Frequently Asked Questions' }}</h2>
    </div>
    <div class="space-y-4" id="faq-list">
      @foreach($faqs as $faq)
      <div class="faq-item border border-outline-variant/30 rounded-xl overflow-hidden">
        <button class="faq-btn w-full flex justify-between items-center p-6 text-left hover:bg-surface-container-low transition-colors">
          <span class="font-headline-md text-headline-md text-primary pr-4">{{ $faq->question }}</span>
          <span class="material-symbols-outlined text-secondary flex-shrink-0 faq-icon transition-transform">expand_more</span>
        </button>
        <div class="faq-answer hidden px-6 pb-6">
          <p class="text-on-surface-variant font-body-md leading-relaxed">{{ $faq->answer }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ CONTACT ═══════════════════════════════ -->
<section class="py-section-padding-desktop bg-surface-container-low" id="contact">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="text-center mb-16 space-y-4">
      <span class="font-label-md text-secondary tracking-widest uppercase">{{ $settings['contact_eyebrow'] ?? 'Get In Touch' }}</span>
      <h2 class="font-headline-lg text-headline-lg text-primary">{{ $settings['contact_title'] ?? 'Schedule a Consultation' }}</h2>
      <p class="text-on-surface-variant max-w-2xl mx-auto">{{ $settings['contact_subtitle'] ?? 'Tell us about your legal matter. Our team will review your inquiry and get back to you within 2 business hours.' }}</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">
      <div class="lg:col-span-2 space-y-8">
        <div class="bg-white p-8 rounded-2xl border border-outline-variant/30 space-y-6">
          <div class="flex gap-4 items-start">
            <div class="w-12 h-12 bg-secondary-container flex items-center justify-center rounded-full flex-shrink-0">
              <span class="material-symbols-outlined text-on-secondary-container">location_on</span>
            </div>
            <div>
              <p class="font-bold text-primary font-headline-md">Office Address</p>
              <p class="text-on-surface-variant font-body-md mt-1">{!! nl2br(e($settings['address'] ?? '')) !!}</p>
            </div>
          </div>
          <div class="flex gap-4 items-start">
            <div class="w-12 h-12 bg-secondary-container flex items-center justify-center rounded-full flex-shrink-0">
              <span class="material-symbols-outlined text-on-secondary-container">phone</span>
            </div>
            <div>
              <p class="font-bold text-primary font-headline-md">Phone</p>
              <a href="tel:{{ $settings['phone'] ?? '' }}" class="text-secondary hover:underline font-body-md mt-1 block">{{ $settings['phone'] ?? '' }}</a>
            </div>
          </div>
          <div class="flex gap-4 items-start">
            <div class="w-12 h-12 bg-secondary-container flex items-center justify-center rounded-full flex-shrink-0">
              <span class="material-symbols-outlined text-on-secondary-container">mail</span>
            </div>
            <div>
              <p class="font-bold text-primary font-headline-md">Email</p>
              <a href="mailto:{{ $settings['email'] ?? '' }}" class="text-secondary hover:underline font-body-md mt-1 block">{{ $settings['email'] ?? '' }}</a>
            </div>
          </div>
          <div class="flex gap-4 items-start">
            <div class="w-12 h-12 bg-[#25D366]/20 flex items-center justify-center rounded-full flex-shrink-0">
              <span class="material-symbols-outlined text-[#128C7E]">chat</span>
            </div>
            <div>
              <p class="font-bold text-primary font-headline-md">WhatsApp</p>
              <a href="https://wa.me/{{ $settings['whatsapp'] ?? '' }}" target="_blank" class="text-[#128C7E] hover:underline font-body-md mt-1 block">Chat on WhatsApp</a>
            </div>
          </div>
        </div>
        <div class="bg-primary p-8 rounded-2xl">
          <p class="text-secondary font-label-md uppercase tracking-wider mb-2">{{ $settings['office_hours_title'] ?? 'Office Hours' }}</p>
          <p class="text-white font-headline-md mb-4">{{ $settings['office_hours_weekday'] ?? '' }}</p>
          <p class="text-primary-fixed-dim font-body-md">{{ $settings['office_hours_saturday'] ?? '' }}<br>{{ $settings['office_hours_note'] ?? '' }}</p>
        </div>
      </div>

      <div class="lg:col-span-3">
        <div class="bg-white p-10 rounded-2xl border border-outline-variant/30 shadow-sm">
          <div id="form-success" class="hidden text-center py-12 space-y-4">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto">
              <span class="material-symbols-outlined text-green-600 text-4xl" style="font-variation-settings:'FILL' 1">check_circle</span>
            </div>
            <h3 class="font-headline-md text-headline-md text-primary">{{ $settings['contact_success_title'] ?? 'Message Sent!' }}</h3>
            <p class="text-on-surface-variant">{{ $settings['contact_success_text'] ?? 'Thank you for reaching out. We will review your inquiry and get back to you within 2 business hours.' }}</p>
            <button onclick="resetForm()" class="text-secondary font-bold hover:underline font-label-md">Send another message</button>
          </div>
          <form id="contact-form" class="space-y-6" novalidate>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div class="space-y-2">
                <label class="font-label-md text-on-surface-variant uppercase tracking-wide text-xs" for="cf-name">Full Name *</label>
                <input type="text" id="cf-name" name="name" required placeholder="e.g. osxent musisi" class="w-full border border-outline-variant rounded-lg px-4 py-3 font-body-md focus:ring-2 focus:ring-secondary focus:border-transparent transition-all outline-none">
              </div>
              <div class="space-y-2">
                <label class="font-label-md text-on-surface-variant uppercase tracking-wide text-xs" for="cf-phone">Phone Number</label>
                <input type="tel" id="cf-phone" name="phone" placeholder="+256 745678903" class="w-full border border-outline-variant rounded-lg px-4 py-3 font-body-md focus:ring-2 focus:ring-secondary focus:border-transparent transition-all outline-none">
              </div>
            </div>
            <div class="space-y-2">
              <label class="font-label-md text-on-surface-variant uppercase tracking-wide text-xs" for="cf-email">Email Address *</label>
              <input type="email" id="cf-email" name="email" required placeholder="osxent@eaa.com" class="w-full border border-outline-variant rounded-lg px-4 py-3 font-body-md focus:ring-2 focus:ring-secondary focus:border-transparent transition-all outline-none">
            </div>
            <div class="space-y-2">
              <label class="font-label-md text-on-surface-variant uppercase tracking-wide text-xs" for="cf-area">Practice Area</label>
              <select id="cf-area" name="practice_area" class="w-full border border-outline-variant rounded-lg px-4 py-3 font-body-md focus:ring-2 focus:ring-secondary focus:border-transparent transition-all outline-none bg-white">
                <option value="">Select a practice area...</option>
                @foreach($practiceAreas as $area)
                <option>{{ $area->title }}</option>
                @endforeach
                <option>Other</option>
              </select>
            </div>
            <div class="space-y-2">
              <label class="font-label-md text-on-surface-variant uppercase tracking-wide text-xs" for="cf-message">Brief Description of Your Matter *</label>
              <textarea id="cf-message" name="message" required rows="5" placeholder="Please briefly describe your legal matter so we can direct you to the right advocate..." class="w-full border border-outline-variant rounded-lg px-4 py-3 font-body-md focus:ring-2 focus:ring-secondary focus:border-transparent transition-all outline-none resize-none"></textarea>
            </div>
            <div id="form-error" class="hidden bg-red-50 border border-red-200 rounded-lg p-4 text-red-700 font-body-md text-sm"></div>
            <button type="submit" id="submit-btn" class="w-full bg-primary text-on-primary py-4 px-8 rounded-lg font-label-md hover:bg-secondary transition-all active:scale-98 flex items-center justify-center gap-3">
              <span id="btn-text">{{ $settings['contact_submit_label'] ?? 'Send Message' }}</span>
              <span id="btn-loader" class="hidden">
                <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 22 6.477 22 12h-4z"></path>
                </svg>
              </span>
              <span class="material-symbols-outlined text-sm" id="btn-icon">send</span>
            </button>
            <p class="text-xs text-on-surface-variant text-center">{{ $settings['privacy_note'] ?? 'By submitting, you agree to our privacy policy. Your information is strictly confidential.' }}</p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════ FOOTER ═══════════════════════════════ -->
<footer class="bg-primary text-on-primary">
  <div class="max-w-[1280px] mx-auto px-6 py-section-padding-desktop grid grid-cols-1 md:grid-cols-4 gap-8">
    <div class="md:col-span-1 space-y-6">
      <img src="{{ $logoSrc }}" alt="Logo" class="h-20 w-auto object-contain">
      <p class="text-primary-fixed-dim/70 font-body-md">{{ $settings['footer_text'] ?? '' }}</p>
    </div>
    <div class="space-y-4">
      <h5 class="text-secondary-fixed font-bold">Practice Areas</h5>
      <ul class="space-y-2">
        @foreach($practiceAreas->take(5) as $area)
        <li><a class="text-primary-fixed-dim/70 hover:text-secondary-fixed-dim transition-colors" href="#practice-areas">{{ $area->title }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="space-y-4">
      <h5 class="text-secondary-fixed font-bold">Quick Links</h5>
      <ul class="space-y-2">
        <li><a class="text-primary-fixed-dim/70 hover:text-secondary-fixed-dim transition-colors" href="#about">About Us</a></li>
        <li><a class="text-primary-fixed-dim/70 hover:text-secondary-fixed-dim transition-colors" href="#our-team">Our Team</a></li>
        <li><a class="text-primary-fixed-dim/70 hover:text-secondary-fixed-dim transition-colors" href="#testimonials">Client Reviews</a></li>
        <li><a class="text-primary-fixed-dim/70 hover:text-secondary-fixed-dim transition-colors" href="#faq">FAQ</a></li>
        <li><a class="text-primary-fixed-dim/70 hover:text-secondary-fixed-dim transition-colors" href="#contact">Contact</a></li>
      </ul>
    </div>
    <div class="space-y-4">
      <h5 class="text-secondary-fixed font-bold">Contact Office</h5>
      <p class="text-primary-fixed-dim/70">{!! nl2br(e($settings['address'] ?? '')) !!}<br><a href="tel:{{ $settings['phone'] ?? '' }}" class="hover:text-secondary-fixed-dim transition-colors">Tel: {{ $settings['phone'] ?? '' }}</a><br><a href="mailto:{{ $settings['email'] ?? '' }}" class="hover:text-secondary-fixed-dim transition-colors">{{ $settings['email'] ?? '' }}</a></p>
      <div class="flex gap-3 pt-2">
        <a href="https://wa.me/{{ $settings['whatsapp'] ?? '' }}" target="_blank" rel="noopener noreferrer" aria-label="Chat with us on WhatsApp" class="w-10 h-10 bg-[#25D366]/20 hover:bg-[#25D366]/40 flex items-center justify-center rounded-full transition-all">
          <span class="material-symbols-outlined text-[#4ade80] text-sm">chat</span>
        </a>
        <a href="mailto:{{ $settings['email'] ?? '' }}" aria-label="Email our office" class="w-10 h-10 bg-white/10 hover:bg-white/20 flex items-center justify-center rounded-full transition-all">
          <span class="material-symbols-outlined text-white text-sm">mail</span>
        </a>
        <a href="tel:{{ $settings['phone'] ?? '' }}" aria-label="Call our office" class="w-10 h-10 bg-white/10 hover:bg-white/20 flex items-center justify-center rounded-full transition-all">
          <span class="material-symbols-outlined text-white text-sm">call</span>
        </a>
      </div>
    </div>
  </div>
  <div class="border-t border-white/10 text-center py-6 text-sm text-primary-fixed-dim/50 px-6">
    © <span id="footer-year"></span> {{ $settings['site_name'] ?? 'Entebbe Associated Advocates' }}. {{ $settings['copyright_text'] ?? 'All rights reserved. Registered Law Firm, Uganda.' }}
  </div>
</footer>

<!-- ═══════════════════════════════ FLOATING ACTIONS ═══════════════════════════════ -->
<div class="fixed bottom-5 right-4 md:bottom-8 md:right-8 z-50 flex flex-col items-end gap-3">
  <div id="contact-actions" class="contact-actions is-closed flex flex-col items-end gap-2" aria-hidden="true">
    <a class="bg-white text-[#128C7E] rounded-full h-11 px-4 flex items-center gap-2 shadow-lg border border-outline-variant/20 hover:-translate-y-0.5 transition-transform" href="https://wa.me/{{ $settings['whatsapp'] ?? '' }}" target="_blank" rel="noopener noreferrer" aria-label="Chat with our team on WhatsApp">
      <span class="text-sm font-semibold">WhatsApp</span><span class="material-symbols-outlined text-xl">chat</span>
    </a>
    <a class="bg-white text-primary rounded-full h-11 px-4 flex items-center gap-2 shadow-lg border border-outline-variant/20 hover:-translate-y-0.5 transition-transform" href="tel:{{ $settings['phone'] ?? '' }}" aria-label="Call our office">
      <span class="text-sm font-semibold">Call us</span><span class="material-symbols-outlined text-xl">call</span>
    </a>
    <button id="chat-toggle" class="bg-white text-primary rounded-full h-11 px-4 flex items-center gap-2 shadow-lg border border-outline-variant/20 hover:-translate-y-0.5 transition-transform" aria-label="Open live chat">
      <span class="text-sm font-semibold">Live chat</span><span class="material-symbols-outlined text-xl">forum</span>
    </button>
  </div>
  <button id="contact-actions-toggle" class="bg-secondary-container text-on-secondary-fixed rounded-full w-14 h-14 flex items-center justify-center shadow-xl hover:scale-105 transition-transform active:scale-95" aria-label="Open contact options" aria-controls="contact-actions" aria-expanded="false">
    <span class="material-symbols-outlined" id="contact-actions-icon">support_agent</span>
  </button>
</div>

<!-- ═══════════════════════════════ AI CHAT BOX ═══════════════════════════════ -->
<div class="hidden fixed bottom-24 left-4 right-4 md:left-auto md:bottom-28 md:right-8 md:w-[340px] rounded-2xl shadow-2xl z-50 overflow-hidden flex-col border border-outline-variant/20 bg-white" id="chat-box" style="max-height:520px;" role="dialog" aria-label="Client support chat">
  <div class="bg-primary-container px-5 py-4 flex justify-between items-center flex-shrink-0">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-full bg-secondary/30 flex items-center justify-center">
        <span class="material-symbols-outlined text-secondary text-sm" style="font-variation-settings:'FILL' 1">gavel</span>
      </div>
      <div>
        <p class="text-on-primary font-bold text-sm">Client Support</p>
        <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-green-400 inline-block"></span><span class="text-primary-fixed-dim text-xs">Online now</span></span>
      </div>
    </div>
    <button onclick="toggleChat()" class="text-primary-fixed-dim hover:text-white transition-colors" aria-label="Close chat">
      <span class="material-symbols-outlined">close</span>
    </button>
  </div>
  <div class="flex-1 overflow-y-auto p-4 space-y-3 bg-[#f7f9fb]" id="chat-messages" style="max-height:320px; min-height:200px;"></div>
  <div class="hidden px-4 pb-2 bg-[#f7f9fb]" id="typing-indicator">
    <div class="inline-flex items-center gap-1 bg-white border border-outline-variant/30 px-3 py-2 rounded-xl rounded-tl-none">
      <span class="typing-dot w-2 h-2 bg-on-surface-variant rounded-full block"></span>
      <span class="typing-dot w-2 h-2 bg-on-surface-variant rounded-full block"></span>
      <span class="typing-dot w-2 h-2 bg-on-surface-variant rounded-full block"></span>
    </div>
  </div>
  <div class="px-4 py-2 bg-[#f7f9fb] flex flex-wrap gap-2" id="quick-replies"></div>
  <div class="px-4 py-3 border-t border-outline-variant/20 bg-white flex gap-2 flex-shrink-0">
    <input id="chat-input" type="text" aria-label="Chat message" placeholder="Type a message..." class="flex-1 bg-surface-container-low border border-outline-variant/40 rounded-full px-4 py-2 text-sm focus:outline-none focus:border-secondary transition-all font-body-md">
    <button id="chat-send-btn" onclick="sendUserMessage()" aria-label="Send chat message" class="w-9 h-9 bg-primary rounded-full flex items-center justify-center hover:bg-secondary transition-colors flex-shrink-0">
      <span class="material-symbols-outlined text-white text-sm">send</span>
    </button>
  </div>
</div>

<script>
document.getElementById('footer-year').textContent = new Date().getFullYear();

const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
const bar1 = document.getElementById('bar1');
const bar2 = document.getElementById('bar2');
const bar3 = document.getElementById('bar3');
let menuOpen = false;

menuBtn.addEventListener('click', () => {
  menuOpen = !menuOpen;
  mobileMenu.classList.toggle('open', menuOpen);
  menuBtn.setAttribute('aria-expanded', String(menuOpen));
  menuBtn.setAttribute('aria-label', menuOpen ? 'Close navigation menu' : 'Open navigation menu');
  bar1.style.transform = menuOpen ? 'translateY(8px) rotate(45deg)' : '';
  bar2.style.opacity = menuOpen ? '0' : '1';
  bar3.style.transform = menuOpen ? 'translateY(-8px) rotate(-45deg)' : '';
});

document.querySelectorAll('.mobile-nav-link').forEach(link => {
  link.addEventListener('click', () => {
    menuOpen = false;
    mobileMenu.classList.remove('open');
    menuBtn.setAttribute('aria-expanded', 'false');
    menuBtn.setAttribute('aria-label', 'Open navigation menu');
    bar1.style.transform = '';
    bar2.style.opacity = '1';
    bar3.style.transform = '';
  });
});

const navLinks = document.querySelectorAll('.nav-link');
const sections = document.querySelectorAll('section[id], header');
const observerNav = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      navLinks.forEach(l => l.classList.remove('text-secondary', 'font-bold'));
      const active = document.querySelector(`.nav-link[href="#${entry.target.id}"]`);
      if (active) { active.classList.add('text-secondary', 'font-bold'); }
    }
  });
}, { threshold: 0.4 });
sections.forEach(s => s.id && observerNav.observe(s));

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('opacity-100', 'translate-y-0');
      entry.target.classList.remove('opacity-0', 'translate-y-8');
    }
  });
}, { threshold: 0.1 });
if (!prefersReducedMotion) {
  document.querySelectorAll('section').forEach(s => {
    s.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-8');
    revealObserver.observe(s);
  });
}

const statObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const el = entry.target;
      const target = parseInt(el.dataset.target) || 0;
      let current = 0;
      const step = Math.ceil(target / 40) || 1;
      const timer = setInterval(() => {
        current = Math.min(current + step, target);
        el.textContent = current + '+';
        if (current >= target) clearInterval(timer);
      }, 40);
      statObserver.unobserve(el);
    }
  });
}, { threshold: 0.5 });
document.querySelectorAll('.stat-counter[data-target]').forEach(el => statObserver.observe(el));

document.querySelectorAll('.faq-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    const answer = btn.nextElementSibling;
    const icon = btn.querySelector('.faq-icon');
    const isOpen = !answer.classList.contains('hidden');
    document.querySelectorAll('.faq-answer').forEach(a => a.classList.add('hidden'));
    document.querySelectorAll('.faq-icon').forEach(i => i.style.transform = '');
    if (!isOpen) {
      answer.classList.remove('hidden');
      icon.style.transform = 'rotate(180deg)';
    }
  });
});

// ─── CONTACT FORM → Laravel route ───
document.getElementById('contact-form').addEventListener('submit', async function(e) {
  e.preventDefault();
  const form = this;
  const errorBox = document.getElementById('form-error');
  const submitBtn = document.getElementById('submit-btn');
  const btnText = document.getElementById('btn-text');
  const btnLoader = document.getElementById('btn-loader');
  const btnIcon = document.getElementById('btn-icon');

  const name = document.getElementById('cf-name').value.trim();
  const email = document.getElementById('cf-email').value.trim();
  const message = document.getElementById('cf-message').value.trim();

  errorBox.classList.add('hidden');
  if (!name || !email || !message) {
    errorBox.textContent = 'Please fill in all required fields (Name, Email, and Message).';
    errorBox.classList.remove('hidden');
    return;
  }
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    errorBox.textContent = 'Please enter a valid email address.';
    errorBox.classList.remove('hidden');
    return;
  }

  submitBtn.disabled = true;
  btnText.textContent = 'Sending...';
  btnLoader.classList.remove('hidden');
  btnIcon.classList.add('hidden');

  try {
    const formData = new FormData(form);
    const payload = Object.fromEntries(formData.entries());

    const response = await fetch("{{ route('contact.store') }}", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      },
      body: JSON.stringify(payload)
    });

    if (!response.ok) throw new Error('Request failed');

    form.classList.add('hidden');
    document.getElementById('form-success').classList.remove('hidden');
  } catch (err) {
    errorBox.textContent = 'Something went wrong. Please email us directly at {{ $settings['email'] ?? '' }} or call us.';
    errorBox.classList.remove('hidden');
    submitBtn.disabled = false;
    btnText.textContent = 'Send Message';
    btnLoader.classList.add('hidden');
    btnIcon.classList.remove('hidden');
  }
});

function resetForm() {
  document.getElementById('contact-form').reset();
  document.getElementById('contact-form').classList.remove('hidden');
  document.getElementById('form-success').classList.add('hidden');
}

// ════════════════════════════════════════
//  AI CHAT BOX
// ════════════════════════════════════════
const chatToggleBtn = document.getElementById('chat-toggle');
const chatBox = document.getElementById('chat-box');
const contactActionsToggle = document.getElementById('contact-actions-toggle');
const contactActions = document.getElementById('contact-actions');
const contactActionsIcon = document.getElementById('contact-actions-icon');
const messagesEl = document.getElementById('chat-messages');
const typingEl = document.getElementById('typing-indicator');
const quickRepliesEl = document.getElementById('quick-replies');
const chatInput = document.getElementById('chat-input');
let chatOpened = false;

const GREETINGS = ['hi', 'hello', 'hey', 'good morning', 'good afternoon', 'good evening', 'helo', 'hii', 'howdy', 'sup'];
const WHATSAPP_NUMBER = @json($settings['whatsapp'] ?? '');
const FIRM_EMAIL = @json($settings['email'] ?? '');
const FIRM_PHONE = @json($settings['phone'] ?? '');
const OFFICE_ADDRESS = @json($settings['address'] ?? '');
const OFFICE_HOURS = @json(($settings['office_hours_weekday'] ?? '') . ', ' . ($settings['office_hours_saturday'] ?? ''));

const CHAT_FLOWS = {
  start: {
    bot: "Hello! 👋 Welcome to {{ $settings['site_name'] ?? 'Entebbe Associated Advocates' }}. I'm here to help. What brings you to us today?",
    replies: [
      { label: "Schedule a consultation", next: "consultation" },
      { label: "Learn about practice areas", next: "practice" },
      { label: "Ask about fees", next: "fees" },
      { label: "Get office contact info", next: "contact" }
    ]
  },
  consultation: {
    bot: "Great! Scheduling a consultation is simple. How would you prefer to book?",
    replies: [
      { label: "Fill the contact form", next: "form_redirect" },
      { label: "Call the office", next: "call_info" },
      { label: "WhatsApp us", next: "whatsapp_redirect" }
    ]
  },
  practice: {
    bot: "We cover {{ $practiceAreas->count() }} specialised practice areas. Which field is most relevant to your matter?",
    replies: [
      { label: "Land Law / Real Estate", next: "land_info" },
      { label: "Corporate / Business Law", next: "corp_info" },
      { label: "Family Law", next: "family_info" },
      { label: "Other practice area", next: "other_practice" }
    ]
  },
  fees: {
    bot: "Our fees are transparent and discussed upfront before any work begins. Fees vary by the nature and complexity of the matter — fixed rates for standard transactions, hourly for complex litigation. Shall I help you book a free initial call to discuss your matter?",
    replies: [
      { label: "Yes, book a consultation", next: "consultation" },
      { label: "Speak to someone now", next: "whatsapp_redirect" }
    ]
  },
  contact: {
    bot: `Here are our contact details:\n📍 ${OFFICE_ADDRESS}\n📞 ${FIRM_PHONE}\n✉️ ${FIRM_EMAIL}\n\nOffice hours: ${OFFICE_HOURS}.`,
    replies: [
      { label: "WhatsApp the team", next: "whatsapp_redirect" },
      { label: "Send an email", next: "email_redirect" }
    ]
  },
  land_info: {
    bot: "Our Land Law team handles title searches, land disputes, conveyancing, and recovery of encumbered properties. Would you like to speak with an advocate?",
    replies: [
      { label: "Yes, contact the team", next: "whatsapp_redirect" },
      { label: "Fill a contact form", next: "form_redirect" }
    ]
  },
  corp_info: {
    bot: "Our Corporate Law team advises on company registration, M&A, compliance, contract drafting, and regulatory matters — including Oil & Gas. Shall I connect you?",
    replies: [
      { label: "Yes, contact the team", next: "whatsapp_redirect" },
      { label: "Fill a contact form", next: "form_redirect" }
    ]
  },
  family_info: {
    bot: "Our Family Law team handles divorce, child custody, adoption, inheritance, and estate planning with sensitivity and discretion.",
    replies: [
      { label: "Contact team", next: "whatsapp_redirect" },
      { label: "Fill a contact form", next: "form_redirect" }
    ]
  },
  other_practice: {
    bot: "We also cover Constitutional Law, Taxation, Intellectual Property, Immigration, and Labour Law. For the best direction, please reach us directly — our team will match you to the right advocate.",
    replies: [
      { label: "WhatsApp us", next: "whatsapp_redirect" },
      { label: "Send an email", next: "email_redirect" },
      { label: "Fill a contact form", next: "form_redirect" }
    ]
  },
  call_info: {
    bot: `You can reach us at 📞 ${FIRM_PHONE} during office hours (${OFFICE_HOURS}). For urgent matters outside office hours, our WhatsApp is monitored.`,
    replies: [ { label: "Message on WhatsApp", next: "whatsapp_redirect" } ]
  },
  form_redirect: {
    bot: "You can use our consultation form right here on the page. Scroll down to the 'Schedule a Consultation' section — we typically respond within 2 business hours! ✅",
    replies: [
      { label: "Scroll to form", action: "scroll_form" },
      { label: "Chat with us on WhatsApp", next: "whatsapp_redirect" }
    ]
  },
  whatsapp_redirect: {
    bot: "You'll be redirected to our WhatsApp. One of our team will respond promptly. See you there! 🟢",
    replies: [],
    action: () => window.open(`https://wa.me/${WHATSAPP_NUMBER}?text=Hello%2C%20I%20would%20like%20to%20inquire%20about%20legal%20services.`, '_blank')
  },
  email_redirect: {
    bot: `You can email us directly at ${FIRM_EMAIL}. Please include a brief description of your matter and we'll get back to you shortly. 📧`,
    replies: [ { label: "Open email client", action: `mailto:${FIRM_EMAIL}` } ]
  },
  fallback: {
    bot: `Thank you for your message! For specific inquiries beyond what I can help with here, please reach out to our team directly:\n\n💬 WhatsApp: wa.me/${WHATSAPP_NUMBER}\n📧 Email: ${FIRM_EMAIL}\n\nWe're happy to assist!`,
    replies: [
      { label: "WhatsApp the team", next: "whatsapp_redirect" },
      { label: "Send an email", next: "email_redirect" }
    ]
  }
};

function appendBotMessage(text) {
  const div = document.createElement('div');
  div.className = 'chat-msg-bot px-4 py-3 text-sm text-on-surface font-body-md max-w-[90%] chat-bubble-in';
  div.style.whiteSpace = 'pre-line';
  div.textContent = text;
  messagesEl.appendChild(div);
  messagesEl.scrollTop = messagesEl.scrollHeight;
}

function appendUserMessage(text) {
  const div = document.createElement('div');
  div.className = 'chat-msg-user px-4 py-3 text-sm font-body-md max-w-[85%] chat-bubble-in';
  div.textContent = text;
  messagesEl.appendChild(div);
  messagesEl.scrollTop = messagesEl.scrollHeight;
}

function showTyping() { typingEl.classList.remove('hidden'); messagesEl.scrollTop = messagesEl.scrollHeight; }
function hideTyping() { typingEl.classList.add('hidden'); }

function renderQuickReplies(replies) {
  quickRepliesEl.innerHTML = '';
  replies.forEach(r => {
    const btn = document.createElement('button');
    btn.textContent = r.label;
    btn.className = 'text-xs border border-secondary text-secondary px-3 py-1.5 rounded-full hover:bg-secondary hover:text-white transition-all font-label-sm';
    btn.addEventListener('click', () => {
      appendUserMessage(r.label);
      quickRepliesEl.innerHTML = '';
      if (r.action && typeof r.action === 'string') {
        if (r.action === 'scroll_form') {
          document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
          toggleChat();
        } else {
          window.location.href = r.action;
        }
      } else if (r.next) {
        handleFlow(r.next);
      }
    });
    quickRepliesEl.appendChild(btn);
  });
}

function handleFlow(key) {
  const flow = CHAT_FLOWS[key] || CHAT_FLOWS.fallback;
  showTyping();
  setTimeout(() => {
    hideTyping();
    appendBotMessage(flow.bot);
    if (flow.action && typeof flow.action === 'function') setTimeout(flow.action, 600);
    if (flow.replies && flow.replies.length) renderQuickReplies(flow.replies);
  }, 900);
}

function isGreeting(text) { return GREETINGS.some(g => text.toLowerCase().trim().startsWith(g)); }

function sendUserMessage() {
  const text = chatInput.value.trim();
  if (!text) return;
  chatInput.value = '';
  appendUserMessage(text);
  quickRepliesEl.innerHTML = '';

  if (isGreeting(text)) {
    showTyping();
    setTimeout(() => {
      hideTyping();
      appendBotMessage("Hey there! Great to have you here 😊 How can we assist you today?");
      renderQuickReplies(CHAT_FLOWS.start.replies);
    }, 700);
  } else {
    handleFlow('fallback');
  }
}

chatInput.addEventListener('keydown', e => { if (e.key === 'Enter') sendUserMessage(); });

function toggleChat() {
  const isHidden = chatBox.classList.contains('hidden');
  if (isHidden) {
    chatBox.classList.remove('hidden');
    chatBox.classList.add('flex');
    chatToggleBtn.setAttribute('aria-label', 'Close live chat');
    if (!chatOpened) {
      chatOpened = true;
      showTyping();
      setTimeout(() => {
        hideTyping();
        appendBotMessage(CHAT_FLOWS.start.bot);
        renderQuickReplies(CHAT_FLOWS.start.replies);
      }, 800);
    }
  } else {
    chatBox.classList.add('hidden');
    chatBox.classList.remove('flex');
    chatToggleBtn.setAttribute('aria-label', 'Open live chat');
  }
}

// ════════════════════════════════════════
//  TEAM SLIDER
// ════════════════════════════════════════
(function() {
  const track = document.getElementById('team-track');
  const slides = track ? track.querySelectorAll('.team-slide') : [];
  const dots = document.querySelectorAll('#team-dots .team-dot');
  const thumbs = document.querySelectorAll('#team-thumbs .team-thumb');
  const progressFill = document.getElementById('team-progress');
  const currentEl = document.getElementById('team-current');
  if (!track || !slides.length) return;

  let current = 0;
  const total = slides.length;
  const interval = 6000;
  let elapsed = 0;
  let rafId, timer;

  function goTo(idx) {
    current = (idx + total) % total;
    track.style.transform = `translateX(-${current * 100}%)`;
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
    thumbs.forEach((t, i) => {
      const isActive = i === current;
      t.style.borderColor = isActive ? 'rgba(123,88,0,0.6)' : 'rgba(255,255,255,0.1)';
      t.style.background = isActive ? 'rgba(123,88,0,0.1)' : 'rgba(255,255,255,0.05)';
      const nameEl = t.querySelector('span');
      if (nameEl) nameEl.style.color = isActive ? 'white' : 'rgba(176,200,235,0.7)';
    });
    if (currentEl) currentEl.textContent = String(current + 1).padStart(2, '0');
    resetProgress();
  }

  function resetProgress() { elapsed = 0; if (progressFill) progressFill.style.width = '0%'; }

  function animateProgress(ts) {
    if (!elapsed) elapsed = ts;
    const pct = Math.min(((ts - elapsed) / interval) * 100, 100);
    if (progressFill) progressFill.style.width = pct + '%';
    if (pct < 100) { rafId = requestAnimationFrame(animateProgress); }
  }

  function startAuto() {
    cancelAnimationFrame(rafId);
    elapsed = 0;
    rafId = requestAnimationFrame(animateProgress);
    clearInterval(timer);
    timer = setInterval(() => { goTo(current + 1); startAuto(); }, interval);
  }

  document.getElementById('team-prev')?.addEventListener('click', () => { clearInterval(timer); cancelAnimationFrame(rafId); goTo(current - 1); startAuto(); });
  document.getElementById('team-next')?.addEventListener('click', () => { clearInterval(timer); cancelAnimationFrame(rafId); goTo(current + 1); startAuto(); });
  dots.forEach(d => d.addEventListener('click', () => { clearInterval(timer); cancelAnimationFrame(rafId); goTo(parseInt(d.dataset.index)); startAuto(); }));
  thumbs.forEach(t => t.addEventListener('click', () => { clearInterval(timer); cancelAnimationFrame(rafId); goTo(parseInt(t.dataset.thumb)); startAuto(); }));

  goTo(0);
  startAuto();
})();

// ════════════════════════════════════════
//  TESTIMONIAL SLIDER
// ════════════════════════════════════════
(function() {
  const track = document.getElementById('testi-track');
  const dots = document.querySelectorAll('#testi-dots .testi-dot');
  if (!track) return;

  let current = 0;
  const total = track.querySelectorAll('.testi-slide').length;
  let timer;

  function goTo(idx) {
    current = (idx + total) % total;
    track.style.transform = `translateX(-${current * 100}%)`;
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
  }

  function startAuto() { clearInterval(timer); timer = setInterval(() => goTo(current + 1), 7000); }

  document.getElementById('testi-prev')?.addEventListener('click', () => { goTo(current - 1); startAuto(); });
  document.getElementById('testi-next')?.addEventListener('click', () => { goTo(current + 1); startAuto(); });
  dots.forEach(d => d.addEventListener('click', () => { goTo(parseInt(d.dataset.index)); startAuto(); }));

  goTo(0);
  startAuto();
})();

contactActionsToggle.addEventListener('click', () => {
  const opening = contactActions.classList.contains('is-closed');
  contactActions.classList.toggle('is-closed', !opening);
  contactActions.setAttribute('aria-hidden', String(!opening));
  contactActionsToggle.setAttribute('aria-expanded', String(opening));
  contactActionsToggle.setAttribute('aria-label', opening ? 'Close contact options' : 'Open contact options');
  contactActionsIcon.textContent = opening ? 'close' : 'support_agent';
});

chatToggleBtn.addEventListener('click', () => {
  toggleChat();
  contactActions.classList.add('is-closed');
  contactActions.setAttribute('aria-hidden', 'true');
  contactActionsToggle.setAttribute('aria-expanded', 'false');
  contactActionsToggle.setAttribute('aria-label', 'Open contact options');
  contactActionsIcon.textContent = 'support_agent';
});
</script>
</body>
</html>
