<?php

namespace Tests\Feature;

use App\Enums\DeliverableStatus;
use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use App\Models\Deliverable;
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

    public function test_manager_can_reorder_project_deliverables_and_tasks(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $second = Deliverable::create([
            'organization_id' => $project->organization_id,
            'project_id' => $project->id,
            'title' => 'Second deliverable',
            'lifecycle_status' => 'Proposed',
            'attention_state' => 'On Track',
            'sort_order' => 1,
        ]);
        $firstTask = app(TaskManagementService::class)->create($deliverable, [
            'title' => 'First task',
            'status' => TaskStatus::NotStarted->value,
            'priority' => 'Normal',
        ], $jordan);
        $secondTask = app(TaskManagementService::class)->create($deliverable, [
            'title' => 'Second task',
            'status' => TaskStatus::NotStarted->value,
            'priority' => 'Normal',
        ], $jordan);

        $this->actingAs($jordan->user)
            ->get(route('projects.schedule', $project))
            ->assertOk()
            ->assertSee('Production sequence');

        $deliverableIds = $project->deliverables()->pluck('id')->reject(fn (int $id) => $id === $second->id)->prepend($second->id)->values()->all();
        $taskOrders = $project->deliverables()->get()->mapWithKeys(fn (Deliverable $item) => [
            $item->id => $item->id === $deliverable->id
                ? [$secondTask->id, $firstTask->id]
                : $item->tasks()->pluck('id')->all(),
        ])->all();

        $this->actingAs($jordan->user)
            ->patchJson(route('projects.schedule.reorder', $project), [
                'deliverable_ids' => $deliverableIds,
                'task_orders' => $taskOrders,
            ])
            ->assertOk();

        $this->assertSame($deliverableIds, $project->deliverables()->pluck('id')->all());
        $this->assertSame([$secondTask->id, $firstTask->id], $deliverable->tasks()->pluck('id')->all());

        $this->actingAs($jordan->user)
            ->patch(route('projects.schedule.dates', $project), [
                'source_type' => 'task',
                'source_id' => $firstTask->id,
                'due_date' => '2026-08-15',
            ])
            ->assertRedirect();

        $this->assertSame('2026-08-15', $firstTask->fresh()->due_date->format('Y-m-d'));
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
