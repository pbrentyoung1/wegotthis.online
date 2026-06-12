<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskLinkController extends Controller
{
    public function store(Request $request, Project $project, Deliverable $deliverable, Task $task): RedirectResponse
    {
        $profile = $this->authorizeAccess($request, $project, $deliverable, $task);
        $validated = $request->validate(['url' => ['required', 'url', 'max:2048'], 'label' => ['nullable', 'string', 'max:255']]);
        $task->links()->create([...$validated, 'organization_id' => $project->organization_id, 'added_by_profile_id' => $profile->id]);

        return back()->with('success', 'Task link added.');
    }

    public function destroy(Request $request, Project $project, Deliverable $deliverable, Task $task, TaskLink $taskLink): RedirectResponse
    {
        $this->authorizeAccess($request, $project, $deliverable, $task);
        abort_unless($taskLink->task_id === $task->id, 404);
        $taskLink->delete();

        return back()->with('success', 'Task link removed.');
    }

    private function authorizeAccess(Request $request, Project $project, Deliverable $deliverable, Task $task): Profile
    {
        abort_unless($deliverable->project_id === $project->id && $task->deliverable_id === $deliverable->id, 404);
        $profile = $request->user()->profiles()->where('organization_id', $project->organization_id)->where('status', 'Active')->first();
        abort_unless($profile && ($profile->hasPermission('projects.manage') || $deliverable->owner_profile_id === $profile->id || $task->assigned_to_profile_id === $profile->id), 403);

        return $profile;
    }
}
