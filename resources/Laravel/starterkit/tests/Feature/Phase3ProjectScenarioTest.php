<?php

namespace Tests\Feature;

use App\Enums\RequestStatus;
use App\Models\Deliverable;
use App\Models\MinistryRequest;
use App\Models\Profile;
use App\Models\Project;
use Database\Seeders\Phase3ProjectScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Phase3ProjectScenarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_scenario_seeder_is_idempotent_and_leaves_a_request_ready_to_convert(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        $this->seed(Phase3ProjectScenarioSeeder::class);

        $this->assertSame(2, Project::query()->count());
        $this->assertSame(6, Deliverable::query()->count());

        $request = MinistryRequest::query()
            ->where('title', 'Fall Groups Launch - Ready to Convert')
            ->firstOrFail();

        $this->assertSame(RequestStatus::Accepted, $request->status);
        $this->assertNull($request->converted_project_id);
        $this->assertSame(3, $request->ideas()->count());
    }

    public function test_demo_admin_can_see_projects_and_the_conversion_control(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);

        $admin = Profile::query()
            ->with('user')
            ->where('display_name', 'Demo Admin')
            ->firstOrFail();
        $request = MinistryRequest::query()
            ->where('title', 'Fall Groups Launch - Ready to Convert')
            ->firstOrFail();

        $this->actingAs($admin->user)
            ->get(route('projects.index'))
            ->assertOk()
            ->assertSee('Back to School Weekend Communications')
            ->assertSee('Christmas Eve Invitation Project');

        $this->actingAs($admin->user)
            ->get(route('triage.show', $request))
            ->assertOk()
            ->assertSee('Convert to project');
    }

    public function test_manager_can_update_project_lifecycle_status_and_records_activity(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        $admin = Profile::query()->with('user')->where('display_name', 'Demo Admin')->firstOrFail();
        $project = Project::query()->where('title', 'Christmas Eve Invitation Project')->firstOrFail();

        $this->actingAs($admin->user)
            ->get(route('projects.show', $project))
            ->assertOk()
            ->assertSee('Project status')
            ->assertSee('Active');

        $this->actingAs($admin->user)
            ->patch(route('projects.status.update', $project), ['lifecycle_status' => 'Active'])
            ->assertRedirect();

        $this->assertSame('Active', $project->fresh()->lifecycle_status);
        $this->assertDatabaseHas('project_activity_events', [
            'project_id' => $project->id,
            'event_type' => 'project_status_updated',
        ]);
    }

    public function test_non_manager_cannot_update_project_lifecycle_status(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        $rachel = Profile::query()->with('user')->where('display_name', 'Rachel Kim')->firstOrFail();
        $project = Project::query()->where('title', 'Christmas Eve Invitation Project')->firstOrFail();

        $this->actingAs($rachel->user)
            ->patch(route('projects.status.update', $project), ['lifecycle_status' => 'Active'])
            ->assertForbidden();

        $this->assertSame('Planning', $project->fresh()->lifecycle_status);
    }
}
