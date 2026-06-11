<?php

namespace App\Http\Controllers;

use App\Enums\RequestStatus;
use App\Http\Requests\MinistryRequestFormRequest;
use App\Models\Department;
use App\Models\MinistryRequest;
use App\Models\Profile;
use App\Services\RequestConversationService;
use App\Services\RequestIntakeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MinistryRequestController extends Controller
{
    public function __construct(
        private readonly RequestIntakeService $requestIntakeService,
        private readonly RequestConversationService $requestConversationService,
    ) {}

    public function index(Request $request): View
    {
        $currentProfile = $this->currentProfile($request, 'requests.submit');

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
        $currentProfile = $this->currentProfile($request, 'requests.submit');

        return view('requests.create', [
            'currentProfile' => $currentProfile,
            'departments' => $this->departmentsFor($currentProfile),
            'reviewerProfiles' => $this->reviewerProfilesFor($currentProfile),
        ]);
    }

    public function store(MinistryRequestFormRequest $request): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, 'requests.submit');
        $validated = $request->validated();

        $ministryRequest = DB::transaction(function () use ($validated, $currentProfile) {
            $ministryRequest = $this->requestIntakeService->createRequest(
                $currentProfile->organization,
                $currentProfile,
                $this->requestAttributes($validated, $currentProfile),
            );

            $this->saveMinistryBriefDetails($ministryRequest, $validated, $currentProfile);

            if ($validated['intent'] === 'submit') {
                $ministryRequest = $this->requestIntakeService->transition($ministryRequest, RequestStatus::Submitted, $currentProfile);
            }

            return $ministryRequest;
        });

        return to_route('requests.show', $ministryRequest)
            ->with('status', $validated['intent'] === 'submit' ? 'Your request has been submitted.' : 'Your draft has been saved.');
    }

    public function show(Request $request, MinistryRequest $ministryRequest): View
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeVisibleRequest($ministryRequest, $currentProfile);

        return view('requests.show', [
            'currentProfile' => $currentProfile,
            'ministryRequest' => $ministryRequest->load([
                'department',
                'requesterProfile',
                'assignedManagerProfile',
                'answers',
                'ideas',
                'conversation.participants.profile',
                'conversation.messages.authorProfile',
            ]),
        ]);
    }

    public function edit(Request $request, MinistryRequest $ministryRequest): View
    {
        $currentProfile = $this->currentProfile($request, 'requests.submit');
        $this->authorizeEditableRequest($ministryRequest, $currentProfile);

        return view('requests.edit', [
            'currentProfile' => $currentProfile,
            'ministryRequest' => $ministryRequest->load(['answers', 'ideas']),
            'departments' => $this->departmentsFor($currentProfile),
            'reviewerProfiles' => $this->reviewerProfilesFor($currentProfile),
        ]);
    }

    public function update(MinistryRequestFormRequest $request, MinistryRequest $ministryRequest): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, 'requests.submit');
        $this->authorizeEditableRequest($ministryRequest, $currentProfile);
        $validated = $request->validated();

        DB::transaction(function () use ($ministryRequest, $validated, $currentProfile) {
            $ministryRequest->update($this->requestAttributes($validated, $currentProfile));
            $this->saveMinistryBriefDetails($ministryRequest, $validated, $currentProfile);

            if ($validated['intent'] === 'submit') {
                $this->requestIntakeService->transition($ministryRequest->refresh(), RequestStatus::Submitted, $currentProfile);
            }
        });

        return to_route('requests.show', $ministryRequest)
            ->with('status', $validated['intent'] === 'submit' ? 'Your request has been submitted.' : 'Your draft has been saved.');
    }

    public function submit(Request $request, MinistryRequest $ministryRequest): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, 'requests.submit');
        $this->authorizeEditableRequest($ministryRequest, $currentProfile);

        $this->requestIntakeService->transition($ministryRequest, RequestStatus::Submitted, $currentProfile);

        return to_route('requests.show', $ministryRequest)->with('status', 'Your request has been submitted.');
    }

    private function currentProfile(Request $request, ?string $permission = null): Profile
    {
        $profile = $request->user()
            ->profiles()
            ->with('organization')
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($profile && ($permission === null || $profile->hasPermission($permission)), 403);

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

    private function authorizeVisibleRequest(MinistryRequest $request, Profile $profile): void
    {
        $isOwner = $request->requester_profile_id === $profile->id;
        $isParticipant = $request->conversation()
            ->whereHas('participants', fn ($query) => $query->where('profile_id', $profile->id))
            ->exists();

        abort_unless(
            $request->organization_id === $profile->organization_id
                && ($isOwner || ($request->status !== RequestStatus::Draft && $isParticipant)),
            403,
        );
    }

    private function authorizeEditableRequest(MinistryRequest $request, Profile $profile): void
    {
        $this->authorizeOwnedRequest($request, $profile);
        abort_unless(in_array($request->status, [RequestStatus::Draft, RequestStatus::NeedsClarification], true), 403);
    }

    private function departmentsFor(Profile $profile)
    {
        return Department::query()
            ->where('organization_id', $profile->organization_id)
            ->where('status', 'Active')
            ->orderBy('name')
            ->get();
    }

    private function reviewerProfilesFor(Profile $profile)
    {
        return Profile::query()
            ->where('organization_id', $profile->organization_id)
            ->where('status', 'Active')
            ->with('department')
            ->orderBy('display_name')
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
                'action_deadline' => $validated['action_deadline'] ?? null,
                'needed_by' => $validated['needed_by'] ?? null,
            ]),
        ];
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    private function saveMinistryBriefDetails(MinistryRequest $request, array $validated, Profile $profile): void
    {
        foreach ([
            ['field' => 'success_looks_like', 'key' => 'success_looks_like', 'label' => 'What would success look like?', 'type' => 'text'],
            ['field' => 'key_message', 'key' => 'key_message', 'label' => 'What key message must people understand?', 'type' => 'text'],
            ['field' => 'sensitivities', 'key' => 'sensitivities', 'label' => 'Are there sensitivities or pastoral concerns?', 'type' => 'text'],
        ] as $answer) {
            if (! array_key_exists($answer['field'], $validated)) {
                continue;
            }

            if (blank($validated[$answer['field']] ?? null)) {
                $request->answers()->where('question_key', $answer['key'])->delete();

                continue;
            }

            $this->requestIntakeService->saveAnswer($request, [
                'question_key' => $answer['key'],
                'question_label' => $answer['label'],
                'answer_type' => $answer['type'],
                'answer_value' => $validated[$answer['field']],
                'answer_json' => null,
            ]);
        }

        $assetLinks = collect($validated['asset_links'] ?? [])
            ->map(fn (array $link) => [
                'label' => trim((string) ($link['label'] ?? '')),
                'url' => trim((string) ($link['url'] ?? '')),
            ])
            ->filter(fn (array $link) => filled($link['url']))
            ->unique('url')
            ->values();

        $existingAssetsAnswer = $request->answers()->where('question_key', 'existing_assets')->first();
        $hasLegacyAssets = collect($existingAssetsAnswer?->answer_json ?? [])
            ->doesntContain(fn ($link) => is_array($link) && filled($link['url'] ?? null))
            && filled($existingAssetsAnswer?->answer_json);

        if ($assetLinks->isEmpty() && blank($existingAssetsAnswer?->answer_value) && ! $hasLegacyAssets) {
            $request->answers()->where('question_key', 'existing_assets')->delete();
        } elseif ($assetLinks->isNotEmpty()) {
            $this->requestIntakeService->saveAnswer($request, [
                'question_key' => 'existing_assets',
                'question_label' => 'What existing branding, assets, examples, or links should Communications use?',
                'answer_type' => 'file_link',
                'answer_value' => null,
                'answer_json' => $assetLinks->all(),
            ]);
        }

        $reviewers = Profile::query()
            ->where('organization_id', $profile->organization_id)
            ->where('status', 'Active')
            ->whereIn('id', $validated['reviewer_profile_ids'] ?? [])
            ->orderBy('display_name')
            ->get(['id', 'display_name', 'title']);

        $existingReviewersAnswer = $request->answers()->where('question_key', 'reviewers_approvals')->first();

        if ($reviewers->isEmpty() && blank($existingReviewersAnswer?->answer_value)) {
            $request->answers()->where('question_key', 'reviewers_approvals')->delete();
        } elseif ($reviewers->isNotEmpty()) {
            $this->requestIntakeService->saveAnswer($request, [
                'question_key' => 'reviewers_approvals',
                'question_label' => 'Who needs to review or approve this?',
                'answer_type' => 'profile_reference',
                'answer_value' => null,
                'answer_json' => $reviewers->map(fn (Profile $reviewer) => [
                    'profile_id' => $reviewer->id,
                    'display_name' => $reviewer->display_name,
                    'title' => $reviewer->title,
                ])->all(),
            ]);
        }

        $this->requestConversationService->syncParticipants($request->refresh(), $reviewers);
    }
}
