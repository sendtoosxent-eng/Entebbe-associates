@extends('layouts.admin')
@section('title', 'Testimonials')

@section('content')
<div class="flex justify-end mb-4">
  <a href="{{ route('admin.testimonials.create') }}" class="bg-[#000f22] text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#7b5800] transition-all">+ Add Testimonial</a>
</div>

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wide">
      <tr>
        <th class="text-left px-6 py-3">Client</th>
        <th class="text-left px-6 py-3">Practice Area</th>
        <th class="text-left px-6 py-3">Rating</th>
        <th class="text-left px-6 py-3">Order</th>
        <th class="text-left px-6 py-3">Status</th>
        <th class="text-right px-6 py-3">Actions</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
      @forelse($items as $item)
      <tr class="hover:bg-gray-50">
        <td class="px-6 py-3">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-[#fdc34d]/30 flex items-center justify-center text-xs font-bold text-[#7b5800]">{{ $item->initials }}</div>
            <div>
              <p class="font-medium text-[#000f22]">{{ $item->client_name }}</p>
              <p class="text-xs text-gray-400">{{ $item->role_company }}</p>
            </div>
          </div>
        </td>
        <td class="px-6 py-3 text-gray-500">{{ $item->practice_area }}</td>
        <td class="px-6 py-3 text-gray-500">{{ $item->rating }} ★</td>
        <td class="px-6 py-3 text-gray-500">{{ $item->order }}</td>
        <td class="px-6 py-3">
          @if($item->is_active)<span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">Active</span>
          @else<span class="text-xs bg-gray-100 text-gray-500 px-2 py-1 rounded-full">Hidden</span>@endif
        </td>
        <td class="px-6 py-3 text-right space-x-3">
          <a href="{{ route('admin.testimonials.edit', $item) }}" class="text-[#7b5800] font-semibold hover:underline">Edit</a>
          <form action="{{ route('admin.testimonials.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this testimonial?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-600 font-semibold hover:underline">Delete</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="6" class="px-6 py-8 text-center text-gray-400">No testimonials yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
