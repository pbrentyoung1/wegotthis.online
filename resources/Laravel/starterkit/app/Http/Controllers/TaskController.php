<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\TaskFormRequest;
use App\Models\Deliverable;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Task;
use App\Services\TaskManagementService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function __construct(private readonly TaskManagementService $service) {}

    public function create(Request $request, Project $project, Deliverable $deliverable): View
    {
        $profile = $this->profile($request, $project);
        $this->authorizeDeliverable($profile, $project, $deliverable);
        $this->authorizeCreate($profile, $deliverable);

        return view('tasks.create', [
            'currentProfile' => $profile,
            'project' => $project,
            'deliverable' => $deliverable,
            'assignableProfiles' => $this->assignableProfiles($project),
            'statuses' => TaskStatus::cases(),
        ]);
    }

    public function store(TaskFormRequest $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $profile = $this->profile($request, $project);
        $this->authorizeDeliverable($profile, $project, $deliverable);
        $this->authorizeCreate($profile, $deliverable);

        $task = $this->service->create($deliverable, $request->validated(), $profile);

        return redirect()->route('tasks.show', [$project, $deliverable, $task])->with('success', 'Task added.');
    }

    public function show(Request $request, Project $project, Deliverable $deliverable, Task $task): View
    {
        $profile = $this->profile($request, $project);
        $this->authorizeTask($profile, $project, $deliverable, $task);
        $task->load(['assigneeProfile', 'links', 'activityEvents.actorProfile']);
        $canUpdate = $profile->hasPermission('projects.manage')
            || $deliverable->owner_profile_id === $profile->id
            || $task->assigned_to_profile_id === $profile->id;
        $canViewDeliverable = $this->canViewDeliverable($profile, $project, $deliverable);

        return view('tasks.show', compact('profile', 'project', 'deliverable', 'task', 'canUpdate', 'canViewDeliverable'));
    }

    public function edit(Request $request, Project $project, Deliverable $deliverable, Task $task): View
    {
        $profile = $this->profile($request, $project);
        $this->authorizeTask($profile, $project, $deliverable, $task);
        $this->authorizeUpdate($profile, $deliverable, $task);

        return view('tasks.edit', [
            'currentProfile' => $profile,
            'project' => $project,
            'deliverable' => $deliverable,
            'task' => $task,
            'assignableProfiles' => $this->assignableProfiles($project),
            'statuses' => TaskStatus::cases(),
        ]);
    }

    public function update(TaskFormRequest $request, Project $project, Deliverable $deliverable, Task $task): RedirectResponse
    {
        $profile = $this->profile($request, $project);
        $this->authorizeTask($profile, $project, $deliverable, $task);
        $this->authorizeUpdate($profile, $deliverable, $task);

        $this->service->update($task, $request->validated(), $profile);

        return redirect()->route('tasks.show', [$project, $deliverable, $task])->with('success', 'Task updated.');
    }

    private function profile(Request $request, Project $project): Profile
    {
        $profile = $request->user()->profiles()
            ->where('status', 'Active')
            ->where('organization_id', $project->organization_id)
            ->first();

        abort_unless($profile, 403);

        return $profile;
    }

    private function authorizeDeliverable(Profile $profile, Project $project, Deliverable $deliverable): void
    {
        abort_unless($deliverable->project_id === $project->id, 404);
        abort_unless($this->canViewDeliverable($profile, $project, $deliverable), 403);
    }

    private function authorizeTask(Profile $profile, Project $project, Deliverable $deliverable, Task $task): void
    {
        abort_unless($task->deliverable_id === $deliverable->id, 404);
        abort_unless(
            $task->assigned_to_profile_id === $profile->id
            || $this->canViewDeliverable($profile, $project, $deliverable),
            403,
        );
    }

    private function authorizeCreate(Profile $profile, Deliverable $deliverable): void
    {
        abort_unless($profile->hasPermission('tasks.create') || $deliverable->owner_profile_id === $profile->id, 403);
    }

    private function authorizeUpdate(Profile $profile, Deliverable $deliverable, Task $task): void
    {
        abort_unless(
            $profile->hasPermission('projects.manage')
            || $deliverable->owner_profile_id === $profile->id
            || $task->assigned_to_profile_id === $profile->id,
            403,
        );
    }

    private function canViewDeliverable(Profile $profile, Project $project, Deliverable $deliverable): bool
    {
        return $profile->hasPermission('projects.manage')
            || $deliverable->owner_profile_id === $profile->id
            || $deliverable->internal_reviewer_profile_id === $profile->id
            || $project->members()->where('profile_id', $profile->id)->whereNotIn('project_role', ['Stakeholder', 'Reviewer'])->exists()
            || $project->deliverables()
                ->whereHas('tasks', fn (Builder $tasks) => $tasks->where('assigned_to_profile_id', $profile->id))
                ->exists();
    }

    private function assignableProfiles(Project $project): Collection
    {
        return Profile::query()->where('organization_id', $project->organization_id)
            ->where('status', 'Active')
            ->with('department')
            ->orderBy('display_name')
            ->get();
    }
}
