<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityRisk extends Model
{
    use HasFactory;
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
