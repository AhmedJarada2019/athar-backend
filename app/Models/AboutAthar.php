<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AboutAthar extends Model
{
    use HasFactory;
    use HasTranslatable;
    protected $guarded = [];
    protected $translatable = [
        'title', 'description', 'short_description', 'impact_title', 'impact_description'
    ];

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn () => $this->image ? Storage::url($this->image) : null);
    }
}
