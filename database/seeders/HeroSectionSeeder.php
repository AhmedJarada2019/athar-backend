<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::query()
            ->firstOrCreate([
                'first_heading_ar' => 'استثمر واربح',
                'first_heading_en' => 'Invest and win',
                'secound_heading_ar' => 'واتـرك أثـــر اجـتـمــاعـي',
                'secound_heading_en' => 'leave a social impact',
                'third_heading_ar' => 'مع منصة أثر بكل سهولـة',
                'third_heading_en' => 'With platform impact with',
                'description_ar' => 'منصة أثر بوابة المشاريع الحصرية و الأرباح المضمونة في المملكة العربية السعودية',
                'description_en' => 'Athar platform, the gateway to exclusive projects and guaranteed profits in the Kingdom of Saudi Arabia',
                'background' => 'banner-back.png',
            ]);
    }
}
