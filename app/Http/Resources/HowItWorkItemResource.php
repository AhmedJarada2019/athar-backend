<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HowItWorkItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'logo' => $this->logo_url,
            'title' => $this->title_ar,
            'description' => $this->description_ar,
            'color' => $this->color,
            'border_color' => $this->color,
        ];
    }
}
