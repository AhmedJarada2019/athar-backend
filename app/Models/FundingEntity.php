<?php

namespace App\Models;

use App\Models\Enum\FundingType;
use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class FundingEntity extends Model
{
    use HasFactory;
    use HasTranslatable;

    protected $guarded = [];
    protected $translatable = [
        'name',
    ];
    protected $casts =[
        'type' => FundingType::class,
    ];
    public function logoUrl(): Attribute
    {
        return Attribute::get(fn () => $this->logo ? Storage::url($this->logo) : null);
    }

    public function opportunityFundingEntities()
    {
        return $this->hasMany(OpportunityFundingEntity::class);
    }
}
