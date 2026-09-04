<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Admin') · Entebbe Associated Advocates</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
  body { font-family: 'Inter', sans-serif; }
  .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; font-size: 20px; vertical-align: middle; }
  .sidebar-link { display:flex; align-items:center; gap:12px; padding:10px 16px; border-radius:8px; color:rgba(255,255,255,0.65); transition:all .2s; font-size:14px; font-weight:500; }
  .sidebar-link:hover { background:rgba(255,255,255,0.06); color:#fff; }
  .sidebar-link.active { background:rgba(253,195,77,0.12); color:#fdc34d; }
  @media (max-width: 767px) {
    main table { display:block; overflow-x:auto; white-space:nowrap; }
  }
</style>
</head>
<body class="bg-[#f7f9fb] text-[#191c1e]">
<div class="flex min-h-screen">

  <!-- Sidebar -->
  <div id="admin-overlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden" aria-hidden="true"></div>
  <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-40 w-64 flex-shrink-0 bg-[#000f22] flex flex-col -translate-x-full lg:translate-x-0 lg:static transition-transform duration-300" aria-label="Admin navigation">
    <div class="px-6 py-6 border-b border-white/10">
      <div class="flex items-start justify-between gap-3">
        <p class="text-white font-bold text-sm leading-tight">Entebbe Associated<br>Advocates</p>
        <button id="admin-close" type="button" class="lg:hidden text-white/70 hover:text-white" aria-label="Close admin navigation"><span class="material-symbols-outlined">close</span></button>
      </div>
      <p class="text-[#7b5800] text-xs mt-1 uppercase tracking-wider">Admin Panel</p>
    </div>
    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
      <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <span class="material-symbols-outlined">dashboard</span> Dashboard
      </a>
      <a href="{{ route('admin.settings.edit') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
        <span class="material-symbols-outlined">edit_note</span> Website Editor
      </a>
      <a href="{{ route('admin.practice-areas.index') }}" class="sidebar-link {{ request()->routeIs('admin.practice-areas.*') ? 'active' : '' }}">
        <span class="material-symbols-outlined">gavel</span> Practice Areas
      </a>
      <a href="{{ route('admin.team-members.index') }}" class="sidebar-link {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}">
        <span class="material-symbols-outlined">groups</span> Team Members
      </a>
      <a href="{{ route('admin.track-records.index') }}" class="sidebar-link {{ request()->routeIs('admin.track-records.*') ? 'active' : '' }}">
        <span class="material-symbols-outlined">trending_up</span> Track Record
      </a>
      <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
        <span class="material-symbols-outlined">format_quote</span> Testimonials
      </a>
      <a href="{{ route('admin.blog-posts.index') }}" class="sidebar-link {{ request()->routeIs('admin.blog-posts.*') ? 'active' : '' }}">
        <span class="material-symbols-outlined">article</span> Blog Posts
      </a>
      <a href="{{ route('admin.faqs.index') }}" class="sidebar-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
        <span class="material-symbols-outlined">quiz</span> FAQs
      </a>
      <a href="{{ route('admin.contact-messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
        <span class="material-symbols-outlined">mail</span> Messages
      </a>
    </nav>
    <div class="px-3 py-4 border-t border-white/10">
      <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
        <span class="material-symbols-outlined">open_in_new</span> View Site
      </a>
      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="sidebar-link w-full text-left">
          <span class="material-symbols-outlined">logout</span> Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- Main content -->
  <div class="flex-1 flex flex-col min-w-0">
    <header class="bg-white border-b border-gray-200 px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between gap-4">
      <div class="flex items-center gap-3 min-w-0">
        <button id="admin-menu" type="button" class="lg:hidden w-10 h-10 rounded-lg border border-gray-200 flex items-center justify-center text-[#000f22]" aria-label="Open admin navigation" aria-controls="admin-sidebar" aria-expanded="false"><span class="material-symbols-outlined">menu</span></button>
        <h1 class="text-lg sm:text-xl font-bold text-[#000f22] truncate">@yield('title', 'Dashboard')</h1>
      </div>
      <span class="text-sm text-gray-500">{{ auth()->user()->name ?? '' }}</span>
    </header>

    <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-x-hidden">
      @if(session('status'))
      <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
        {{ session('status') }}
      </div>
      @endif

      @if($errors->any())
      <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
        <ul class="list-disc list-inside space-y-1">
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      @yield('content')
    </main>
  </div>
</div>
<script>
  const adminSidebar = document.getElementById('admin-sidebar');
  const adminOverlay = document.getElementById('admin-overlay');
  const adminMenu = document.getElementById('admin-menu');
  const adminClose = document.getElementById('admin-close');

  function setAdminMenu(open) {
    adminSidebar.classList.toggle('-translate-x-full', !open);
    adminOverlay.classList.toggle('hidden', !open);
    adminOverlay.setAttribute('aria-hidden', String(!open));
    adminMenu.setAttribute('aria-expanded', String(open));
    document.body.classList.toggle('overflow-hidden', open);
  }

  adminMenu.addEventListener('click', () => setAdminMenu(true));
  adminClose.addEventListener('click', () => setAdminMenu(false));
  adminOverlay.addEventListener('click', () => setAdminMenu(false));
  document.addEventListener('keydown', event => {
    if (event.key === 'Escape') setAdminMenu(false);
  });
</script>
</body>
</html>
