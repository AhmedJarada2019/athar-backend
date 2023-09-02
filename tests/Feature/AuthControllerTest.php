<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Setting;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use Database\Factories\CountryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        Setting::fake(Setting::SKIP_SMS, true);

        $password = Hash::make('123456789');
        $country = CountryFactory::new()->create([
            'iso_code'    => 'SA',
            'name'        => 'السعودية',
            'mobile_code' => '+966',
        ]);

        $this->postJson('api/users/register', [
            'mobile'     => '599123456',
            'password'   => $password,
            'country_id' => $country->id,
        ])
            ->assertSuccessful()
            ->assertJson([
                'data' => [
                    'mobile'               => '+966599123456',
                    'is_verified'          => false,
                    'password'             => $password,
                    'is_profile_completed' => false,
                ]
            ])
            ->assertJsonStructure(
                [
                    'token',
                ]
            );
    }

    public function test_user_can_login_with_correct_password()
    {
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

        $this->postJson('api/users/login', [
            'mobile'     => '599123456',
            'password'   => 'secret',
            'country_id' => $country->id,
        ])
            ->assertSuccessful()
            ->assertJsonStructure([
                'token',
            ]);
    }

    public function test_user_can_not_login_with_wrong_password()
    {
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

        $this->postJson('api/users/login', [
            'mobile'   => '+966599123456',
            'password' => 'wrong_secret',
        ])
            ->assertStatus(401)
            ->assertJson(
                [
                    'message' => 'رقم الهاتف أو كلمة المرور غير صحيحة',
                ]
            );
    }

    public function test_user_can_complete_register()
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
            ->putJson('api/users/complete-register', [
                'first_name'        => 'First',
                'last_name'         => 'Last',
                'email'             => 'test@test.com',
                'national_identity' => '123456789',
                'birthday'          => '2000-10-09',
            ])
            ->assertSuccessful()
            ->assertJson([
                'data' => [
                    'first_name'        => 'First',
                    'last_name'         => 'Last',
                    'email'             => 'test@test.com',
                    'national_identity' => '123456789',
                    'birthday'          => '2000-10-09',
                ],
            ]);
    }

    public function test_user_can_logout()
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

        $token = $user->createToken('user')->plainTextToken;

        $this->actingAs($user)->postJson('api/users/logout', [], [
            'Authorization' => "Bearer $token",
        ])
            ->assertSuccessful();

        $this->assertDatabaseCount('personal_access_tokens', 0);
    }

    public function test_skip_sms()
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
            'password'          => 'secret',
            'country_id'        => $country->id,
        ]);

        $this->actingAs($user)
            ->postJson('api/users/verify', [
                'code' => '7777',
            ])->dump()
            ->assertSuccessful();
    }
}
