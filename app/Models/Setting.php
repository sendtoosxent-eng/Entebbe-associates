<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'group'];

    /**
     * Get a setting value by key, with optional default fallback.
     */
    public static function get(string $key, $default = null)
    {
        $settings = Cache::rememberForever('settings.all', function () {
            return static::pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }

    /**
     * Create or update a setting value.
     */
    public static function set(string $key, $value, string $group = 'general'): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value, 'group' => $group]);
        Cache::forget('settings.all');
    }

    /**
     * Get all settings for a given group, keyed by their key.
     */
    public static function group(string $group): array
    {
        return static::where('group', $group)->pluck('value', 'key')->toArray();
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('settings.all'));
        static::deleted(fn () => Cache::forget('settings.all'));
    }
}
