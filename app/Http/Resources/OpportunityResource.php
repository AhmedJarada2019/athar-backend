<?php

namespace App\Http\Resources;

use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Opportunity
 */
class OpportunityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                   => $this->id,
            'title'                => $this->title,
            'sub_title'            => $this->sub_title,
            'total_size'           => $this->total_size,
            'external_investments' => $this->external_investments,
            'image'                => $this->image_url,
            'description'          => $this->description,
            'fund'                 => $this->whenLoaded('fund', function () {
                return new FundResource($this->fund);
            }),
            'statistics'           => $this->whenLoaded('opportunityStatistics', function () {
                return OpportunityStatisticsResource::collection($this->opportunityStatistics);
            }),

            'risks'                => $this->risks,
            'managment_members'    => $this->whenLoaded('opportunityManagmentMembers', function () {
                return OpportunityManagmentMemberResource::collection($this->opportunityManagmentMembers);
            }),
            'features'             => $this->features,
            'sdjs'                 => $this->whenLoaded('sdjs', function () {
                return SdjResource::collection(
                    $this->sdjs
                );
            }),
            'financial_details'    => $this->financial_details,
            'opportunity_partners' => $this->whenLoaded('opportunityPartners', function () {
                return OpportunityPartnerResource::collection(
                    $this->opportunityPartners
                );
            }),
            'funding_data'         => $this->when(
                $this->relationLoaded('opportunityFundingEntities')
                && $this->relationLoaded('saudiFunding')
                && $this->relationLoaded('customerFunding')
                , function () {
                return OpportunityFundingDataResource::make($this->resource);
            }),
            'display_created_at' => $this->created_at?->isoFormat('dddd Do MMMM OY | h:m A'),
            'display_updated_at' => $this->updated_at?->isoFormat('dddd Do MMMM OY | h:m A'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
