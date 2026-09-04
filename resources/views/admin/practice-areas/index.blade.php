@extends('layouts.admin')
@section('title', 'Practice Areas')

@section('content')
<div class="flex justify-end mb-4">
  <a href="{{ route('admin.practice-areas.create') }}" class="bg-[#000f22] text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#7b5800] transition-all">+ Add Practice Area</a>
</div>

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wide">
      <tr>
        <th class="text-left px-6 py-3">Icon</th>
        <th class="text-left px-6 py-3">Title</th>
        <th class="text-left px-6 py-3">Order</th>
        <th class="text-left px-6 py-3">Status</th>
        <th class="text-right px-6 py-3">Actions</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
      @forelse($items as $item)
      <tr class="hover:bg-gray-50">
        <td class="px-6 py-3"><span class="material-symbols-outlined text-[#7b5800]">{{ $item->icon }}</span></td>
        <td class="px-6 py-3 font-medium text-[#000f22]">{{ $item->title }}</td>
        <td class="px-6 py-3 text-gray-500">{{ $item->order }}</td>
        <td class="px-6 py-3">
          @if($item->is_active)<span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">Active</span>
          @else<span class="text-xs bg-gray-100 text-gray-500 px-2 py-1 rounded-full">Hidden</span>@endif
        </td>
        <td class="px-6 py-3 text-right space-x-3">
          <a href="{{ route('admin.practice-areas.edit', $item) }}" class="text-[#7b5800] font-semibold hover:underline">Edit</a>
          <form action="{{ route('admin.practice-areas.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this practice area?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-600 font-semibold hover:underline">Delete</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400">No practice areas yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
