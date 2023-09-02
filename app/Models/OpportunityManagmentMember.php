<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityManagmentMember extends Model
{
    use HasFactory;
    use HasTranslatable;
    protected $touches = ['opportunity',];

    protected $translatable = [
        'name',
        'label',
    ];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
