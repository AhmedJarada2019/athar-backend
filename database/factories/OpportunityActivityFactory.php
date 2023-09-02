<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OpportunityActivity>
 */
class OpportunityActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_ar' => $this->faker->name(),
            'title_en' => $this->faker->name(),
            'description_ar' => $this->faker->name(),
            'description_en' => $this->faker->name(),

        ];
    }
}
