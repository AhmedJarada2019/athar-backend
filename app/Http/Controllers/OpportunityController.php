<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Http\Resources\OpportunityResource;

class OpportunityController extends Controller
{
    public function index()
    {
        return OpportunityResource::collection(
            Opportunity::with([
                'opportunityFundingEntities',
                'saudiFunding',
                'customerFunding',
            ])->latest()
                ->paginate()
        );
    }

    public function show(Opportunity $opportunity)
    {
        return OpportunityResource::make($opportunity
            ->load([
                'opportunityStatistics',
                'opportunityManagmentMembers',
                'sdjs',
                'opportunityPartners',
                'fund',
                'opportunityFundingEntities',
                'saudiFunding',
                'customerFunding',
            ]));
    }
}
