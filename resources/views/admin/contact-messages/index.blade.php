@extends('layouts.admin')
@section('title', 'Consultation Messages')

@section('content')
<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wide">
      <tr>
        <th class="text-left px-6 py-3">Name</th>
        <th class="text-left px-6 py-3">Email</th>
        <th class="text-left px-6 py-3">Practice Area</th>
        <th class="text-left px-6 py-3">Received</th>
        <th class="text-left px-6 py-3">Status</th>
        <th class="text-right px-6 py-3">Actions</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
      @forelse($items as $item)
      <tr class="hover:bg-gray-50 {{ $item->is_read ? '' : 'bg-[#fdc34d]/5' }}">
        <td class="px-6 py-3 font-medium text-[#000f22]">
          <a href="{{ route('admin.contact-messages.show', $item) }}" class="hover:underline">{{ $item->name }}</a>
        </td>
        <td class="px-6 py-3 text-gray-500">{{ $item->email }}</td>
        <td class="px-6 py-3 text-gray-500">{{ $item->practice_area ?? '—' }}</td>
        <td class="px-6 py-3 text-gray-500">{{ $item->created_at->diffForHumans() }}</td>
        <td class="px-6 py-3">
          @if($item->is_read)<span class="text-xs text-gray-400">Read</span>
          @else<span class="text-xs bg-[#fdc34d]/20 text-[#7b5800] px-2 py-1 rounded-full font-semibold">New</span>@endif
        </td>
        <td class="px-6 py-3 text-right space-x-3">
          <a href="{{ route('admin.contact-messages.show', $item) }}" class="text-[#7b5800] font-semibold hover:underline">View</a>
          <form action="{{ route('admin.contact-messages.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this message?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-600 font-semibold hover:underline">Delete</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="6" class="px-6 py-8 text-center text-gray-400">No messages yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-6">
  {{ $items->links() }}
</div>
@endsection
