<?php

namespace App\Http\Controllers;

use App\Models\DeliverableType;
use App\Models\Profile;
use App\Models\ProjectType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectTypeController extends Controller
{
    public function index(Request $request): View
    {
        $currentProfile = $this->currentProfile($request);

        return view('project-types.index', [
            'currentProfile' => $currentProfile,
            'projectTypes' => ProjectType::query()
                ->where('organization_id', $currentProfile->organization_id)
                ->withCount('deliverableTemplates')
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
        ]);

        $projectType = ProjectType::query()->create([
            ...$validated,
            'organization_id' => $currentProfile->organization_id,
            'slug' => $this->uniqueSlug($currentProfile->organization_id, $validated['name']),
            'is_active' => true,
        ]);

        return to_route('project-types.edit', $projectType)->with('status', 'Project type created. Add its default Deliverables.');
    }

    public function edit(Request $request, ProjectType $projectType): View
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeProjectType($projectType, $currentProfile);

        return view('project-types.edit', [
            'currentProfile' => $currentProfile,
            'projectType' => $projectType->load('deliverableTemplates.deliverableType'),
            'deliverableTypes' => DeliverableType::query()
                ->where('organization_id', $currentProfile->organization_id)
                ->where('is_active', true)
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function update(Request $request, ProjectType $projectType): RedirectResponse
    {
        $currentProfile = $this->currentProfile($request);
        $this->authorizeProjectType($projectType, $currentProfile);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'is_active' => ['nullable', 'boolean'],
            'deliverables' => ['nullable', 'array'],
            'deliverables.*.title' => ['nullable', 'string', 'max:255'],
            'deliverables.*.deliverable_type_id' => [
                'nullable',
                'integer',
                Rule::exists('deliverable_types', 'id')->where('organization_id', $currentProfile->organization_id),
            ],
            'deliverables.*.description' => ['nullable', 'string', 'max:1000'],
            'deliverables.*.suggested_due_offset_days' => ['nullable', 'integer', 'min:0', 'max:365'],
            'deliverables.*.is_required' => ['nullable', 'boolean'],
        ]);

        DB::transaction(function () use ($projectType, $validated, $currentProfile) {
            $projectType->update([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'is_active' => (bool) ($validated['is_active'] ?? false),
            ]);

            $projectType->deliverableTemplates()->delete();

            collect($validated['deliverables'] ?? [])
                ->filter(fn (array $deliverable) => filled($deliverable['title'] ?? null))
                ->values()
                ->each(fn (array $deliverable, int $index) => $projectType->deliverableTemplates()->create([
                    'organization_id' => $currentProfile->organization_id,
                    'deliverable_type_id' => $deliverable['deliverable_type_id'] ?? null,
                    'title' => $deliverable['title'],
                    'description' => $deliverable['description'] ?? null,
                    'suggested_due_offset_days' => $deliverable['suggested_due_offset_days'] ?? null,
                    'sort_order' => $index,
                    'is_required' => (bool) ($deliverable['is_required'] ?? false),
                ]));
        });

        return to_route('project-types.edit', $projectType)->with('status', 'Project type template updated.');
    }

    private function currentProfile(Request $request): Profile
    {
        $profile = $request->user()
            ->profiles()
            ->with('organization')
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($profile?->hasPermission('projects.manage'), 403);

        return $profile;
    }

    private function authorizeProjectType(ProjectType $projectType, Profile $profile): void
    {
        abort_unless($projectType->organization_id === $profile->organization_id, 403);
    }

    private function uniqueSlug(int $organizationId, string $name): string
    {
        $base = Str::slug($name) ?: 'project-type';
        $slug = $base;
        $suffix = 2;

        while (ProjectType::query()->where('organization_id', $organizationId)->where('slug', $slug)->exists()) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
