<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Sdj extends Model
{
    use HasFactory;
    use HasTranslatable;
    protected $guarded = [];
    protected $translatable = [
        'name',
        'image',
    ];

    public function imageUrl(): Attribute
    {
        $image = (App::getLocale() == 'en') ? $this->image_en : $this->image_ar;
        return Attribute::get(fn () => $image ? Storage::url($image) : null);
    }

    public function opportunitySdj()
    {
        return $this->hasMany(OpportunitySdj::class);
    }
}
