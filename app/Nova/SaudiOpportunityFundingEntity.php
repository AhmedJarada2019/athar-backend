<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use App\Models\Enum\FundingType;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class SaudiOpportunityFundingEntity extends OpportunityFundingEntity
{
    public static function type()
    {
        return FundingType::saudi_fund;
    }
}
