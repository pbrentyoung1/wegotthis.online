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
}
