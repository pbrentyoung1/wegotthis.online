<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectActivityEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProjectScheduleController extends Controller
{
    public function show(Request $request, Project $project): View
    {
        $profile = $this->currentProfile($request);
        $this->authorizeProject($project, $profile);
        $project->load(['deliverables.tasks.assigneeProfile', 'deliverables.deliverableType']);
        $project->deliverables->each(fn ($deliverable) => $deliverable->setRelation(
            'tasks',
            $deliverable->tasks->sortBy(fn ($task) => [$task->sort_order, $task->id])->values(),
        ));

        return view('projects.schedule', [
            'project' => $project,
            'canReorder' => $profile->hasPermission('projects.manage') || $project->owner_profile_id === $profile->id,
        ]);
    }

    public function reorder(Request $request, Project $project): JsonResponse
    {
        $profile = $this->currentProfile($request);
        $this->authorizeProject($project, $profile);
        abort_unless($profile->hasPermission('projects.manage') || $project->owner_profile_id === $profile->id, 403);

        $validated = $request->validate([
            'deliverable_ids' => ['required', 'array'],
            'deliverable_ids.*' => ['integer'],
            'task_orders' => ['required', 'array'],
            'task_orders.*' => ['array'],
            'task_orders.*.*' => ['integer'],
        ]);

        $deliverableIds = $project->deliverables()->pluck('id');
        abort_unless($deliverableIds->sort()->values()->all() === collect($validated['deliverable_ids'])->sort()->values()->all(), 422);

        DB::transaction(function () use ($project, $validated): void {
            foreach ($validated['deliverable_ids'] as $index => $deliverableId) {
                $project->deliverables()->whereKey($deliverableId)->update(['sort_order' => $index]);
            }

            foreach ($validated['task_orders'] as $deliverableId => $taskIds) {
                $deliverable = $project->deliverables()->findOrFail($deliverableId);
                abort_unless($deliverable->tasks()->pluck('id')->sort()->values()->all() === collect($taskIds)->sort()->values()->all(), 422);
                foreach ($taskIds as $index => $taskId) {
                    $deliverable->tasks()->whereKey($taskId)->update(['sort_order' => $index]);
                }
            }
        });
        $this->activity($project, $profile, 'project_schedule_reordered', 'Updated the Project Schedule sequence.');

        return response()->json(['message' => 'Project schedule order saved.']);
    }

    public function updateDates(Request $request, Project $project): RedirectResponse
    {
        $profile = $this->currentProfile($request);
        $this->authorizeProject($project, $profile);
        abort_unless($profile->hasPermission('projects.manage') || $project->owner_profile_id === $profile->id, 403);

        $validated = $request->validate([
            'source_type' => ['required', 'in:project,deliverable,task'],
            'source_id' => ['nullable', 'integer'],
            'start_date' => ['nullable', 'date'],
            'stop_date' => ['nullable', 'date'],
            'due_date' => ['nullable', 'date'],
            'publish_date' => ['nullable', 'date'],
        ]);

        match ($validated['source_type']) {
            'project' => $project->update(collect($validated)->only(['start_date', 'stop_date'])->all()),
            'deliverable' => $project->deliverables()->findOrFail($validated['source_id'])->update(collect($validated)->only(['due_date', 'publish_date'])->all()),
            'task' => $project->deliverables()->whereHas('tasks', fn ($query) => $query->whereKey($validated['source_id']))
                ->firstOrFail()->tasks()->findOrFail($validated['source_id'])->update(collect($validated)->only(['due_date'])->all()),
        };
        $this->activity($project, $profile, 'project_schedule_dates_updated', 'Updated dates from Project Schedule.');

        return back()->with('success', 'Schedule dates updated.');
    }

    private function currentProfile(Request $request): Profile
    {
        $profile = $request->user()->profiles()->where('status', 'Active')->orderBy('id')->first();
        abort_unless($profile, 403);

        return $profile;
    }

    private function authorizeProject(Project $project, Profile $profile): void
    {
        abort_unless($project->organization_id === $profile->organization_id && (
            $profile->hasPermission('projects.manage')
            || $project->owner_profile_id === $profile->id
            || $project->members()->where('profile_id', $profile->id)->exists()
            || $project->deliverables()->whereHas('tasks', fn ($query) => $query->where('assigned_to_profile_id', $profile->id))->exists()
        ), 403);
    }

    private function activity(Project $project, Profile $profile, string $eventType, string $description): void
    {
        ProjectActivityEvent::create([
            'organization_id' => $project->organization_id,
            'project_id' => $project->id,
            'actor_profile_id' => $profile->id,
            'event_type' => $eventType,
            'description' => $description,
            'occurred_at' => now(),
        ]);
    }
}
