@extends('layouts.admin')
@section('title', $item->exists ? 'Edit Track Record' : 'Add Track Record')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.track-records.update', $item) : route('admin.track-records.store') }}" class="bg-white rounded-xl border border-gray-200 p-6 space-y-6 max-w-2xl">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div class="grid grid-cols-2 gap-6">
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Category (e.g. "Land Recovery")</label>
      <input type="text" name="category" value="{{ old('category', $item->category) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Icon (Material Symbol)</label>
      <input type="text" name="icon" value="{{ old('icon', $item->icon ?? 'domain') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Title</label>
    <input type="text" name="title" value="{{ old('title', $item->title) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Description</label>
    <textarea name="description" rows="3" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">{{ old('description', $item->description) }}</textarea>
  </div>

  <div class="grid grid-cols-2 gap-6">
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Display Order</label>
      <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
    <div class="flex items-end">
      <label class="flex items-center gap-2 text-sm text-gray-700 mb-3">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }} class="rounded border-gray-300">
        Active (visible on site)
      </label>
    </div>
  </div>

  <div class="flex gap-3 pt-2">
    <button type="submit" class="bg-[#000f22] text-white px-6 py-3 rounded-lg font-semibold text-sm hover:bg-[#7b5800] transition-all">Save</button>
    <a href="{{ route('admin.track-records.index') }}" class="px-6 py-3 rounded-lg font-semibold text-sm text-gray-500 hover:bg-gray-100 transition-all">Cancel</a>
  </div>
</form>
@endsection
