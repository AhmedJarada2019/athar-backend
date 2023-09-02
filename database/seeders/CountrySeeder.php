<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{

    public function run(): void
    {
        Country::query()->create([
            'iso_code'    => 'SA',
            'name'        => 'السعودية',
            'mobile_code' => '+966',
        ]);
    }
}
