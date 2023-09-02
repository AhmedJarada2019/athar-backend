<?php

namespace Tests\Feature;

use Database\Factories\OpportunityFactory;
use Illuminate\Foundation\Bootstrap\HandleExceptions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OpportunityControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_get_opportunity(): void
    {
        self::markTestIncomplete();
        $op = OpportunityFactory::new()->create();
        $response = $this->getJson('api/opportunities/' . 1)
        ->assertSuccessful();
        $response->assertStatus(200);
    }
}
