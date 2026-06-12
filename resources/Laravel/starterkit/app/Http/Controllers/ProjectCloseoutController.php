<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Services\ProjectCloseoutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectCloseoutController extends Controller
{
    public function __construct(private readonly ProjectCloseoutService $service) {}

    public function show(Request $request, Project $project): View
    {
        $profile = $this->manager($request, $project);
        $project->load(['deliverables.links']);

        return view('projects.closeout', compact('project', 'profile'));
    }

    public function start(Request $request, Project $project): RedirectResponse
    {
        $profile = $this->manager($request, $project);
        $this->service->start($project, $profile);

        return back()->with('success', 'Project closeout started.');
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $profile = $this->manager($request, $project);
        $validated = $request->validate([
            'final_links_verified' => ['nullable', 'boolean'],
            'approvals_preserved' => ['nullable', 'boolean'],
            'reusable_context_captured' => ['nullable', 'boolean'],
            'notes' => ['nullable', 'string', 'max:20000'],
        ]);
        $this->service->update($project, $profile, $validated);

        return back()->with('success', 'Closeout checklist saved.');
    }

    public function archive(Request $request, Project $project): RedirectResponse
    {
        $profile = $this->manager($request, $project);
        $this->service->archive($project, $profile);

        return redirect()->route('projects.show', $project)->with('success', 'Project archived.');
    }

    private function manager(Request $request, Project $project): Profile
    {
        $profile = $request->user()->profiles()->where('status', 'Active')->orderBy('id')->first();
        abort_unless($profile && $profile->organization_id === $project->organization_id && (
            $profile->hasPermission('projects.manage') || $project->owner_profile_id === $profile->id
        ), 403);

        return $profile;
    }
}
