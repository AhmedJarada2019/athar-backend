<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityFeature extends Model
{
    use HasFactory;
    use HasTranslatable;
    protected $translatable = [
        'description',
    ];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
