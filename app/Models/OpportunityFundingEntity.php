<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $funding_ration
 * @property int $funding_amount
 * @property float $ratio
 */
class OpportunityFundingEntity extends Model
{
    use HasFactory;

    protected $with = ['fundingEntity',];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }

    public function fundingEntity()
    {
        return $this->belongsTo(FundingEntity::class);
    }

    public function ratio():Attribute
    {
        return Attribute::get(fn() => $this->funding_amount / $this->funding_ration);
    }
}
