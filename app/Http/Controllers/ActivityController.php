<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\OpportunityActivityResource;

class ActivityController extends Controller
{
    public function index(Request $request, Opportunity $opportunity)
    {
        $userActivity = UserActivity::query()
            ->firstOrNew(['user_id' =>  $request->user()->id]);
        $last_seen_at = $userActivity->last_seen_at;
        $unreadCount = $opportunity->opportunityActivities()
            ->when($last_seen_at,
                function (Builder $builder) use ($last_seen_at) {
                    return $builder->where('created_at', '>', $last_seen_at);
                })->count();
        $userActivity->last_seen_at = now();
        $userActivity->save();

        return OpportunityActivityResource::collection(
            $opportunity->opportunityActivities()->get()
        )->additional([
            'meta' => [
                'unread_count'   => $unreadCount,
                'unread_last_at' => $last_seen_at,
            ]
        ]);
    }
}
