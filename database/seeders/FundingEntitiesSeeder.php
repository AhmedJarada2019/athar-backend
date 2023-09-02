<?php

namespace Database\Seeders;

use App\Models\FundingEntity;
use App\Models\Enum\FundingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FundingEntitiesSeeder extends Seeder
{
    public function run(): void
    {
        FundingEntity::query()
            ->firstOrCreate([
                'name_ar' => 'منصة اثر',
                'name_en' => 'Athar Platform',
                'type'    => FundingType::saudi_fund,
                'logo' => 'funding_entities/athar.png',
            ]);
        FundingEntity::query()
            ->firstOrCreate([
                'name_ar' => 'صندوق كابيتال',
                'name_en' => 'Capital',
                'type'    => FundingType::customer_funds,
                'logo' => 'funding_entities/tanmia.png',
            ]);
        FundingEntity::query()
            ->firstOrCreate([
                'name_ar' => 'منافع',
                'name_en' => 'Manafa',
                'type'    => FundingType::platforms,
                'logo' => 'funding_entities/manafe.png',
            ]);
        FundingEntity::query()
            ->firstOrCreate([
                'name_ar' => 'أصيل',
                'name_en' => 'Assel',
                'type'    => FundingType::platforms,
                'logo' => 'funding_entities/assel.png',
            ]);
        FundingEntity::query()
            ->firstOrCreate([
                'name_ar' => 'عوائد',
                'name_en' => 'awaid',
                'type'    => FundingType::platforms,
                'logo' => '',
            ]);
    }
}
