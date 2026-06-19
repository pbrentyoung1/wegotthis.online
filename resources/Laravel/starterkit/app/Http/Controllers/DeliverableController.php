<?php

namespace App\Http\Controllers;

use App\Enums\DeliverableStatus;
use App\Http\Requests\DeliverableFormRequest;
use App\Models\Deliverable;
use App\Models\DeliverableType;
use App\Models\Profile;
use App\Models\Project;
use App\Services\DeliverableManagementService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeliverableController extends Controller
{
    public function __construct(private readonly DeliverableManagementService $service) {}

    public function show(Request $request, Project $project, Deliverable $deliverable): View
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        $canViewInternal = $this->canViewInternal($currentProfile, $project, $deliverable);
        $isStakeholderReviewer = $deliverable->stakeholder_reviewer_profile_id === $currentProfile->id;
        abort_unless($canViewInternal || $isStakeholderReviewer, 403);

        $deliverable->load([
            'deliverableType',
            'ownerProfile',
            'internalReviewerProfile',
            'stakeholderReviewerProfile',
            'links',
            'reviews.reviewerProfile',
            'tasks.assigneeProfile',
            'conversation.messages.authorProfile',
            'conversation.participants.profile',
            'activityEvents' => fn ($q) => $q->with('actorProfile')->latest('occurred_at'),
        ]);
        $latestRound = (int) $deliverable->reviews->max('round_number');
        $latestReviews = $deliverable->reviews->where('round_number', $latestRound);
        $currentReview = $latestReviews->firstWhere('reviewer_profile_id', $currentProfile->id);
        $canStartProduction = ($currentProfile->hasPermission('projects.manage') || $deliverable->owner_profile_id === $currentProfile->id)
            && $deliverable->lifecycle_status === DeliverableStatus::Planning;
        $canSubmitReview = ($currentProfile->hasPermission('projects.manage') || $deliverable->owner_profile_id === $currentProfile->id)
            && in_array($deliverable->lifecycle_status, [DeliverableStatus::InProduction, DeliverableStatus::Revision], true);
        $canManageLifecycle = $currentProfile->hasPermission('projects.manage') || $deliverable->owner_profile_id === $currentProfile->id;

        return view('deliverables.show', compact(
            'currentProfile',
            'project',
            'deliverable',
            'canViewInternal',
            'isStakeholderReviewer',
            'latestRound',
            'latestReviews',
            'currentReview',
            'canStartProduction',
            'canSubmitReview',
            'canManageLifecycle',
        ));
    }

    public function create(Request $request, Project $project): View
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeManage($currentProfile);

        $deliverableTypes = DeliverableType::query()
            ->where('organization_id', $currentProfile->organization_id)
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $teamProfiles = $project->members()
            ->with('profile')
            ->get()
            ->pluck('profile')
            ->filter()
            ->sortBy('display_name')
            ->values();

        return view('deliverables.create', compact('currentProfile', 'project', 'deliverableTypes', 'teamProfiles'));
    }

    public function store(DeliverableFormRequest $request, Project $project): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeManage($currentProfile);

        $this->validateProfilesInOrg($request->validated(), $currentProfile);

        $deliverable = $this->service->createDeliverable($project, $request->validated(), $currentProfile);

        return redirect()
            ->route('deliverables.show', [$project, $deliverable])
            ->with('success', 'Deliverable added.');
    }

    public function edit(Request $request, Project $project, Deliverable $deliverable): View
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeManage($currentProfile);
        $this->authorizeDeliverable($project, $deliverable);

        $deliverable->load(['deliverableType', 'ownerProfile', 'internalReviewerProfile', 'stakeholderReviewerProfile']);

        $deliverableTypes = DeliverableType::query()
            ->where('organization_id', $currentProfile->organization_id)
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $teamProfiles = Profile::query()
            ->where('organization_id', $currentProfile->organization_id)
            ->where('status', 'Active')
            ->orderBy('display_name')
            ->get();

        return view('deliverables.edit', compact('currentProfile', 'project', 'deliverable', 'deliverableTypes', 'teamProfiles'));
    }

    public function update(DeliverableFormRequest $request, Project $project, Deliverable $deliverable): JsonResponse|RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeManage($currentProfile);
        $this->authorizeDeliverable($project, $deliverable);

        $this->validateProfilesInOrg($request->validated(), $currentProfile);

        $deliverable = $this->service->updateDeliverable($deliverable, $request->validated(), $currentProfile)
            ->load(['deliverableType', 'ownerProfile']);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Deliverable updated.',
                'deliverable' => [
                    'id' => $deliverable->id,
                    'title' => $deliverable->title,
                    'deliverable_type_id' => $deliverable->deliverable_type_id,
                    'type' => $deliverable->deliverableType?->name ?: 'Deliverable',
                    'owner_profile_id' => $deliverable->owner_profile_id,
                    'owner' => $deliverable->ownerProfile?->display_name ?: 'Unassigned',
                    'due_date_value' => $deliverable->due_date?->format('Y-m-d'),
                    'due_date' => $deliverable->due_date?->format('M j, Y') ?: 'Not planned',
                    'due_date_short' => $deliverable->due_date?->format('M j'),
                    'publish_date_value' => $deliverable->publish_date?->format('Y-m-d'),
                    'publish_date' => $deliverable->publish_date?->format('M j, Y') ?: 'Not planned',
                    'attention_state' => $deliverable->attention_state,
                    'audience' => $deliverable->audience,
                    'desired_action' => $deliverable->desired_action,
                ],
            ]);
        }

        return redirect()
            ->route('deliverables.show', [$project, $deliverable])
            ->with('success', 'Deliverable updated.');
    }

    public function plan(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeManage($currentProfile);
        $this->authorizeDeliverable($project, $deliverable);

        $this->service->moveToPlanningStatus($deliverable, $currentProfile);

        return redirect()
            ->route('deliverables.show', [$project, $deliverable])
            ->with('success', 'Deliverable moved to Planning.');
    }

    public function submitForReview(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless(
            $currentProfile->hasPermission('projects.manage') || $deliverable->owner_profile_id === $currentProfile->id,
            403,
        );

        $this->service->submitForReview($deliverable, $currentProfile);

        return redirect()->route('deliverables.show', [$project, $deliverable])->with('success', 'Deliverable submitted for review.');
    }

    public function startProduction(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless(
            $currentProfile->hasPermission('projects.manage') || $deliverable->owner_profile_id === $currentProfile->id,
            403,
        );

        $this->service->startProduction($deliverable, $currentProfile);

        return redirect()->route('deliverables.show', [$project, $deliverable])->with('success', 'Deliverable moved to In Production.');
    }

    public function reviewDecision(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        $validated = $request->validate([
            'decision' => ['required', 'in:Approved,Changes Requested'],
            'notes' => ['nullable', 'string', 'max:20000'],
        ]);
        $latestRound = (int) $deliverable->reviews()->max('round_number');
        abort_unless(
            $deliverable->reviews()
                ->where('round_number', $latestRound)
                ->where('reviewer_profile_id', $currentProfile->id)
                ->where('decision', 'Pending')
                ->exists(),
            403,
        );

        $this->service->recordReviewDecision($deliverable, $currentProfile, $validated['decision'], $validated['notes'] ?? null);

        return redirect()->route('deliverables.show', [$project, $deliverable])
            ->with('success', $validated['decision'] === 'Approved' ? 'Approval recorded.' : 'Changes requested.');
    }

    public function startDelivery(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $profile = $this->lifecycleManager($request, $project, $deliverable);
        $this->service->startDelivery($deliverable, $profile);

        return $this->lifecycleRedirect($project, $deliverable, 'Delivery started.');
    }

    public function markPublished(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $profile = $this->lifecycleManager($request, $project, $deliverable);
        $validated = $request->validate(['delivery_note' => ['nullable', 'string', 'max:5000']]);
        $this->service->markPublished($deliverable, $profile, $validated['delivery_note'] ?? null);

        return $this->lifecycleRedirect($project, $deliverable, 'Deliverable marked published / delivered.');
    }

    public function end(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $profile = $this->lifecycleManager($request, $project, $deliverable);
        $this->service->endDeliverable($deliverable, $profile);

        return $this->lifecycleRedirect($project, $deliverable, 'Deliverable ended.');
    }

    public function archive(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $profile = $this->lifecycleManager($request, $project, $deliverable);
        $this->service->archiveDeliverable($deliverable, $profile);

        return $this->lifecycleRedirect($project, $deliverable, 'Deliverable archived.');
    }

    private function currentProfile(Request $request, Project $project): Profile
    {
        $profile = $request->user()
            ->profiles()
            ->with('organization')
            ->where('status', 'Active')
            ->where('organization_id', $project->organization_id)
            ->orderBy('id')
            ->first();

        abort_unless($profile, 403);

        return $profile;
    }

    private function authorizeManage(Profile $profile): void
    {
        abort_unless($profile->hasPermission('projects.manage'), 403);
    }

    private function lifecycleManager(Request $request, Project $project, Deliverable $deliverable): Profile
    {
        $profile = $this->currentProfile($request, $project);
        $this->authorizeDeliverable($project, $deliverable);
        abort_unless($profile->hasPermission('projects.manage') || $deliverable->owner_profile_id === $profile->id, 403);

        return $profile;
    }

    private function lifecycleRedirect(Project $project, Deliverable $deliverable, string $message): RedirectResponse
    {
        return redirect()->route('deliverables.show', [$project, $deliverable])->with('success', $message);
    }

    private function authorizeDeliverable(Project $project, Deliverable $deliverable): void
    {
        abort_unless($deliverable->project_id === $project->id, 404);
    }

    private function canViewInternal(Profile $profile, Project $project, Deliverable $deliverable): bool
    {
        if ($profile->hasPermission('projects.manage')) {
            return true;
        }

        $isInternalMember = $project->members()
            ->where('profile_id', $profile->id)
            ->whereNotIn('project_role', ['Stakeholder', 'Reviewer'])
            ->exists();

        $isAssignedInternally = in_array($profile->id, [
            $deliverable->owner_profile_id,
            $deliverable->internal_reviewer_profile_id,
        ], true);
        $isAssignedToProject = $project->deliverables()
            ->whereHas('tasks', fn (Builder $tasks) => $tasks->where('assigned_to_profile_id', $profile->id))
            ->exists();

        return $isInternalMember || $isAssignedInternally || $isAssignedToProject;
    }

    private function validateProfilesInOrg(array $validated, Profile $currentProfile): void
    {
        $profileFields = ['owner_profile_id', 'internal_reviewer_profile_id', 'stakeholder_reviewer_profile_id'];

        foreach ($profileFields as $field) {
            $id = $validated[$field] ?? null;
            if (! $id) {
                continue;
            }

            $exists = Profile::query()
                ->where('id', $id)
                ->where('organization_id', $currentProfile->organization_id)
                ->exists();

            abort_unless($exists, 422, 'Selected profile does not belong to this organization.');
        }
    }
}
