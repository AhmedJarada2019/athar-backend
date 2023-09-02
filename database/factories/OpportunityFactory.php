<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opportunity>
 */
class OpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_en'                  => $this->faker->name(),
            'title_ar'                  => $this->faker->name(),
            'sub_title_ar'              => $this->faker->name(),
            'sub_title_en'              => $this->faker->name(),
            'image'                     => 'opportunity.svg',
            'total_size'                => $this->faker->numberBetween(100000, 10000000),
            'external_investments'      => $this->faker->numberBetween(1, 100),
            'description_ar'            => $this->faker->sentence(),
            'description_en'            => $this->faker->sentence(),
            'fund_id'                   => FundFactory::new(),
            'financial_details_ar'      => $this->faker->sentence(),
            'features_ar'               => $this->faker->sentence(),
            'risks_ar'                  => $this->faker->sentence(),
            'financial_details_ar'      => $this->faker->sentence(),
            'features_ar'               => $this->faker->sentence(),
            'risks_ar'                  => $this->faker->sentence(),
            'financial_details_ar'      => $this->faker->sentence(),
            'features_en'               => $this->faker->sentence(),
            'risks_en'                  => $this->faker->sentence(),
            'financial_details_en'      => $this->faker->sentence(),
            'features_en'               => $this->faker->sentence(),
            'risks_en'                  => $this->faker->sentence(),
        ];
    }
}
