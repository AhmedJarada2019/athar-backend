<?php

namespace Tests\Feature;

use Tests\TestCase;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use Database\Factories\CountryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_get_profile()
    {
        $password = '123456789';
        $hashedPassword = Hash::make($password);
        $country = CountryFactory::new()->create([
            'iso_code'    => 'SA',
            'name'        => 'السعودية',
            'mobile_code' => '+966',
        ]);

        $user = UserFactory::new()->create([
            'mobile'     => '+966599123456',
            'password'   => $hashedPassword,
            'country_id' => $country->id,
        ]);

        $this->actingAs($user)->getJson('api/users/me')
            ->assertSuccessful()
            ->assertJson([
                'data' => [
                    'mobile' => '+966599123456',
                ]
            ]);
    }

    public function test_user_can_update_profile()
    {
        $country = CountryFactory::new()->create([
            'iso_code'    => 'SA',
            'name'        => 'السعودية',
            'mobile_code' => '+966',
        ]);

        $user = UserFactory::new()->create([
            'mobile'     => '+966599123456',
            'password'   => 'secret',
            'country_id' => $country->id,
        ]);

        $this->actingAs($user)
            ->putJson('api/users/me', [
                'first_name'        => 'First',
                'last_name'         => 'Last',
                'email'             => 'test@test.com',
                'birthday'          => '2000-10-09',
                'national_identity' => '123456789',
            ])
            ->assertSuccessful()
            ->assertJson([
                'data' => [
                    'first_name'        => 'First',
                    'last_name'         => 'Last',
                    'email'             => 'test@test.com',
                    'birthday'          => '2000-10-09',
                    'national_identity' => '123456789',
                ],
            ]);
    }
}
