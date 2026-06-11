<?php

namespace Tests\Feature;

use App\Models\Deliverable;
use App\Models\MinistryRequest;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectType;
use Database\Seeders\Phase3ProjectScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTypeTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_manager_can_edit_project_type_defaults(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);

        $admin = $this->profile('Demo Admin');
        $projectType = ProjectType::query()->where('name', 'Sermon Series')->firstOrFail();
        $typeId = $projectType->deliverableTemplates()->firstOrFail()->deliverable_type_id;

        $this->actingAs($admin->user)
            ->get(route('project-types.index'))
            ->assertOk()
            ->assertSee('Sermon Series')
            ->assertSee('Event Promotion');

        $this->actingAs($admin->user)
            ->get(route('project-types.edit', $projectType))
            ->assertOk()
            ->assertSee('Default Deliverables')
            ->assertSee('Series branding');

        $this->actingAs($admin->user)->put(route('project-types.update', $projectType), [
            'name' => 'Sermon Series',
            'description' => 'Updated defaults.',
            'is_active' => 1,
            'deliverables' => [
                ['title' => 'Series branding', 'deliverable_type_id' => $typeId, 'suggested_due_offset_days' => 30, 'is_required' => 1],
                ['title' => 'Weekly discussion guide', 'deliverable_type_id' => $typeId],
            ],
        ])->assertRedirect(route('project-types.edit', $projectType));

        $this->assertSame(2, $projectType->deliverableTemplates()->count());
        $this->assertDatabaseHas('project_type_deliverable_templates', [
            'project_type_id' => $projectType->id,
            'title' => 'Weekly discussion guide',
        ]);
    }

    public function test_template_defaults_create_independent_deliverables_during_conversion(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);

        $admin = $this->profile('Demo Admin');
        $request = MinistryRequest::query()->where('title', 'Fall Groups Launch - Ready to Convert')->firstOrFail();
        $projectType = ProjectType::query()->where('name', 'Event Promotion')->firstOrFail();
        $templateIds = $projectType->deliverableTemplates()->orderBy('sort_order')->take(2)->pluck('id');
        $ideaId = $request->ideas()->orderBy('id')->value('id');

        $this->actingAs($admin->user)
            ->get(route('triage.show', $request))
            ->assertOk()
            ->assertSee('Event Promotion')
            ->assertSee('Template defaults')
            ->assertSee('Event landing page');

        $this->actingAs($admin->user)->post(route('triage.convert', $request), [
            'title' => 'Fall Groups Launch Project',
            'project_type_id' => $projectType->id,
            'template_deliverable_ids' => $templateIds->all(),
            'idea_ids' => [$ideaId],
        ])->assertRedirect();

        $project = Project::query()->where('source_request_id', $request->id)->firstOrFail();
        $this->assertSame($projectType->id, $project->project_type_id);
        $this->assertSame('Event Promotion', $project->project_type);
        $this->assertSame(3, $project->deliverables()->count());
        $this->assertSame(2, Deliverable::query()->whereNotNull('metadata_json')->where('project_id', $project->id)->count());

        $projectType->deliverableTemplates()->delete();
        $this->assertSame(3, $project->deliverables()->count());
    }

    public function test_requester_cannot_manage_project_types(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $this->actingAs($rachel->user)->get(route('project-types.index'))->assertForbidden();
    }

    private function profile(string $displayName): Profile
    {
        return Profile::query()->with('user')->where('display_name', $displayName)->firstOrFail();
    }
}
