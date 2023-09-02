<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    use HasTranslatable;

    protected $table = 'statistics';
    protected $gourded = [];

    protected $translatable = [
        'name',
    ];
}
