<?php

namespace App\Http\Controllers;

use App\Enums\DeliverableStatus;
use App\Enums\ProjectStatus;
use App\Models\Deliverable;
use App\Models\DeliverableType;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectActivityEvent;
use App\Services\DeliverableManagementService;
use App\Support\RichText;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $currentProfile = $this->currentProfile($request);

        $projects = Project::query()
            ->where('organization_id', $currentProfile->organization_id)
            ->when(! $currentProfile->hasPermission('projects.manage'), fn (Builder $query) => $query
                ->where(fn (Builder $visible) => $visible
                    ->where('owner_profile_id', $currentProfile->id)
                    ->orWhereHas('members', fn (Builder $members) => $members->where('profile_id', $currentProfile->id))
                    ->orWhereHas('deliverables.tasks', fn (Builder $tasks) => $tasks->where('assigned_to_profile_id', $currentProfile->id))))
            ->with(['department', 'ownerProfile', 'members.profile'])
            ->withCount('deliverables')
            ->withExists([
                'deliverables as has_assigned_tasks' => fn (Builder $deliverables) => $deliverables
                    ->whereHas('tasks', fn (Builder $tasks) => $tasks->where('assigned_to_profile_id', $currentProfile->id)),
            ])
            ->latest('updated_at')
            ->paginate(15);

        return view('projects.index', compact('currentProfile', 'projects'));
    }

    public function show(Request $request, Project $project): View
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeVisibleProject($project, $currentProfile);
        $project->load([
            'department',
            'ownerProfile',
            'members.profile',
            'deliverables.deliverableType',
            'deliverables.tasks.assigneeProfile',
            'activityEvents.actorProfile',
            'sourceRequest.requesterProfile',
            'sourceRequest.assignedManagerProfile',
            'sourceRequest.conversation.participants.profile',
            'sourceRequest.conversation.messages.authorProfile',
        ]);
        $canViewInternalTasks = $currentProfile->hasPermission('projects.manage')
            || $project->owner_profile_id === $currentProfile->id
            || $project->members()
                ->where('profile_id', $currentProfile->id)
                ->whereNotIn('project_role', ['Stakeholder', 'Reviewer'])
                ->exists()
            || $this->isAssignedToProject($project, $currentProfile);

        return view('projects.show', [
            'currentProfile' => $currentProfile,
            'project' => $project,
            'activity' => $this->projectActivity($project, $canViewInternalTasks),
            'canViewInternalTasks' => $canViewInternalTasks,
            'projectStatuses' => collect(ProjectStatus::cases())
                ->reject(fn (ProjectStatus $status) => in_array($status, [ProjectStatus::Closeout, ProjectStatus::Archived], true))
                ->when(in_array($project->lifecycle_status, [ProjectStatus::Closeout->value, ProjectStatus::Archived->value], true), fn (Collection $statuses) => $statuses->push(ProjectStatus::from($project->lifecycle_status))),
        ]);
    }

    public function board(Request $request, Project $project): View
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeVisibleProject($project, $currentProfile);
        abort_unless($this->canViewInternalProject($project, $currentProfile), 403);

        $project->load([
            'deliverables.deliverableType',
            'deliverables.tasks.assigneeProfile',
            'deliverables.ownerProfile',
        ]);

        $columns = collect(DeliverableStatus::cases())
            ->reject(fn (DeliverableStatus $s) => in_array($s, [DeliverableStatus::InReview, DeliverableStatus::Archived], true))
            ->mapWithKeys(fn (DeliverableStatus $s) => [
                $s->value => [
                    'status' => $s,
                    'deliverables' => $project->deliverables
                        ->filter(fn ($d) => $d->lifecycle_status === $s)
                        ->values(),
                ],
            ]);

        return view('projects.board', [
            'currentProfile' => $currentProfile,
            'project' => $project,
            'columns' => $columns,
            'deliverableTypes' => DeliverableType::query()
                ->where('organization_id', $project->organization_id)
                ->where('is_active', true)
                ->orderBy('name')
                ->get(),
            'teamProfiles' => Profile::query()
                ->where('organization_id', $project->organization_id)
                ->where('status', 'Active')
                ->orderBy('display_name')
                ->get(),
            'canManage' => $currentProfile->hasPermission('projects.manage')
                || $project->owner_profile_id === $currentProfile->id,
        ]);
    }

    public function boardMove(Request $request, Project $project, Deliverable $deliverable, DeliverableManagementService $service): JsonResponse|RedirectResponse
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeVisibleProject($project, $currentProfile);

        abort_unless(
            $currentProfile->hasPermission('projects.manage') || $project->owner_profile_id === $currentProfile->id,
            403,
        );
        abort_unless($deliverable->project_id === $project->id, 404);

        $validated = $request->validate([
            'lifecycle_status' => ['required', Rule::enum(DeliverableStatus::class)],
            'ordered_ids' => ['nullable', 'array'],
            'ordered_ids.*' => ['integer'],
        ]);

        $status = DeliverableStatus::from($validated['lifecycle_status']);
        abort_if($status === DeliverableStatus::Archived, 422, 'Deliverables cannot be archived from the board.');

        $service->updateBoardStatus($deliverable, $status, $currentProfile, $validated['ordered_ids'] ?? null);

        if (! $request->expectsJson()) {
            return back()->with('success', "Moved {$deliverable->title} to {$status->value}.");
        }

        return response()->json([
            'status' => 'ok',
            'lifecycle_status' => $status->value,
            'allowed_targets' => collect($status->boardTargets())->map->value->all(),
        ]);
    }

    public function updateStatus(Request $request, Project $project): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeVisibleProject($project, $currentProfile);
        abort_unless($currentProfile->hasPermission('projects.manage'), 403);
        if (in_array($project->lifecycle_status, [ProjectStatus::Closeout->value, ProjectStatus::Archived->value], true)) {
            throw ValidationException::withMessages(['lifecycle_status' => 'Use the project closeout workflow after closeout begins.']);
        }

        $validated = $request->validate([
            'lifecycle_status' => ['required', Rule::enum(ProjectStatus::class)],
        ]);
        if (in_array($validated['lifecycle_status'], [ProjectStatus::Closeout->value, ProjectStatus::Archived->value], true)) {
            throw ValidationException::withMessages(['lifecycle_status' => 'Use the project closeout workflow for Closeout and Archived statuses.']);
        }

        $oldStatus = $project->lifecycle_status;
        $project->update(['lifecycle_status' => $validated['lifecycle_status']]);

        if ($oldStatus !== $project->lifecycle_status) {
            ProjectActivityEvent::create([
                'organization_id' => $project->organization_id,
                'project_id' => $project->id,
                'actor_profile_id' => $currentProfile->id,
                'event_type' => 'project_status_updated',
                'description' => "Moved project from {$oldStatus} to {$project->lifecycle_status}.",
                'metadata_json' => ['from' => $oldStatus, 'to' => $project->lifecycle_status],
                'occurred_at' => now(),
            ]);
        }

        return back()->with('success', 'Project status updated.');
    }

    private function projectActivity(Project $project, bool $includeInternalTaskActivity): Collection
    {
        $activity = collect([[
            'occurred_at' => $project->created_at,
            'icon' => 'tabler--briefcase',
            'color' => 'text-primary',
            'title' => 'Project created',
            'description' => $project->sourceRequest
                ? "Converted from {$project->sourceRequest->title}."
                : 'Project workspace created.',
            'actor' => $project->ownerProfile,
        ]]);

        foreach ($project->activityEvents as $event) {
            if ($event->task_id && ! $includeInternalTaskActivity) {
                continue;
            }

            $activity->push([
                'occurred_at' => $event->occurred_at,
                'icon' => $event->icon(),
                'color' => $event->color(),
                'title' => $event->title(),
                'description' => $event->description,
                'actor' => $event->actorProfile,
            ]);
        }

        foreach ($project->sourceRequest?->conversation?->messages ?? collect() as $message) {
            $activity->push([
                'occurred_at' => $message->created_at,
                'icon' => 'tabler--message-circle',
                'color' => 'text-success',
                'title' => $message->message_type === 'Clarification Request' ? 'Clarification requested' : 'Conversation updated',
                'description' => str(RichText::plainText($message->body))->squish()->limit(120)->toString(),
                'actor' => $message->authorProfile,
            ]);
        }

        return $activity->sortByDesc('occurred_at')->values();
    }

    private function currentProfile(Request $request): Profile
    {
        $profile = $request->user()
            ->profiles()
            ->with('organization')
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($profile, 403);

        return $profile;
    }

    private function authorizeVisibleProject(Project $project, Profile $profile): void
    {
        $isMember = $project->members()->where('profile_id', $profile->id)->exists();
        $isAssigned = $this->isAssignedToProject($project, $profile);

        abort_unless(
            $project->organization_id === $profile->organization_id
                && ($profile->hasPermission('projects.manage') || $project->owner_profile_id === $profile->id || $isMember || $isAssigned),
            403,
        );
    }

    private function isAssignedToProject(Project $project, Profile $profile): bool
    {
        return $project->deliverables()
            ->whereHas('tasks', fn (Builder $tasks) => $tasks->where('assigned_to_profile_id', $profile->id))
            ->exists();
    }

    private function canViewInternalProject(Project $project, Profile $profile): bool
    {
        return $profile->hasPermission('projects.manage')
            || $project->owner_profile_id === $profile->id
            || $project->members()
                ->where('profile_id', $profile->id)
                ->whereNotIn('project_role', ['Stakeholder', 'Reviewer'])
                ->exists()
            || $this->isAssignedToProject($project, $profile);
    }
}
