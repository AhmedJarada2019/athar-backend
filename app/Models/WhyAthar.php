<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasTranslatable;

class WhyAthar extends Model
{
    use HasFactory;
    use HasTranslatable;

    protected $translatable = [
        'title'
    ];


    public function whyAtharItems()
    {
        return $this->hasMany(WhyAtharItem::class);
    }
}
