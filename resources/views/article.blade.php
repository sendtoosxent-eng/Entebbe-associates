<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $post->title }} · {{ $settings['site_name'] ?? 'Entebbe Associated Advocates' }}</title>
  <meta name="description" content="{{ $post->excerpt }}">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-on-surface font-body-md">
  <nav class="bg-white/95 backdrop-blur border-b border-outline-variant/30 sticky top-0 z-20">
    <div class="max-w-[1000px] mx-auto px-5 md:px-8 h-20 flex items-center justify-between gap-4">
      <a href="{{ route('home') }}" class="font-headline-md text-lg md:text-xl text-primary">{{ $settings['site_name'] ?? 'Entebbe Associated Advocates' }}</a>
      <a href="{{ route('home') }}#blog" class="text-sm font-semibold text-secondary hover:text-primary transition-colors">← All articles</a>
    </div>
  </nav>

  <main>
    <header class="bg-primary text-white">
      <div class="max-w-[900px] mx-auto px-5 md:px-8 py-14 md:py-20">
        <p class="text-secondary-fixed font-label-md uppercase tracking-widest mb-4">{{ $post->category }}</p>
        <h1 class="font-display-lg text-4xl md:text-6xl leading-tight">{{ $post->title }}</h1>
        <div class="mt-6 flex flex-wrap gap-x-5 gap-y-2 text-primary-fixed-dim text-sm">
          <span>{{ $post->author_name }}</span>
          <span>{{ $post->published_date?->format('F j, Y') }}</span>
          <span>{{ $post->read_time }}</span>
        </div>
      </div>
    </header>

    <article class="max-w-[900px] mx-auto px-5 md:px-8 py-10 md:py-16">
      <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full max-h-[500px] object-cover rounded-2xl mb-10 shadow-sm">
      <p class="text-xl md:text-2xl text-on-surface-variant leading-relaxed font-headline-md mb-8">{{ $post->excerpt }}</p>
      <div class="text-on-surface-variant leading-8 whitespace-pre-line text-base md:text-lg">{{ $post->content ?: $post->excerpt }}</div>
      <div class="mt-12 pt-8 border-t border-outline-variant/40 flex flex-col sm:flex-row gap-4 sm:items-center sm:justify-between">
        <a href="{{ route('home') }}#blog" class="font-semibold text-secondary">← Back to insights</a>
        <a href="{{ route('home') }}#contact" class="bg-secondary-container text-on-secondary-fixed px-6 py-3 rounded-lg font-semibold text-center">Discuss this topic with us</a>
      </div>
    </article>
  </main>
</body>
</html>
