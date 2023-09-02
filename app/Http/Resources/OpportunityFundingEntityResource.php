<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\FundingEntity;
use App\Models\OpportunityFundingEntity;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin OpportunityFundingEntity
 */
class OpportunityFundingEntityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $percentage =  round($this->ratio * 100) . '%';
        return [
            "funding_ration" => number_format($this->funding_ration),
            "percentage"     => $percentage,
            'link'           => $this->link,
            "funding_entity" => EntityResource::make($this->fundingEntity),
        ];
    }
}
