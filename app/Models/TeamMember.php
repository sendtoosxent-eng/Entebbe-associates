<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeamMember extends Model
{
    protected $fillable = [
        'name', 'slug', 'badge', 'subtitle', 'icon', 'bio', 'photo',
        'stat1_value', 'stat1_label', 'stat2_value', 'stat2_label',
        'stat3_value', 'stat3_label', 'expertise', 'order', 'is_active',
    ];

    protected $casts = [
        'expertise' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (TeamMember $member) {
            if (empty($member->slug)) {
                $member->slug = Str::slug($member->name);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function getPhotoUrlAttribute(): string
    {
        if (! $this->photo) {
            return asset('images/placeholder-avatar.jpg');
        }

        return str_starts_with($this->photo, 'images/')
            ? asset($this->photo)
            : asset('storage/' . $this->photo);
    }
}
