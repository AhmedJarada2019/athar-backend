<?php

namespace Database\Seeders;

use App\Models\WhyAthar;
use App\Models\WhyAtharItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyAtharItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $why_athar = [
            'title_ar' => "لماذا أثر ؟",
            'title_en' => "Why Athar ?"
        ];
        $why_athar_id = WhyAthar::insertGetId($why_athar);
        $data = [
            [
                'image' => 'why_graphic_1.svg',
                'title_ar' => 'استثمار سهل، سريع وآمن',
                'title_en' => 'Easy, fast and safe investment',
                'description_ar' => 'الاستثمار مع منصة أثر بكل سهولة من خلال خطوات مُيسرة و سريعة و الأهم أنها منصة آمنة.',
                'description_en' => 'Easy_fast_paragraph Investing with the Athr platform is easy, through easy and quick steps, and most importantly, it is a safe platform.',
                'why_athar_id' => $why_athar_id
            ],
            [
                'image' => 'why_graphic_2.svg',
                'title_ar' => 'قليلة المخاطر',
                'title_en' => 'Low risk',
                'description_ar' => 'جميع المشاريع التي نقوم بعرضها هي مشاريع كبيرة جدًا و ذات حصة سوقية كبيرة لها أرباح عالية و مضمونة.',
                'description_en' => 'All the projects that we offer are very large projects with a large market share that have high and guaranteed profits.',
                'why_athar_id' => $why_athar_id
            ],
            [
                'image' => 'why_graphic_3.svg',
                'title_ar' => 'مشاريع حصرية',
                'title_en' => 'Exclusive projects',
                'description_ar' => 'ما يُميز منصة أثر عن غيرها أن لديها عدد كبير من المشاريع الحصرية التابعة للمركز الوطني لتنمية القطاع الغير ربحي.',
                'description_en' => 'What distinguishes the Athr platform from others is that it has a large number of exclusive projects affiliated with the National Center for the Development of the Non-Profit Sector.',
                'why_athar_id' => $why_athar_id
            ],
            [
                'image' => 'why_graphic_4.svg',
                'title_ar' => 'وفق الشريعة الإسلامية',
                'title_en' => 'According to Islamic law',
                'description_ar' => 'الفرص المتاحة على منصة أثر تخضع لتعاليم الشريعة الإسلامية و تُشرف على ذلك لجنة شرعية مُختصة.',
                'description_en' => 'The opportunities available on the Athar platform are subject to the teachings of Islamic law and are supervised by a specialized Sharia committee.',
                'why_athar_id' => $why_athar_id
            ],
        ];
        WhyAtharItem::insert($data);
    }
}
