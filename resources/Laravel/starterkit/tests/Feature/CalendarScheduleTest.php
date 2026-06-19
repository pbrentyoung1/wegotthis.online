<?php

namespace Tests\Feature;

use App\Enums\DeliverableStatus;
use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\Project;
use App\Services\TaskManagementService;
use Database\Seeders\Phase3ProjectScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarScheduleTest extends TestCase
{
    use RefreshDatabase;

    public function test_my_schedule_returns_assigned_tasks_and_visible_project_dates(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $project->update(['start_date' => '2026-07-01', 'stop_date' => '2026-07-20']);
        $task = app(TaskManagementService::class)->create($deliverable, [
            'title' => 'Prepare calendar artwork',
            'assigned_to_profile_id' => $jordan->id,
            'status' => TaskStatus::NotStarted->value,
            'priority' => 'Normal',
            'due_date' => '2026-07-10',
        ], $jordan);

        $this->actingAs($jordan->user)
            ->get(route('calendar.index'))
            ->assertOk()
            ->assertSee('My Schedule');

        $this->actingAs($jordan->user)
            ->getJson(route('calendar.events', [
                'start' => '2026-07-01',
                'end' => '2026-08-01',
                'view' => 'my',
            ]))
            ->assertOk()
            ->assertJsonFragment(['id' => "task:{$task->id}:due"])
            ->assertJsonFragment(['id' => "project:{$project->id}:start"]);
    }

    public function test_project_list_board_and_calendar_are_connected_views(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $project->update(['start_date' => '2026-08-01', 'stop_date' => '2026-08-31']);
        $deliverable->update([
            'owner_profile_id' => $jordan->id,
            'due_date' => '2026-08-12',
            'publish_date' => '2026-08-20',
        ]);
        $task = app(TaskManagementService::class)->create($deliverable, [
            'title' => 'Prepare project calendar artwork',
            'status' => TaskStatus::NotStarted->value,
            'priority' => 'Normal',
            'due_date' => '2026-08-10',
        ], $jordan);

        $this->actingAs($jordan->user)
            ->get(route('projects.show', $project))
            ->assertOk()
            ->assertSee('List')
            ->assertSee('Board')
            ->assertSee('Calendar');

        $this->actingAs($jordan->user)
            ->get(route('projects.board', $project))
            ->assertOk()
            ->assertSee('Swipe columns and use each card’s move action')
            ->assertSee('Move to Planning');

        $this->actingAs($jordan->user)
            ->get(route('projects.calendar', $project))
            ->assertOk()
            ->assertSee('Project calendar')
            ->assertDontSee('Production sequence');

        $this->actingAs($jordan->user)
            ->getJson(route('projects.calendar.events', [
                'project' => $project,
                'start' => '2026-08-01',
                'end' => '2026-09-01',
            ]))
            ->assertOk()
            ->assertJsonFragment(['id' => "project:{$project->id}:start"])
            ->assertJsonFragment(['id' => "deliverable:{$deliverable->id}:due"])
            ->assertJsonFragment(['id' => "task:{$task->id}:due"]);

        $this->actingAs($jordan->user)
            ->patch(route('projects.calendar.dates', $project), [
                'source_type' => 'task',
                'source_id' => $task->id,
                'due_date' => '2026-08-15',
            ])
            ->assertRedirect();

        $this->assertSame('2026-08-15', $task->fresh()->due_date->format('Y-m-d'));
    }

    public function test_board_uses_canonical_deliverable_lifecycle_actions(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $deliverable->update([
            'owner_profile_id' => $jordan->id,
            'due_date' => '2026-08-12',
        ]);

        $this->actingAs($jordan->user)
            ->patchJson(route('projects.board.move', [$project, $deliverable]), [
                'lifecycle_status' => DeliverableStatus::Approved->value,
            ])
            ->assertUnprocessable();

        $this->assertSame(DeliverableStatus::Proposed, $deliverable->fresh()->lifecycle_status);

        $this->actingAs($jordan->user)
            ->patchJson(route('projects.board.move', [$project, $deliverable]), [
                'lifecycle_status' => DeliverableStatus::Planning->value,
            ])
            ->assertOk()
            ->assertJsonFragment(['lifecycle_status' => DeliverableStatus::Planning->value]);

        $this->assertSame(DeliverableStatus::Planning, $deliverable->fresh()->lifecycle_status);
        $this->assertDatabaseHas('project_activity_events', [
            'deliverable_id' => $deliverable->id,
            'event_type' => 'deliverable_moved_to_planning',
        ]);
    }

    public function test_project_closeout_requires_archived_deliverables_and_complete_checklist(): void
    {
        [$project, , $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->post(route('projects.closeout.start', $project))
            ->assertSessionHasErrors('closeout');

        $project->deliverables()->update(['lifecycle_status' => DeliverableStatus::Archived->value]);

        $this->actingAs($jordan->user)
            ->post(route('projects.closeout.start', $project))
            ->assertRedirect();
        $this->assertSame(ProjectStatus::Closeout->value, $project->fresh()->lifecycle_status);

        $this->actingAs($jordan->user)
            ->patch(route('projects.closeout.update', $project), [
                'final_links_verified' => '1',
                'approvals_preserved' => '1',
                'reusable_context_captured' => '1',
                'notes' => '{"ops":[{"insert":"Ready to reuse.\\n"}]}',
            ])
            ->assertRedirect();

        $this->actingAs($jordan->user)
            ->post(route('projects.closeout.archive', $project))
            ->assertRedirect(route('projects.show', $project));

        $this->assertSame(ProjectStatus::Archived->value, $project->fresh()->lifecycle_status);
        $this->assertNotNull($project->fresh()->archived_at);
    }

    private function scenario(): array
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        $organization = Organization::query()->where('slug', 'grace-community-church')->firstOrFail();
        $jordan = Profile::query()->where('display_name', 'Jordan Lee')->firstOrFail();
        $project = Project::query()->where('organization_id', $organization->id)->latest('id')->firstOrFail();

        return [$project, $project->deliverables()->firstOrFail(), $jordan];
    }
}
