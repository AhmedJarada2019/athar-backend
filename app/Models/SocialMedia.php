<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SocialMedia extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function LogoUrl(): Attribute
    {
        return Attribute::get(fn () => $this->logo ? Storage::url($this->logo) : null);
    }
}
