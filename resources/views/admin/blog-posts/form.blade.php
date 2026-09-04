@extends('layouts.admin')
@section('title', $item->exists ? 'Edit Article' : 'Add Article')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.blog-posts.update', $item) : route('admin.blog-posts.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-gray-200 p-6 space-y-6 max-w-2xl">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div class="flex items-center gap-4">
    @if($item->exists)
      <img src="{{ $item->image_url }}" class="w-20 h-20 rounded-lg object-cover border border-gray-200">
    @endif
    <div class="flex-1">
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Cover Image</label>
      <input type="file" name="image" accept="image/*" class="w-full text-sm">
      <p class="text-xs text-gray-400 mt-1">Leave blank to keep current image.</p>
    </div>
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Title</label>
    <input type="text" name="title" value="{{ old('title', $item->title) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
  </div>

  <div class="grid grid-cols-2 gap-6">
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Category</label>
      <input type="text" name="category" value="{{ old('category', $item->category) }}" placeholder="e.g. Land Law" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Author Name</label>
      <input type="text" name="author_name" value="{{ old('author_name', $item->author_name) }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Excerpt (shown on cards)</label>
    <textarea name="excerpt" rows="3" required class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">{{ old('excerpt', $item->excerpt) }}</textarea>
  </div>

  <div>
    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Full Content (optional, for a future article page)</label>
    <textarea name="content" rows="6" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">{{ old('content', $item->content) }}</textarea>
  </div>

  <div class="grid grid-cols-2 gap-6">
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Published Date</label>
      <input type="date" name="published_date" value="{{ old('published_date', $item->published_date?->format('Y-m-d')) }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Read Time</label>
      <input type="text" name="read_time" value="{{ old('read_time', $item->read_time) }}" placeholder="e.g. 6 min read" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
  </div>

  <div class="grid grid-cols-3 gap-6 items-end">
    <div>
      <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Display Order</label>
      <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7b5800] outline-none">
    </div>
    <label class="flex items-center gap-2 text-sm text-gray-700 mb-3">
      <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $item->is_featured ?? false) ? 'checked' : '' }} class="rounded border-gray-300">
      Featured (large card)
    </label>
    <label class="flex items-center gap-2 text-sm text-gray-700 mb-3">
      <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }} class="rounded border-gray-300">
      Active (visible on site)
    </label>
  </div>

  <div class="flex gap-3 pt-2">
    <button type="submit" class="bg-[#000f22] text-white px-6 py-3 rounded-lg font-semibold text-sm hover:bg-[#7b5800] transition-all">Save</button>
    <a href="{{ route('admin.blog-posts.index') }}" class="px-6 py-3 rounded-lg font-semibold text-sm text-gray-500 hover:bg-gray-100 transition-all">Cancel</a>
  </div>
</form>
@endsection
