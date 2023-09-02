<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\SortableTrait;

class HowItWorkItem extends Model
{
    use HasFactory;
    use HasTranslatable;
    use SortableTrait;


    protected $translatable = [
        'title', 'description'
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
        'sort_on_has_many' => true,
    ];

    public function logoUrl(): Attribute
    {
        return Attribute::get(fn () => $this->logo ? Storage::url($this->logo) : null);
    }

    public function howItWork()
    {
        return $this->belongsTo(HowItWork::class);
    }
}
