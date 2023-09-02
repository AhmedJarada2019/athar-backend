<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\OpportunityFundingEntity;
use App\Http\Resources\OpportunityResource;
use App\Http\Resources\OpportunityFundingDataResource;
use App\Http\Resources\OpportunityFundingEntityResource;

class FundingEntitiesController extends Controller
{
    public function show(Opportunity $opportunity)
    {
        return OpportunityFundingDataResource::make($opportunity);
    }
}
