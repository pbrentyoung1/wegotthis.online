<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use App\Models\DeliverableReview;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class CalendarController extends Controller
{
    public function index(Request $request): View
    {
        return view('calendar.index', [
            'currentView' => $request->string('view')->value() ?: 'my',
        ]);
    }

    public function events(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'start' => ['required', 'date'],
            'end' => ['required', 'date', 'after:start'],
            'view' => ['nullable', 'in:my,projects,production,publishing,reviews'],
        ]);
        $profile = $this->currentProfile($request);
        $view = $validated['view'] ?? 'my';
        $projectIds = $this->visibleProjectIds($profile);
        $events = collect();

        if (in_array($view, ['my', 'projects'], true)) {
            $datedProjectIds = $view === 'my' ? $this->personalProjectIds($profile) : $projectIds;
            Project::query()->whereIn('id', $datedProjectIds)
                ->where(fn (Builder $query) => $query
                    ->whereBetween('start_date', [$validated['start'], $validated['end']])
                    ->orWhereBetween('stop_date', [$validated['start'], $validated['end']]))
                ->get()->each(function (Project $project) use ($events): void {
                    if ($project->start_date) {
                        $events->push($this->event("project:{$project->id}:start", "{$project->title} starts", $project->start_date, route('projects.show', $project), 'projects', 'bg-primary/15 !text-primary border-primary'));
                    }
                    if ($project->stop_date) {
                        $events->push($this->event("project:{$project->id}:stop", "{$project->title} ends", $project->stop_date, route('projects.show', $project), 'projects', 'bg-default-200 !text-default-700 border-default-400'));
                    }
                });
        }

        if (in_array($view, ['projects', 'production', 'publishing'], true)) {
            Deliverable::query()->whereIn('project_id', $projectIds)
                ->where(fn (Builder $query) => $query
                    ->whereBetween('due_date', [$validated['start'], $validated['end']])
                    ->orWhereBetween('publish_date', [$validated['start'], $validated['end']]))
                ->with('project')->get()->each(function (Deliverable $deliverable) use ($events, $view): void {
                    if ($deliverable->due_date && $view !== 'publishing') {
                        $events->push($this->event("deliverable:{$deliverable->id}:due", "{$deliverable->title} due", $deliverable->due_date, route('deliverables.show', [$deliverable->project, $deliverable]), 'production', 'bg-info/15 !text-info border-info'));
                    }
                    if ($deliverable->publish_date && $view !== 'production') {
                        $events->push($this->event("deliverable:{$deliverable->id}:publish", "{$deliverable->title} publishes", $deliverable->publish_date, route('deliverables.show', [$deliverable->project, $deliverable]), 'publishing', 'bg-success/15 !text-success border-success'));
                    }
                });
        }

        if (in_array($view, ['my', 'production'], true)) {
            Task::query()->whereHas('deliverable', fn (Builder $query) => $query->whereIn('project_id', $projectIds))
                ->when($view === 'my', fn (Builder $query) => $query->where('assigned_to_profile_id', $profile->id))
                ->whereBetween('due_date', [$validated['start'], $validated['end']])
                ->with('deliverable.project')->get()->each(function (Task $task) use ($events): void {
                    $events->push($this->event("task:{$task->id}:due", $task->title, $task->due_date, route('tasks.show', [$task->deliverable->project, $task->deliverable, $task]), 'tasks', 'bg-warning/15 !text-warning border-warning'));
                });
        }

        if (in_array($view, ['my', 'reviews'], true)) {
            DeliverableReview::query()->where('reviewer_profile_id', $profile->id)
                ->whereHas('deliverable', fn (Builder $query) => $query->whereIn('project_id', $projectIds)->whereBetween('due_date', [$validated['start'], $validated['end']]))
                ->with('deliverable.project')->get()->each(function (DeliverableReview $review) use ($events): void {
                    $deliverable = $review->deliverable;
                    $events->push($this->event("review:{$review->id}", "Review: {$deliverable->title}", $deliverable->due_date, route('deliverables.show', [$deliverable->project, $deliverable]), 'reviews', 'bg-danger/15 !text-danger border-danger'));
                });
        }

        return response()->json($events->values());
    }

    private function visibleProjectIds(Profile $profile): Collection
    {
        return Project::query()
            ->where('organization_id', $profile->organization_id)
            ->when(! $profile->hasPermission('projects.manage'), fn (Builder $query) => $query
                ->where(fn (Builder $visible) => $visible
                    ->where('owner_profile_id', $profile->id)
                    ->orWhereHas('members', fn (Builder $members) => $members->where('profile_id', $profile->id))
                    ->orWhereHas('deliverables.tasks', fn (Builder $tasks) => $tasks->where('assigned_to_profile_id', $profile->id))))
            ->pluck('id');
    }

    private function personalProjectIds(Profile $profile): Collection
    {
        return Project::query()
            ->where('organization_id', $profile->organization_id)
            ->where(fn (Builder $query) => $query
                ->where('owner_profile_id', $profile->id)
                ->orWhereHas('members', fn (Builder $members) => $members->where('profile_id', $profile->id))
                ->orWhereHas('deliverables.tasks', fn (Builder $tasks) => $tasks->where('assigned_to_profile_id', $profile->id)))
            ->pluck('id');
    }

    private function event(string $id, string $title, mixed $start, string $url, string $type, string $classes): array
    {
        return [
            'id' => $id,
            'title' => $title,
            'start' => $start->format('Y-m-d'),
            'allDay' => true,
            'url' => $url,
            'className' => "{$classes} border-s-3",
            'extendedProps' => ['calendar_type' => $type],
        ];
    }

    private function currentProfile(Request $request): Profile
    {
        $profile = $request->user()->profiles()->where('status', 'Active')->orderBy('id')->first();
        abort_unless($profile, 403);

        return $profile;
    }
}
