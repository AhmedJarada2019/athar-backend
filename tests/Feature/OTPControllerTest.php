<?php

namespace Tests\Feature;

use App\Models\Setting;
use Database\Factories\UserFactory;
use Database\Factories\CountryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OTPControllerTest extends TestCase
{
   use RefreshDatabase;

    public function test_user_can_verify_their_account(): void
    {
        Setting::fake(Setting::SKIP_SMS, true);

        $country = CountryFactory::new()->create([
            'iso_code'    => 'SA',
            'name'        => 'السعودية',
            'mobile_code' => '+966',
        ]);
        $user = UserFactory::new()->create([
            'verification_code' => 8888,
            'mobile'            => '+966599123456',
            'country_id'        => $country->id,
        ]);

        $this->actingAs($user)
            ->postJson('api/users/verify', [
                'code' => '8888',
            ])
            ->assertSuccessful()
            ->assertJson(
                [
                    'data' => [
                        'mobile'      => '+966599123456',
                        'is_verified' => true,
                    ],
                ]
            );
    }
    public function test_user_can_resend_code()
    {
        Setting::fake(Setting::SKIP_SMS, true);

        $country = CountryFactory::new()->create([
            'iso_code'    => 'SA',
            'name'        => 'السعودية',
            'mobile_code' => '+966',
        ]);
        $user = UserFactory::new()->create([
            'verification_code' => 8888,
            'mobile'            => '+966599123456',
            'country_id'        => $country->id,
            'is_verified' => false,
        ]);

        $this->actingAs($user)->postJson('api/users/resend')
            ->assertSuccessful()
            ->assertJson(
                [
                    "message" => "تم ارسال رمز التحقق"
                ]
            );
    }
}
