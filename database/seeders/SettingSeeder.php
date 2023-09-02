<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Laravel\Nova\Fields\Boolean;

class SettingSeeder extends Seeder
{

    public function run(): void
    {
        Setting::query()->updateOrCreate([
            'key' => Setting::SKIP_SMS,
        ], [
            'name'          => 'رسائل التفعيل',
            'setting_value' => true,
            'nova_field'    => Boolean::class,
        ]);
    }
}
