@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
  @php
    $cards = [
      ['label' => 'Practice Areas', 'value' => $counts['practice_areas'], 'icon' => 'gavel', 'route' => 'admin.practice-areas.index'],
      ['label' => 'Team Members', 'value' => $counts['team_members'], 'icon' => 'groups', 'route' => 'admin.team-members.index'],
      ['label' => 'Track Records', 'value' => $counts['track_records'], 'icon' => 'trending_up', 'route' => 'admin.track-records.index'],
      ['label' => 'Testimonials', 'value' => $counts['testimonials'], 'icon' => 'format_quote', 'route' => 'admin.testimonials.index'],
      ['label' => 'Blog Posts', 'value' => $counts['blog_posts'], 'icon' => 'article', 'route' => 'admin.blog-posts.index'],
      ['label' => 'FAQs', 'value' => $counts['faqs'], 'icon' => 'quiz', 'route' => 'admin.faqs.index'],
      ['label' => 'Unread Messages', 'value' => $counts['unread_messages'], 'icon' => 'mail', 'route' => 'admin.contact-messages.index', 'highlight' => $counts['unread_messages'] > 0],
    ];
  @endphp
  @foreach($cards as $card)
  <a href="{{ route($card['route']) }}" class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-all {{ $card['highlight'] ?? false ? 'ring-2 ring-[#fdc34d]' : '' }}">
    <div class="flex items-center justify-between mb-3">
      <span class="material-symbols-outlined text-[#7b5800]">{{ $card['icon'] }}</span>
    </div>
    <p class="text-3xl font-bold text-[#000f22]">{{ $card['value'] }}</p>
    <p class="text-xs text-gray-500 uppercase tracking-wide mt-1">{{ $card['label'] }}</p>
  </a>
  @endforeach
</div>

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
  <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
    <h3 class="font-bold text-[#000f22]">Recent Consultation Requests</h3>
    <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-[#7b5800] font-semibold hover:underline">View all</a>
  </div>
  @if($recentMessages->isEmpty())
  <p class="p-6 text-sm text-gray-500">No messages yet.</p>
  @else
  <table class="w-full text-sm">
    <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wide">
      <tr>
        <th class="text-left px-6 py-3">Name</th>
        <th class="text-left px-6 py-3">Practice Area</th>
        <th class="text-left px-6 py-3">Received</th>
        <th class="text-left px-6 py-3">Status</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
      @foreach($recentMessages as $msg)
      <tr class="hover:bg-gray-50 cursor-pointer" onclick="window.location='{{ route('admin.contact-messages.show', $msg) }}'">
        <td class="px-6 py-3 font-medium text-[#000f22]">{{ $msg->name }}</td>
        <td class="px-6 py-3 text-gray-600">{{ $msg->practice_area ?? '—' }}</td>
        <td class="px-6 py-3 text-gray-500">{{ $msg->created_at->diffForHumans() }}</td>
        <td class="px-6 py-3">
          @if($msg->is_read)
            <span class="text-xs text-gray-400">Read</span>
          @else
            <span class="text-xs bg-[#fdc34d]/20 text-[#7b5800] px-2 py-1 rounded-full font-semibold">New</span>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</div>

@endsection
