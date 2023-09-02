<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::query()
            ->firstOrCreate([
                'logo' => 'twitter.svg',
                'link' => 'https://twitter.com/Atharinvestment',
            ]);
        SocialMedia::query()
            ->firstOrCreate([
                'logo' => 'instagram.svg',
                'link' => 'https://www.instagram.com/atharinvestment/',
            ]);
        SocialMedia::query()
            ->firstOrCreate([
                'logo' => 'linkedin.svg',
                'link' => 'https://www.linkedin.com/in/athar-investment-53481427b/',
            ]);
    }
}
