<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowItWork extends Model
{
    use HasFactory;
    use  HasTranslatable;
    protected $guarded = [];
    protected $translatable = [
        'title'
    ];

    public function howItWorkItems()
    {
        return $this->hasMany(HowItWorkItem::class);
    }
}
