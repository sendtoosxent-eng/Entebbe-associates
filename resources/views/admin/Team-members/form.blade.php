@extends('layouts.admin')
@section('title', $item->exists ? 'Edit Team Member' : 'Add Team Member')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.team-members.update', $item) : route('admin.team-members.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-gray-200 p-6 space-y-6 max-w-2xl">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div class="flex items-center gap-4">
    @if($item->exists)
      <img src="{{ $item->photo_url }}" class="w-16 h-16 rounded-full object-cover border border-gray-200">
    @endif
    <div class="flex-1">
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Photo</label>
      <input type="file" name="photo" accept="image/*" class="w-full text-sm">
      <p class="text-xs text-gray-400 mt-1">Leave blank to keep current photo.</p>
    </div>
  </div>

  <div class="grid grid-cols-2 gap-6">
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Full Name</label>
      <input type="text" name="name" value="{{ old('name', $item->name) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Badge (e.g. "Lead Attorney")</label>
      <input type="text" name="badge" value="{{ old('badge', $item->badge) }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Subtitle (e.g. "Advocate · High Court of Uganda")</label>
    <input type="text" name="subtitle" value="{{ old('subtitle', $item->subtitle) }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Icon (Material Symbol, shown in the divider)</label>
    <input type="text" name="icon" value="{{ old('icon', $item->icon ?? 'gavel') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Bio</label>
    <textarea name="bio" rows="4" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">{{ old('bio', $item->bio) }}</textarea>
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Expertise Tags (comma separated)</label>
    <input type="text" name="expertise" value="{{ old('expertise', is_array($item->expertise ?? null) ? implode(', ', $item->expertise) : '') }}" placeholder="Land Law, Litigation, Arbitration" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
  </div>

  <div class="border-t border-gray-200 pt-6">
    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Mini Stat Cards (shown under the photo)</p>
    <div class="grid grid-cols-3 gap-4">
      @for($i = 1; $i <= 3; $i++)
      <div class="space-y-2">
        <input type="text" name="stat{{ $i }}_value" value="{{ old("stat{$i}_value", $item->{"stat{$i}_value"}) }}" placeholder="Value e.g. 10+" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
        <input type="text" name="stat{{ $i }}_label" value="{{ old("stat{$i}_label", $item->{"stat{$i}_label"}) }}" placeholder="Label e.g. Yrs Exp." class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
      </div>
      @endfor
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
    <a href="{{ route('admin.team-members.index') }}" class="px-6 py-3 rounded-lg font-semibold text-sm text-gray-500 hover:bg-gray-100 transition-all">Cancel</a>
  </div>
</form>
@endsection
