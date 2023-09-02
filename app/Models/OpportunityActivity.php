<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class OpportunityActivity extends Model
{
    use HasFactory;
    use HasTranslatable;
    protected $touches = ['opportunity',];

    protected $translatable = [
        'title',
        'description',
    ];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
