<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UserActivity;
use Database\Factories\UserFactory;
use Database\Factories\OpportunityFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Factories\OpportunityActivityFactory;

class ActivityControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list(): void
    {
        $this->withExceptionHandling();
        $opportunity = OpportunityFactory::new()->create();
        OpportunityActivityFactory::times(3)
            ->create([
                'opportunity_id' => $opportunity->id,

            ]);
        $user = UserFactory::new()
            ->create();

        $this
            ->actingAs($user)
            ->getJson('/api/opportunities/1/activities')
            ->assertSuccessful();
    }

    public function test_list_with_read(): void
    {
        $opportunity = OpportunityFactory::new()->create();
        OpportunityActivityFactory::times(3)
            ->create([
                'opportunity_id' => $opportunity->id,
                'created_at' => now()->subDays(3),
            ]);
        OpportunityActivityFactory::new()
            ->create([
                'opportunity_id' => $opportunity->id,
                'created_at' => now(),
            ]);
        $user = UserFactory::new()
            ->create();
        UserActivity::query()->create([
            'user_id'      => $user->id,
            'last_seen_at' => now()->subDays(1),
        ]);
        $this
            ->actingAs($user)
            ->getJson('/api/opportunities/1/activities')
            ->assertSuccessful();
    }
}
