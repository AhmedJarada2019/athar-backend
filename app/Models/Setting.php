<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    const BOOLEAN = 'boolean';

    const SKIP_SMS = 'skip_sms';

    public function settingValue(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                settype($value, $this->type);

                return $value;
            },
            set: function ($value) {
                return [
                    'setting_value' => (string) $value,
                    'type'          => gettype($value),
                ];
            },
        );
    }

    public static function valueOf(string $key)
    {
        return Cache::remember("setting.${key}", now()->addMinutes(30), function () use ($key) {
            return self::where('key', $key)->firstOrFail()->setting_value;
        });
    }

    public static function fake(string $key, $value)
    {
        return Cache::set("setting.${key}", $value);
    }

    protected static function booted()
    {
        static::saving(function ($setting) {
            Cache::forget("setting.{$setting->key}");
        });
        static::deleting(function ($setting) {
            Cache::forget("setting.{$setting->key}");
        });
    }
}
