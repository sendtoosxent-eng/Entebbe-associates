<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('admin.blog-posts.index', [
            'items' => BlogPost::orderByDesc('published_date')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.blog-posts.form', ['item' => new BlogPost()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['image'] = $this->handleImage($request);

        BlogPost::create($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Article created.');
    }

    public function edit(BlogPost $blogPost)
    {
        return view('admin.blog-posts.form', ['item' => $blogPost]);
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $data = $this->validated($request);
        $image = $this->handleImage($request);
        if ($image) {
            $data['image'] = $image;
        }

        $blogPost->update($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Article updated.');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return back()->with('status', 'Article deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'excerpt' => ['required', 'string'],
            'content' => ['nullable', 'string'],
            'author_name' => ['nullable', 'string', 'max:255'],
            'published_date' => ['nullable', 'date'],
            'read_time' => ['nullable', 'string', 'max:30'],
            'is_featured' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }

    private function handleImage(Request $request): ?string
    {
        if ($request->hasFile('image')) {
            return $request->file('image')->store('blog', 'public');
        }

        return null;
    }
}
