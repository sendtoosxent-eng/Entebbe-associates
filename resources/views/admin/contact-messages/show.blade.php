@extends('layouts.admin')
@section('title', 'Message from ' . $item->name)

@section('content')
<div class="max-w-2xl">
  <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-[#7b5800] font-semibold hover:underline mb-4 inline-block">← Back to Messages</a>

  <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-6">
    <div class="flex items-start justify-between border-b border-gray-100 pb-4">
      <div>
        <h2 class="text-lg font-bold text-[#000f22]">{{ $item->name }}</h2>
        <p class="text-sm text-gray-500">{{ $item->created_at->format('F j, Y \a\t g:i A') }}</p>
      </div>
      <form action="{{ route('admin.contact-messages.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this message?')">
        @csrf @method('DELETE')
        <button type="submit" class="text-red-600 text-sm font-semibold hover:underline">Delete</button>
      </form>
    </div>

    <div class="grid grid-cols-2 gap-6 text-sm">
      <div>
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Email</p>
        <a href="mailto:{{ $item->email }}" class="text-[#7b5800] hover:underline">{{ $item->email }}</a>
      </div>
      <div>
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Phone</p>
        <p class="text-[#000f22]">{{ $item->phone ?? '—' }}</p>
      </div>
      <div>
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Practice Area</p>
        <p class="text-[#000f22]">{{ $item->practice_area ?? '—' }}</p>
      </div>
    </div>

    <div>
      <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Message</p>
      <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line bg-gray-50 rounded-lg p-4">{{ $item->message }}</p>
    </div>

    <div class="flex gap-3 pt-2 border-t border-gray-100">
      <a href="mailto:{{ $item->email }}" class="bg-[#000f22] text-white px-6 py-3 rounded-lg font-semibold text-sm hover:bg-[#7b5800] transition-all">Reply by Email</a>
    </div>
  </div>
</div>
@endsection
