@extends('layouts.admin')
@section('title', $item->exists ? 'Edit FAQ' : 'Add FAQ')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.faqs.update', $item) : route('admin.faqs.store') }}" class="bg-white rounded-xl border border-gray-200 p-6 space-y-6 max-w-2xl">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Question</label>
    <input type="text" name="question" value="{{ old('question', $item->question) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Answer</label>
    <textarea name="answer" rows="4" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">{{ old('answer', $item->answer) }}</textarea>
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
    <a href="{{ route('admin.faqs.index') }}" class="px-6 py-3 rounded-lg font-semibold text-sm text-gray-500 hover:bg-gray-100 transition-all">Cancel</a>
  </div>
</form>
@endsection
