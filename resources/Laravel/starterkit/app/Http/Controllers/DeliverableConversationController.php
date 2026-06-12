<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use App\Models\Profile;
use App\Models\Project;
use App\Services\DeliverableManagementService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeliverableConversationController extends Controller
{
    public function __construct(private readonly DeliverableManagementService $service) {}

    public function store(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);

        abort_unless($deliverable->project_id === $project->id, 404);
        $this->authorizeInternalAccess($currentProfile, $project, $deliverable);

        $request->validate([
            'message' => ['required', 'string', 'max:20000'],
            'parent_message_id' => ['nullable', 'integer'],
        ]);

        $this->service->addConversationMessage($deliverable, $currentProfile, $request->only('message', 'parent_message_id'));

        return redirect()
            ->route('deliverables.show', [$project, $deliverable])
            ->with('success', 'Message added.');
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

    private function authorizeInternalAccess(Profile $profile, Project $project, Deliverable $deliverable): void
    {
        if ($profile->hasPermission('projects.manage')) {
            return;
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

        abort_unless($isInternalMember || $isAssignedInternally || $isAssignedToProject, 403);
    }
}
