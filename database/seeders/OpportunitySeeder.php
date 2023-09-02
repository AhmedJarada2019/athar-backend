<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use App\Models\OpportunitySdj;
use App\Models\OpportunityStatistic;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Opportunities = Opportunity::factory()->count(2)->create();
        foreach ($Opportunities as $Opportunity) {
            $Opportunity->sdjs()->sync([1, 2, 3]);
            $Opportunity->opportunityStatistics()->sync([1, 2]);
        }
    }
}
