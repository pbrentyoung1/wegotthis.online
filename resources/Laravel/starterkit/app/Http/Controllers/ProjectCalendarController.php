<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectActivityEvent;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectCalendarController extends Controller
{
    public function show(Request $request, Project $project): View
    {
        $profile = $this->currentProfile($request);
        $this->authorizeProject($project, $profile);
        abort_unless($this->canViewInternalProject($project, $profile), 403);
        $project->load(['deliverables.tasks.assigneeProfile', 'deliverables.deliverableType']);

        return view('projects.calendar', [
            'project' => $project,
            'currentProfile' => $profile,
            'canManageDates' => $profile->hasPermission('projects.manage') || $project->owner_profile_id === $profile->id,
        ]);
    }

    public function events(Request $request, Project $project): JsonResponse
    {
        $profile = $this->currentProfile($request);
        $this->authorizeProject($project, $profile);
        abort_unless($this->canViewInternalProject($project, $profile), 403);

        $validated = $request->validate([
            'start' => ['required', 'date'],
            'end' => ['required', 'date', 'after:start'],
        ]);
        $events = collect();

        if ($project->start_date && $project->start_date->betweenIncluded($validated['start'], $validated['end'])) {
            $events->push($this->event(
                "project:{$project->id}:start",
                "{$project->title} starts",
                $project->start_date,
                route('projects.show', $project),
                'bg-primary/15 !text-primary border-primary',
            ));
        }
        if ($project->stop_date && $project->stop_date->betweenIncluded($validated['start'], $validated['end'])) {
            $events->push($this->event(
                "project:{$project->id}:stop",
                "{$project->title} ends",
                $project->stop_date,
                route('projects.show', $project),
                'bg-default-200 !text-default-700 border-default-400',
            ));
        }

        $project->deliverables()
            ->where(fn (Builder $query) => $query
                ->whereBetween('due_date', [$validated['start'], $validated['end']])
                ->orWhereBetween('publish_date', [$validated['start'], $validated['end']]))
            ->get()
            ->each(function ($deliverable) use ($events, $project): void {
                if ($deliverable->due_date) {
                    $events->push($this->event(
                        "deliverable:{$deliverable->id}:due",
                        "{$deliverable->title} due",
                        $deliverable->due_date,
                        route('deliverables.show', [$project, $deliverable]),
                        'bg-info/15 !text-info border-info',
                    ));
                }
                if ($deliverable->publish_date) {
                    $events->push($this->event(
                        "deliverable:{$deliverable->id}:publish",
                        "{$deliverable->title} publishes",
                        $deliverable->publish_date,
                        route('deliverables.show', [$project, $deliverable]),
                        'bg-success/15 !text-success border-success',
                    ));
                }
            });

        Task::query()
            ->whereHas('deliverable', fn (Builder $query) => $query->where('project_id', $project->id))
            ->whereBetween('due_date', [$validated['start'], $validated['end']])
            ->with('deliverable')
            ->get()
            ->each(function (Task $task) use ($events, $project): void {
                $events->push($this->event(
                    "task:{$task->id}:due",
                    $task->title,
                    $task->due_date,
                    route('tasks.show', [$project, $task->deliverable, $task]),
                    'bg-warning/15 !text-warning border-warning',
                ));
            });

        return response()->json($events->values());
    }

    private function event(string $id, string $title, mixed $start, string $url, string $classes): array
    {
        return [
            'id' => $id,
            'title' => $title,
            'start' => $start->format('Y-m-d'),
            'allDay' => true,
            'url' => $url,
            'className' => "{$classes} border-s-3",
        ];
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
        $this->activity($project, $profile, 'project_calendar_dates_updated', 'Updated dates from the Project Calendar.');

        return back()->with('success', 'Calendar dates updated.');
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

    private function canViewInternalProject(Project $project, Profile $profile): bool
    {
        return $profile->hasPermission('projects.manage')
            || $project->owner_profile_id === $profile->id
            || $project->members()
                ->where('profile_id', $profile->id)
                ->whereNotIn('project_role', ['Stakeholder', 'Reviewer'])
                ->exists()
            || $project->deliverables()
                ->whereHas('tasks', fn (Builder $query) => $query->where('assigned_to_profile_id', $profile->id))
                ->exists();
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
