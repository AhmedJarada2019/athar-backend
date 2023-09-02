<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Fund extends Model
{
    use HasFactory;
    use HasTranslatable;

    protected $table = 'funds';
    protected $guarded = [];

    protected $translatable = [
        'name',
    ];

    public function logoUrl(): Attribute
    {
        return Attribute::get(fn () => $this->logo ? Storage::url($this->logo) : null);
    }

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }
}
