<?php

namespace App\Http\Controllers;

use App\Enums\RequestStatus;
use App\Models\MinistryRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaggedRequestController extends Controller
{
    public function index(Request $request): View
    {
        $currentProfile = $this->currentProfile($request);

        $requests = MinistryRequest::query()
            ->where('organization_id', $currentProfile->organization_id)
            ->where('requester_profile_id', '!=', $currentProfile->id)
            ->whereNotIn('status', [RequestStatus::Draft, RequestStatus::Archived])
            ->whereHas('conversation', fn ($q) => $q->whereHas('participants', fn ($pq) => $pq->where('profile_id', $currentProfile->id)
            )
            )
            ->with([
                'requesterProfile',
                'conversation' => fn ($q) => $q->withCount('messages'),
            ])
            ->latest('updated_at')
            ->paginate(15);

        return view('requests.tagged', compact('currentProfile', 'requests'));
    }

    private function currentProfile(Request $request): Profile
    {
        $profile = $request->user()
            ->profiles()
            ->with('organization')
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($profile !== null, 403);

        return $profile;
    }
}
