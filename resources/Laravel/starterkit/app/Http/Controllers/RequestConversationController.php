<?php

namespace App\Http\Controllers;

use App\Enums\RequestStatus;
use App\Http\Requests\StoreRequestMessageRequest;
use App\Models\MinistryRequest;
use App\Models\Profile;
use App\Services\RequestConversationService;
use App\Services\RequestIntakeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class RequestConversationController extends Controller
{
    public function __construct(
        private readonly RequestConversationService $conversationService,
        private readonly RequestIntakeService $requestIntakeService,
    ) {}

    public function store(StoreRequestMessageRequest $request, MinistryRequest $ministryRequest): RedirectResponse
    {
        $profile = $this->currentProfile($request);
        $isRequester = $ministryRequest->requester_profile_id === $profile->id && $profile->hasPermission('requests.submit');
        $canTriage = $profile->hasPermission('requests.triage');
        $isParticipant = $ministryRequest->conversation()
            ->whereHas('participants', fn ($query) => $query->where('profile_id', $profile->id))
            ->exists();

        abort_unless(
            $ministryRequest->organization_id === $profile->organization_id
                && ! in_array($ministryRequest->status, [RequestStatus::Draft, RequestStatus::Archived], true)
                && ($isRequester || $canTriage || $isParticipant),
            403,
        );

        $validated = $request->validated();
        $clarification = ($validated['intent'] ?? 'message') === 'clarification';
        abort_if($clarification && ! $canTriage, 403);

        DB::transaction(function () use ($ministryRequest, $profile, $validated, $clarification) {
            $this->conversationService->addMessage(
                $ministryRequest,
                $profile,
                $validated['message'],
                $clarification ? 'Clarification Request' : 'Comment',
                $validated['parent_message_id'] ?? null,
            );

            if ($clarification) {
                if ($ministryRequest->status !== RequestStatus::NeedsClarification) {
                    $this->requestIntakeService->transition(
                        $ministryRequest->refresh(),
                        RequestStatus::NeedsClarification,
                        $profile,
                        $validated['message'],
                    );
                }

                $ministryRequest->update([
                    'assigned_manager_profile_id' => $profile->id,
                    'missing_information_json' => [
                        'message' => $validated['message'],
                        'requested_at' => now()->toIso8601String(),
                        'requested_by_profile_id' => $profile->id,
                    ],
                ]);
            }
        });

        $route = $canTriage ? 'triage.show' : 'requests.show';

        return to_route($route, $ministryRequest)->with('status', $clarification ? 'Clarification requested.' : 'Message sent.');
    }

    private function currentProfile(StoreRequestMessageRequest $request): Profile
    {
        return $request->user()
            ->profiles()
            ->where('status', 'Active')
            ->orderBy('id')
            ->firstOrFail();
    }
}
