<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name', 'initials', 'role_company', 'location',
        'quote', 'rating', 'practice_area', 'order', 'is_active',
    ];

    protected $casts = ['is_active' => 'boolean'];

    protected static function booted(): void
    {
        static::saving(function (Testimonial $t) {
            if (empty($t->initials) && $t->client_name) {
                $words = explode(' ', trim($t->client_name));
                $initials = strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
                $t->initials = $initials;
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
