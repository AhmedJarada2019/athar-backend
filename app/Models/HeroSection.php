<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class HeroSection extends Model
{
    use HasFactory;
    use HasTranslatable;

    protected $guarded = [];

    protected $translatable = [
        'first_heading',
        'secound_heading',
        'third_heading',
        'description',
    ];

    public function BackgroundUrl(): Attribute
    {
        return Attribute::get(fn () => $this->background ? Storage::url($this->background) : null);
    }
}
