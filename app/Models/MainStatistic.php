<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasTranslatable;
use Spatie\EloquentSortable\SortableTrait;

class MainStatistic extends Model
{
    use HasFactory;
    use HasTranslatable;
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,

    ];
    protected $translatable = ['label'];
}
