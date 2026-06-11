<?php

namespace App\Http\Controllers;

use App\Enums\RequestStatus;
use App\Http\Requests\MinistryRequestFormRequest;
use App\Models\Department;
use App\Models\MinistryRequest;
use App\Models\Profile;
use App\Services\RequestIntakeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class MinistryRequestController extends Controller
{
    public function __construct(private readonly RequestIntakeService $requestIntakeService) {}

    public function index(Request $request): View
    {
        $currentProfile = $this->currentProfile($request);

        $requests = MinistryRequest::query()
            ->where('organization_id', $currentProfile->organization_id)
            ->where('requester_profile_id', $currentProfile->id)
            ->with('department')
            ->latest('updated_at')
            ->paginate(12);

        return view('requests.index', compact('currentProfile', 'requests'));
    }

    public function create(Request $request): View
    {
        $currentProfile = $this->currentProfile($request);

        return view('requests.create', [
            'currentProfile' => $currentProfile,
            'departments' => $this->departmentsFor($currentProfile),
        ]);
    }

    public function store(MinistryRequestFormRequest $request): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request);
        $validated = $request->validated();

        $ministryRequest = $this->requestIntakeService->createRequest(
            $currentProfile->organization,
            $currentProfile,
            $this->requestAttributes($validated, $currentProfile),
        );

        if ($validated['intent'] === 'submit') {
            $ministryRequest = $this->requestIntakeService->transition($ministryRequest, RequestStatus::Submitted, $currentProfile);
        }

        return to_route('requests.show', $ministryRequest)
            ->with('status', $validated['intent'] === 'submit' ? 'Your request has been submitted.' : 'Your draft has been saved.');
    }

    public function show(Request $request, MinistryRequest $ministryRequest): View
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeOwnedRequest($ministryRequest, $currentProfile);

        return view('requests.show', [
            'currentProfile' => $currentProfile,
            'ministryRequest' => $ministryRequest->load('department'),
        ]);
    }

    public function edit(Request $request, MinistryRequest $ministryRequest): View
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeEditableRequest($ministryRequest, $currentProfile);

        return view('requests.edit', [
            'currentProfile' => $currentProfile,
            'ministryRequest' => $ministryRequest,
            'departments' => $this->departmentsFor($currentProfile),
        ]);
    }

    public function update(MinistryRequestFormRequest $request, MinistryRequest $ministryRequest): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeEditableRequest($ministryRequest, $currentProfile);
        $validated = $request->validated();

        $ministryRequest->update($this->requestAttributes($validated, $currentProfile));

        if ($validated['intent'] === 'submit') {
            $ministryRequest = $this->requestIntakeService->transition($ministryRequest->refresh(), RequestStatus::Submitted, $currentProfile);
        }

        return to_route('requests.show', $ministryRequest)
            ->with('status', $validated['intent'] === 'submit' ? 'Your request has been submitted.' : 'Your draft has been saved.');
    }

    public function submit(Request $request, MinistryRequest $ministryRequest): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeEditableRequest($ministryRequest, $currentProfile);

        $this->requestIntakeService->transition($ministryRequest, RequestStatus::Submitted, $currentProfile);

        return to_route('requests.show', $ministryRequest)->with('status', 'Your request has been submitted.');
    }

    private function currentProfile(Request $request): Profile
    {
        $profile = $request->user()
            ->profiles()
            ->with('organization')
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($profile?->hasPermission('requests.submit'), 403);

        return $profile;
    }

    private function authorizeOwnedRequest(MinistryRequest $request, Profile $profile): void
    {
        abort_unless(
            $request->organization_id === $profile->organization_id
                && $request->requester_profile_id === $profile->id,
            403,
        );
    }

    private function authorizeEditableRequest(MinistryRequest $request, Profile $profile): void
    {
        $this->authorizeOwnedRequest($request, $profile);
        abort_unless($request->status === RequestStatus::Draft, 403);
    }

    private function departmentsFor(Profile $profile)
    {
        return Department::query()
            ->where('organization_id', $profile->organization_id)
            ->where('status', 'Active')
            ->orderBy('name')
            ->get();
    }

    /**
     * @param  array<string, mixed>  $validated
     * @return array<string, mixed>
     */
    private function requestAttributes(array $validated, Profile $profile): array
    {
        $department = filled($validated['department_id'] ?? null)
            ? Department::query()
                ->where('organization_id', $profile->organization_id)
                ->findOrFail($validated['department_id'])
            : null;

        return [
            ...Arr::only($validated, [
                'title',
                'ministry_need',
                'why_it_matters',
                'audience',
                'desired_action',
                'desired_tone',
                'known_constraints',
            ]),
            'department' => $department,
            'department_id' => $department?->id,
            'key_dates_json' => array_filter([
                'event_date' => $validated['event_date'] ?? null,
                'needed_by' => $validated['needed_by'] ?? null,
            ]),
        ];
    }
}
