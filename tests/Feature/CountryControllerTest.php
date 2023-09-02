<?php

namespace Tests\Feature;

use Tests\TestCase;
use Database\Factories\CountryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_list_countries()
    {
        CountryFactory::new()->count(3)->create();

        $this->getJson('api/countries')
            ->assertSuccessful()
            ->assertJsonStructure(
                [
                    'data' => [
                        [
                            'id',
                            'name',
                            'iso_code',
                            'mobile_code',
                        ],
                    ]
                ]
            );
    }
}
