<?php

namespace App\Models;

use App\Models\Enum\FundingType;
use App\Models\Traits\HasTranslatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;


/**
 * @property Collection<OpportunityFundingEntity> $opportunityFundingEntities
 * @property OpportunityFundingEntity $saudiFunding
 * @property OpportunityFundingEntity $customerFunding
 */
class Opportunity extends Model
{
    use HasFactory;
    use HasTranslatable;

    protected $guarded = [];
    protected $translatable = [
        'title',
        'sub_title',
        'description',
        'features',
        'risks',
        'financial_details',
    ];

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn () => $this->image ? Storage::url($this->image) : null);
    }

    // public function title(): Attribute
    // {
    //     return Attribute::get(function () {
    //         $property = 'title_' . App::getLocalte();
    //         return $this->$property;
    //     });
    // }

    // Relations

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }
    public function opportunityFundingEntities()
    {
        return $this->hasMany(OpportunityFundingEntity::class)
            ->whereHas('fundingEntity', function ($query) {
                $query->where('type', FundingType::platforms);
            });
    }
    public function fundingEntities()
    {
        return $this->belongsToMany(FundingEntity::class, 'opportunity_funding_entities')
            ->withPivot('funding_amount', 'funding_ration')
            ->withTimestamps()
            ->where('type', FundingType::platforms);
    }
    public function saudiFunding()
    {
        return $this->hasOne(OpportunityFundingEntity::class)
            ->whereHas('fundingEntity', function ($query) {
                $query->where('type', FundingType::saudi_fund);
            });
    }
    public function customerFunding()
    {
        return $this->hasOne(OpportunityFundingEntity::class)
            ->whereHas('fundingEntity', function ($query) {
                $query->where('type', FundingType::customer_funds);
            });
    }
    public function opportunityAttachments()
    {
        return $this->hasMany(OpportunityAttachment::class);
    }
    public function opportunityActivities()
    {
        return $this->hasMany(OpportunityActivity::class);
    }
    // public function opportunityStatistics()
    // {
    //     return $this->hasMany(OpportunityStatistic::class);
    // }


    public function sdjs()
    {
        return $this->belongsToMany(Sdj::class, 'opportunity_sdjs');
    }
    public function opportunityManagmentMembers()
    {
        return $this->hasMany(OpportunityManagmentMember::class);
    }

    public function opportunityPartners()
    {
        return $this->hasMany(OpportunityPartner::class);
    }
    public function opportunityStatistics()
    {
        return $this->belongsToMany(Statistic::class);
    }
}
