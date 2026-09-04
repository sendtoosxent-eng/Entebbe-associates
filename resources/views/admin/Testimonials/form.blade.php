@extends('layouts.admin')
@section('title', $item->exists ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.testimonials.update', $item) : route('admin.testimonials.store') }}" class="bg-white rounded-xl border border-gray-200 p-6 space-y-6 max-w-2xl">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div class="grid grid-cols-2 gap-6">
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Client Name</label>
      <input type="text" name="client_name" value="{{ old('client_name', $item->client_name) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Initials (avatar fallback)</label>
      <input type="text" name="initials" maxlength="4" value="{{ old('initials', $item->initials) }}" placeholder="Auto-generated if left blank" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
  </div>

  <div class="grid grid-cols-2 gap-6">
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Role / Company</label>
      <input type="text" name="role_company" value="{{ old('role_company', $item->role_company) }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Location</label>
      <input type="text" name="location" value="{{ old('location', $item->location) }}" placeholder="e.g. Kampala, Uganda" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Quote</label>
    <textarea name="quote" rows="4" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">{{ old('quote', $item->quote) }}</textarea>
  </div>

  <div class="grid grid-cols-2 gap-6">
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Practice Area</label>
      <input type="text" name="practice_area" value="{{ old('practice_area', $item->practice_area) }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Rating (1–5)</label>
      <input type="number" name="rating" min="1" max="5" value="{{ old('rating', $item->rating ?? 5) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
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
    <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-3 rounded-lg font-semibold text-sm text-gray-500 hover:bg-gray-100 transition-all">Cancel</a>
  </div>
</form>
@endsection
