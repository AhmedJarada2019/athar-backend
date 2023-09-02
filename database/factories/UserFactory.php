<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'mobile'            => $this->faker->phoneNumber,
            'first_name'        => fake()->name(),
            'last_name'         => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'password'          => $this->faker->password,
            'verification_code' => $this->faker->randomNumber(),
            'remember_token'    => Str::random(10),
            'email_verified_at' => now(),
            'is_verified'       => $this->faker->boolean,
            'country_id'        => CountryFactory::new(),
            'birthday'          => $this->faker->date,
            'national_identity' => $this->faker->randomNumber(9),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_verified'       => false,
            'email_verified_at' => null,
        ]);
    }
}
