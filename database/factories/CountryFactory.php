<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CountryFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name'        => $this->faker->country,
            'iso_code'    => $this->faker->unique()->countryCode,
            'mobile_code' => $this->faker->countryCode,
        ];
    }
}
