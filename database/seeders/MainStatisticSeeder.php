<?php

namespace Database\Seeders;

use App\Models\MainStatistic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'label_ar' => 'فرص مدرجة',
                'label_en' => 'Listed Opportunities',
                'value' => '+24',
            ],
            [
                'label_ar' => 'مستثمر',
                'label_en' => 'Investor',
                'value' => '+100',
            ],
            [
                'label_ar' => 'أموال تم جمعها',
                'label_en' => 'Funds Collected',
                'value' => '+20M',
            ],
        ];
        MainStatistic::insert($data);
    }
}
