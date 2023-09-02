<?php

namespace App\Nova;

use App\Models\Enum\FundingType;
use Laravel\Nova\Http\Requests\NovaRequest;

class CustomerFundingEntity extends FundingEntity
{
    public static $displayInNavigation = false;
    public static function indexQuery(NovaRequest $request, $query)
    {
        return parent::indexQuery($request, $query)
            ->where('type', FundingType::customer_funds);
    }
}