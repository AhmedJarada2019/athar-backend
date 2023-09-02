<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyAndTerm extends Model
{
    use HasFactory;
    use HasTranslatable;
    protected $guarded = [];
    protected $translatable = [
        'description'
    ];
}
