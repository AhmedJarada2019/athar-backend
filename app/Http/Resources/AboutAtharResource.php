<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutAtharResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'image' => $this->image_url,
            'impact_title' => $this->impact_title,
            'impact_description' => $this->impact_description,
        ];
    }
}
