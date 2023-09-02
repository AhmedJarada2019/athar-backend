<?php

namespace App\Nova;

use App\Models\Enum\FundingType;

class CustomerOpportunityFundingEntity extends OpportunityFundingEntity
{
    public static function type()
    {
        return FundingType::customer_funds;
    }
}
