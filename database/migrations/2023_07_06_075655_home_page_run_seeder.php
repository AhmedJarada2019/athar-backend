<?php

use Database\Seeders\AboutAtharSeeder;
use Database\Seeders\ContactUsSeeder;
use Database\Seeders\HeroSectionSeeder;
use Database\Seeders\HowItWorkSeeder;
use Database\Seeders\MainStatisticSeeder;
use Database\Seeders\SocialMediaSeeder;
use Database\Seeders\WhyAtharItemSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        (new HeroSectionSeeder())->run();
        (new AboutAtharSeeder())->run();
        (new WhyAtharItemSeeder())->run();
        (new MainStatisticSeeder())->run();
        (new HowItWorkSeeder())->run();
        (new ContactUsSeeder())->run();
        (new SocialMediaSeeder())->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
