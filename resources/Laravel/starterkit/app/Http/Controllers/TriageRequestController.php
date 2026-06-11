<?php

namespace App\Http\Controllers;

use App\Enums\RequestStatus;
use App\Http\Requests\TriageTransitionRequest;
use App\Models\MinistryRequest;
use App\Models\Profile;
use App\Services\RequestIntakeService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TriageRequestController extends Controller
{
    public function __construct(private readonly RequestIntakeService $requestIntakeService) {}

    public function index(Request $request): View
    {
        $currentProfile = $this->currentProfile($request);
        $status = RequestStatus::tryFrom($request->string('status')->toString());
        $search = trim($request->string('search')->toString());

        $requests = MinistryRequest::query()
            ->where('organization_id', $currentProfile->organization_id)
            ->whereNotIn('status', [RequestStatus::Draft, RequestStatus::Archived])
            ->when(
                $status,
                fn (Builder $query) => $query->where('status', $status),
                fn (Builder $query) => $query->whereIn('status', [
                    RequestStatus::Submitted,
                    RequestStatus::NeedsClarification,
                    RequestStatus::InTriage,
                ]),
            )
            ->when($search !== '', function (Builder $query) use ($search) {
                $query->where(function (Builder $builder) use ($search) {
                    $builder
                        ->where('title', 'like', '%'.$search.'%')
                        ->orWhereHas('requesterProfile', fn (Builder $profileQuery) => $profileQuery->where('display_name', 'like', '%'.$search.'%'))
                        ->orWhereHas('department', fn (Builder $departmentQuery) => $departmentQuery->where('name', 'like', '%'.$search.'%'));
                });
            })
            ->with(['department', 'requesterProfile'])
            ->latest('updated_at')
            ->paginate(15)
            ->withQueryString();

        return view('triage.index', [
            'currentProfile' => $currentProfile,
            'requests' => $requests,
            'filters' => [
                'search' => $search,
                'status' => $status?->value,
            ],
            'statuses' => collect(RequestStatus::cases())
                ->reject(fn (RequestStatus $status) => in_array($status, [RequestStatus::Draft, RequestStatus::Archived], true)),
        ]);
    }

    public function show(Request $request, MinistryRequest $ministryRequest): View
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeTriageRequest($ministryRequest, $currentProfile);

        return view('triage.show', [
            'currentProfile' => $currentProfile,
            'ministryRequest' => $ministryRequest->load([
                'department',
                'requesterProfile.user',
                'assignedManagerProfile',
                'decisionByProfile',
                'answers',
                'ideas',
            ]),
        ]);
    }

    public function transition(TriageTransitionRequest $request, MinistryRequest $ministryRequest): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeTriageRequest($ministryRequest, $currentProfile);
        $validated = $request->validated();
        $status = RequestStatus::from($validated['status']);

        DB::transaction(function () use ($ministryRequest, $status, $currentProfile, $validated) {
            $this->requestIntakeService->transition(
                $ministryRequest,
                $status,
                $currentProfile,
                $validated['notes'] ?? null,
            );

            $updates = [];

            if ($status === RequestStatus::NeedsClarification) {
                $updates['missing_information_json'] = [
                    'message' => $validated['notes'],
                    'requested_at' => now()->toIso8601String(),
                    'requested_by_profile_id' => $currentProfile->id,
                ];
                $updates['assigned_manager_profile_id'] = $currentProfile->id;
            }

            if ($status === RequestStatus::InTriage) {
                $updates['assigned_manager_profile_id'] = $currentProfile->id;
            }

            if (array_key_exists('triage_summary', $validated)) {
                $updates['triage_summary'] = $validated['triage_summary'];
            }

            if ($updates !== []) {
                $ministryRequest->update($updates);
            }
        });

        return to_route('triage.show', $ministryRequest)->with('status', "Request moved to {$status->value}.");
    }

    private function currentProfile(Request $request): Profile
    {
        $profile = $request->user()
            ->profiles()
            ->with('organization')
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($profile?->hasPermission('requests.triage'), 403);

        return $profile;
    }

    private function authorizeTriageRequest(MinistryRequest $request, Profile $profile): void
    {
        abort_unless(
            $request->organization_id === $profile->organization_id
                && ! in_array($request->status, [RequestStatus::Draft, RequestStatus::Archived], true),
            403,
        );
    }
}
