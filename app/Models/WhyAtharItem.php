<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class WhyAtharItem extends Model
{
    use HasFactory;
    use HasTranslatable;

    protected $translatable = [
        'title', 'description'
    ];
    public function imageUrl(): Attribute
    {
        return Attribute::get(fn () => $this->image ? Storage::url($this->image) : null);
    }
    public function whyAthar()
    {
        return $this->belongsTo(WhyAthar::class);
    }
}
