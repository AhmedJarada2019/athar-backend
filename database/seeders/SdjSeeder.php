<?php

namespace Database\Seeders;

use App\Models\Sdj;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SdjSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id'      => 1,
                'name_ar' => 'التنمية المستدامة',
                'name_en' => 'sustainable development',
                'image_ar' => 'sdj_ar/0.svg',
                'image_en' => 'sdj_en/0.svg',
            ],
            [
                'id'      => 2,
                'name_ar' => 'القضاء على الفقر',
                'name_en' => 'Poverty eradication',
                'image_ar' => 'sdj_ar/1.svg',
                'image_en' => 'sdj_en/1.svg',
            ],
            [
                'id'      => 3,
                'name_ar' => 'القضاء التام على الجوع',
                'name_en' => 'Complete eradication of hunger',
                'image_ar' => 'sdj_ar/2.svg',
                'image_en' => 'sdj_en/2.svg',
            ],
            [
                'id'      => 4,
                'name_ar' => 'الصحة الجيدة والرفاه',
                'name_en' => 'Good health and well-being',
                'image_ar' => 'sdj_ar/3.svg',
                'image_en' => 'sdj_en/3.svg',
            ],
            [
                'id'      => 5,
                'name_ar' => 'التعليم الجيد',
                'name_en' => 'good education',
                'image_ar' => 'sdj_ar/4.svg',
                'image_en' => 'sdj_en/4.svg',
            ],
            [
                'id'      => 6,
                'name_ar' => 'المساواة بين الجنسين',
                'name_en' => 'gender equality',
                'image_ar' => 'sdj_ar/5.svg',
                'image_en' => 'sdj_en/5.svg',
            ],
            [
                'id'      => 7,
                'name_ar' => 'المياه النظيفة والنظافة الصحية',
                'name_en' => 'Clean water and sanitation',
                'image_ar' => 'sdj_ar/6.svg',
                'image_en' => 'sdj_en/6.svg',
            ],
            [
                'id'      => 8,
                'name_ar' => 'طاقة نظيفة و بأسعار معقولة',
                'name_en' => 'Clean and affordable energy',
                'image_ar' => 'sdj_ar/7.svg',
                'image_en' => 'sdj_en/7.svg',
            ],
            [
                'id'      => 9,
                'name_ar' => 'العمل اللائق و نمو الاقتصاد',
                'name_en' => 'Decent work and economic growth',
                'image_ar' => 'sdj_ar/8.svg',
                'image_en' => 'sdj_en/8.svg',
            ],
            [
                'id'      => 10,
                'name_ar' => 'الصناعة والابتكار والهياكل الاساسية',
                'name_en' => 'Industry, innovation and infrastructure',
                'image_ar' => 'sdj_ar/9.svg',
                'image_en' => 'sdj_en/9.svg',
            ],
            [
                'id'      => 11,
                'name_ar' => 'الحد من أوجه عدم المساواة',
                'name_en' => 'Reducing inequalities',
                'image_ar' => 'sdj_ar/10.svg',
                'image_en' => 'sdj_en/10.svg',
            ],
            [
                'id'      => 12,
                'name_ar' => 'مدن ومجتمعات محلية مستدامة',
                'name_en' => 'sustainable cities and communities',
                'image_ar' => 'sdj_ar/11.svg',
                'image_en' => 'sdj_en/11.svg',
            ],
            [
                'id'      => 13,
                'name_ar' => 'الاستهلاك والانتاج المسؤولان',
                'name_en' => 'Responsible consumption and production',
                'image_ar' => 'sdj_ar/12.svg',
                'image_en' => 'sdj_en/12.svg',
            ],
            [
                'id'      => 14,
                'name_ar' => 'العمل المناخي',
                'name_en' => 'climate action',
                'image_ar' => 'sdj_ar/13.svg',
                'image_en' => 'sdj_en/13.svg',
            ],
            [
                'id'      => 15,
                'name_ar' => 'احياة تحت الماء',
                'name_en' => 'underwater life',
                'image_ar' => 'sdj_ar/14.svg',
                'image_en' => 'sdj_en/14.svg',
            ],
            [
                'id'      => 16,
                'name_ar' => 'الحياة في البر',
                'name_en' => 'life in the wilderness',
                'image_ar' => 'sdj_ar/15.svg',
                'image_en' => 'sdj_en/15.svg',
            ],
            [
                'id'      => 17,
                'name_ar' => 'السلام والعدل والمؤسسات القوية',
                'name_en' => 'Peace, justice and strong institutions',
                'image_ar' => 'sdj_ar/16.svg',
                'image_en' => 'sdj_en/16.svg',
            ],
            [
                'id'      => 18,
                'name_ar' => 'عقد الشراكات لتحقيق الأهداف',
                'name_en' => 'Partnerships to achieve goals',
                'image_ar' => 'sdj_ar/17.svg',
                'image_en' => 'sdj_en/17.svg',
            ],
        ];
        foreach ($data as $item) {
            Sdj::query()->updateOrCreate([
                'id' => $item['id'],
            ], [
                'name_ar' => $item['name_ar'],
                'name_en' => $item['name_en'],
                'image_ar' => $item['image_ar'],
                'image_en' => $item['image_en'],
            ]);
        }
    }
}
