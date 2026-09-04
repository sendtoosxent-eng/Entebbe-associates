<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'excerpt', 'content', 'image',
        'author_name', 'author_initials', 'published_date', 'read_time',
        'is_featured', 'order', 'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'published_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::saving(function (BlogPost $post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
            if (empty($post->author_initials) && $post->author_name) {
                $words = explode(' ', trim($post->author_name));
                $post->author_initials = strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getImageUrlAttribute(): string
    {
        if (! $this->image) {
            return asset('images/placeholder-blog.jpg');
        }

        return str_starts_with($this->image, 'images/')
            ? asset($this->image)
            : asset('storage/' . $this->image);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
