<?php

namespace Database\Seeders;

use App\Models\AboutAthar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutAtharSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutAthar::query()
            ->firstOrCreate([
                'title_ar' => 'عن أثر',
                'title_en' => 'About Athar',
                'description_ar' => 'منصة أثر تعمل على توفير فرص استثمارية لمشاريع استثنائية، و جاءت ضمن تمكين مبادرة حكومية ترجع للمركز الوطني لتنمية القطاع الغير ربحي، كما أنها مصرّحة من هيئة السوق المالية حيثُ تتيح للمستثمرين (شركات، أفراد، أجانب) بخطوات بسيطة للاستثمار بمشاريعها الحصرية المدعومة ذات الهامش الربحي الجيد.',
                'description_en' => 'Athr platform works to provide investment opportunities for exceptional projects, and it came within Tamkeen, a governmental initiative that belongs to the National Center for the Development of the Non-Profit Sector, and it is authorized by the Capital Market Authority, as it allows investors (companies, individuals, and foreigners) with simple steps to invest in its exclusive supported projects with a profit margin the good.',
                'short_description_ar' => 'نـحنُ نـطرق باب الأمــل لديك للوصول إلى سلم النـجـاح والثروة المـالـية بأثــــــــر اجتمـاعـي حـقيقـي.                ',
                'short_description_en' => 'We are knocking on the door of your hope to reach the ladder of success and financial wealth with a real social impact.',
                'image' => 'about-photo.png',
                'impact_title_ar' => 'فليبقى أثركَ
                واضحًا مع منصة أثر',
                'impact_title_en' => 'May your trace remain
                Clear with Athar platform',
                'impact_description_ar' => 'نقتبس اسم منصتنا “ أثر “ من أثرها الاجتماعي عن طريق خَلق مُستقبل أفضل للجميع، فمن خلال انضمــــامك إلى منصة أثر فإنك لن تحصــــــل على منفعة مالية فقط، بل سيكون لك أثرك في أكثر من 747 جهــــــــــــة غير ربحية والتي لها دورٌ كبير في خلق مستقبل واعد ومشرق للمجتمع في الكثير من القطاعات المهمة في مجال التقدم الاقتصادي والاجتماعي.                ',
                'impact_description_en' => 'We quote the name of our platform “Athar” from its social impact by creating a better future for everyone. By joining the Athar platform, you will not only get a financial benefit, but you will also have your impact on more than 747 non-profit organizations that have a major role in creating a promising and bright future. society in many important sectors in the field of economic and social progress.',
            ]);
    }
}
