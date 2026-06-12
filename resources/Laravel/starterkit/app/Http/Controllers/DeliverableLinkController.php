<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use App\Models\DeliverableLink;
use App\Models\Profile;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeliverableLinkController extends Controller
{
    public function store(Request $request, Project $project, Deliverable $deliverable): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request, $project);
        abort_unless($deliverable->project_id === $project->id, 404);

        $request->validate([
            'label' => ['nullable', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
        ]);

        $deliverable->links()->create([
            'organization_id' => $project->organization_id,
            'label' => $request->input('label') ?: null,
            'url' => $request->input('url'),
            'added_by_profile_id' => $currentProfile->id,
        ]);

        return redirect()
            ->route('deliverables.show', [$project, $deliverable])
            ->with('success', 'Link added.');
    }

    public function destroy(Request $request, Project $project, Deliverable $deliverable, DeliverableLink $deliverableLink): RedirectResponse
    {
        $this->currentProfile($request, $project);
        abort_unless($deliverable->project_id === $project->id, 404);
        abort_unless($deliverableLink->deliverable_id === $deliverable->id, 404);

        $deliverableLink->delete();

        return redirect()
            ->route('deliverables.show', [$project, $deliverable])
            ->with('success', 'Link removed.');
    }

    private function currentProfile(Request $request, Project $project): Profile
    {
        $profile = $request->user()
            ->profiles()
            ->where('status', 'Active')
            ->where('organization_id', $project->organization_id)
            ->orderBy('id')
            ->first();

        abort_unless($profile?->hasPermission('projects.manage'), 403);

        return $profile;
    }
}
