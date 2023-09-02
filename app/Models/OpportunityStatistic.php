<?php

namespace App\Models;

use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityStatistic extends Model
{
    use HasFactory;
    use HasTranslatable;
    protected $table = 'opportunity_statistic';
    protected $translatable = [
        'name',
    ];
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
