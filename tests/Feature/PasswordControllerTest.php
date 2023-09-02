<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Setting;
use Database\Factories\UserFactory;
use Database\Factories\CountryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_request_forget_password(): void
    {
        Setting::fake(Setting::SKIP_SMS, true);

        $country = CountryFactory::new()->create([
            'iso_code'    => 'SA',
            'name'        => 'السعودية',
            'mobile_code' => '+966',
        ]);
        UserFactory::new()->create([
            'mobile'     => '+966599123456',
            'password'   => 'secret',
            'country_id' => $country->id,
        ]);

        $this->postJson('api/users/forget-password', [
            'mobile'     => '599123456',
            'country_id' => $country->id
        ])
            ->assertSuccessful()
            ->assertJson(
                [
                    'message' => 'تم ارسال رمز التحقق',
                ]
            );
    }

    public function test_user_can_verify_to_reset_password()
    {
        Setting::fake(Setting::SKIP_SMS, true);

        $country = CountryFactory::new()->create([
            'iso_code'    => 'SA',
            'name'        => 'السعودية',
            'mobile_code' => '+966',
        ]);
        $user = UserFactory::new()->create([
            'mobile'     => '+966599123456',
            'verification_code' => 8888,
            'country_id' => $country->id,
        ]);

        $this->actingAs($user)
            ->postJson('api/users/send-opt', [
                'code'       => '8888',
                'mobile'     => '599123456',
                'country_id' => 1
            ])
            ->assertSuccessful();
    }

    public function test_user_can_reset_password()
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
            ->putJson('api/users/reset-password', [
                'password'              => '123456789',
                'password_confirmation' => '123456789',
            ])
            ->assertSuccessful()
            ->assertJson(
                [
                    'message' => 'تم إعادة تعيين كلمة المرور بنجاح',
                ]
            );
    }

    public function test_user_can_change_password()
    {
        $country = CountryFactory::new()->create([
            'iso_code'    => 'SA',
            'name'        => 'السعودية',
            'mobile_code' => '+966',
        ]);
        $user = UserFactory::new()->create([
            'mobile'     => '+966599123456',
            'password'   => '123456789',
            'country_id' => $country->id,
        ]);

        $this->actingAs($user)
            ->putJson('api/users/change-password', [
                'current_password'      => '123456789',
                'new_password'          => '987654321',
                'password_confirmation' => '987654321',
            ])
            ->assertSuccessful()
            ->assertJson(
                [
                    'message' => 'تم تغيير كلمة المرور بنجاح',
                ]
            );
    }
}
