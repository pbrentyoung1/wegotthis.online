<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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
                    ->orWhereHas('members', fn (Builder $members) => $members->where('profile_id', $currentProfile->id))))
            ->with(['department', 'ownerProfile', 'members.profile'])
            ->withCount('deliverables')
            ->latest('updated_at')
            ->paginate(15);

        return view('projects.index', compact('currentProfile', 'projects'));
    }

    public function show(Request $request, Project $project): View
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeVisibleProject($project, $currentProfile);

        return view('projects.show', [
            'currentProfile' => $currentProfile,
            'project' => $project->load([
                'department',
                'ownerProfile',
                'members.profile',
                'deliverables.deliverableType',
                'sourceRequest.requesterProfile',
                'sourceRequest.assignedManagerProfile',
                'sourceRequest.conversation.participants.profile',
                'sourceRequest.conversation.messages.authorProfile',
            ]),
        ]);
    }

    private function currentProfile(Request $request): Profile
    {
        $profile = $request->user()
            ->profiles()
            ->with('organization')
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($profile?->hasPermission('projects.view'), 403);

        return $profile;
    }

    private function authorizeVisibleProject(Project $project, Profile $profile): void
    {
        $isMember = $project->members()->where('profile_id', $profile->id)->exists();

        abort_unless(
            $project->organization_id === $profile->organization_id
                && ($profile->hasPermission('projects.manage') || $project->owner_profile_id === $profile->id || $isMember),
            403,
        );
    }
}
