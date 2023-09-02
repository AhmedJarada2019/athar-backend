<?php

namespace App\Http\Resources;

use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Opportunity
 */
class OpportunityFundingDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Opportunity $opportunity */
        $opportunity = $this->resource;
        $platforms = $opportunity
            ->opportunityFundingEntities
            ->sortBy('ratio');

        $saudi = $opportunity->saudiFunding;
        $customer = $opportunity->customerFunding;

        $platforms_ration = $platforms->sum('funding_ration');
        $total_ration = $platforms_ration + $saudi->funding_ration + $customer->funding_ration;
        $platforms_amount = $platforms->sum('funding_amount');
        $total_funding_amount = $platforms_amount + $saudi->funding_amount + $customer->funding_amount;
        return [
            'platforms' => [
                'items'               => OpportunityFundingEntityResource::collection($platforms),
                'progress_percentage' => $this->ratioToString($platforms_ratio = $platforms_amount / $total_ration),
            ],
            'saudi'     => [
                'item'                => OpportunityFundingEntityResource::make($saudi),
                'progress_percentage' => $this->ratioToString($saudi_ratio = $saudi->funding_amount / $total_ration),

            ],
            'customer'  => [
                'item'                => OpportunityFundingEntityResource::make($customer),
                'progress_percentage' => $this->ratioToString($customer_ratio = $customer->funding_amount / $total_ration),
            ],
            'details'   => [
                'total_ration'         => number_format($total_ration),
                'total_funding'        => number_format($total_funding_amount),
                'external_investments' => $opportunity->external_investments.'%',
                'funding_ratio'        => $this->ratioToString($total_funding_amount / $total_ration),
                'remaining'            => $this->ratioToString(1 - ($saudi_ratio + $customer_ratio + $platforms_ratio)),
            ],
        ];

    }

    private function ratioToString($ratio, $decimal = 1)
    {
        return number_format($ratio * 100, $decimal).'%';
    }
}
