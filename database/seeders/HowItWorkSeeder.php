<?php

namespace Database\Seeders;

use App\Models\HowItWork;
use App\Models\HowItWorkItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HowItWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $how_it_work = [
            'title_ar' => "كـيـــــف تـسـتـثمــــر معـنـــــا؟",
            'title_en' => "Why Athar ?"
        ];
        $how_it_work_id = HowItWork::insertGetId($how_it_work);
        $data = [
            [
                'logo' => 'Icon_stackedbar.svg',
                'title_ar' => 'اختيار الفرصة',
                'title_en' => 'Opportunity Selection',
                'description_ar' => 'تقوم باختيار مشروعك بعد تصفح المشاريع المعروضة.',
                'description_en' => 'You choose your project after browsing the offered projects.',
                'color' => '#005666',
                'how_it_work_id' => $how_it_work_id,
            ],
            [
                'logo' => 'Icon_handshake.svg',
                'title_ar' => 'سجل كمستثمر',
                'title_en' => 'Register as an investor',
                'description_ar' => 'تقوم بالتسجيل خلال دقائق من خلال تعبئة البيانات المطلوبة',
                'description_en' => 'You register within minutes by filling in the required information',
                'color' => '#122331',
                'how_it_work_id' => $how_it_work_id,
            ],
            [
                'logo' => 'Icon_done.svg',
                'title_ar' => 'اختيار آلية المساهمة',
                'title_en' => 'Choosing a Contribution Mechanism',
                'description_ar' => 'تستثمر في المشروع إما عن طريق صندوق التمويل أو التمويل الجماعي',
                'description_en' => 'You invest in the project either through fund or crowdfunding.',
                'color' => '#00b39a',
                'how_it_work_id' => $how_it_work_id,
            ],
            [
                'logo' => 'Icon_data.svg',
                'title_ar' => 'راقب استثمارك',
                'title_en' => 'Watch your investment',
                'description_ar' => 'قم بمراقبة التحركات المالية لمشروعك بكل سهولة ويُسر',
                'description_en' => 'You can follow up on your investment through the platform and see the profits you have achieved.',
                'color' => '#a1c648',
                'how_it_work_id' => $how_it_work_id,
            ],
        ];
        HowItWorkItem::insert($data);
    }
}
