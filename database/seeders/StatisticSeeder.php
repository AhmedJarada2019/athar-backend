<?php

namespace Database\Seeders;

use App\Models\Sdj;
use App\Models\Statistic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name_ar' => 'شجرة',
                'name_en' => 'tree',
                'value' => '+50'
            ],
            [
                'name_ar' => 'وظيفة',
                'name_en' => 'job',
                'value' => '+1k'
            ],
            [
                'name_ar' => 'مستفيد',
                'name_en' => 'beneficiary',
                'value' => '+5M'
            ],
        ];
        Statistic::insert($data);
    }
}
