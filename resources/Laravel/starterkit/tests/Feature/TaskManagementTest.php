<?php

namespace Tests\Feature;

use App\Enums\TaskStatus;
use App\Enums\TaskType;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Task;
use App\Models\WorkNotification;
use App\Services\TaskManagementService;
use Database\Seeders\Phase3ProjectScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_manager_can_create_task_under_deliverable_with_time_budget(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->post(route('tasks.store', [$project, $deliverable]), [
                'title' => 'Draft invitation copy',
                'status' => 'Not Started',
                'priority' => 'High',
                'due_date' => '2026-08-01',
                'time_budget_minutes' => 90,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('tasks', [
            'deliverable_id' => $deliverable->id,
            'title' => 'Draft invitation copy',
            'time_budget_minutes' => 90,
        ]);
        $this->assertDatabaseHas('project_activity_events', ['project_id' => $project->id, 'event_type' => 'task_created']);
    }

    public function test_task_time_budgets_roll_up_to_deliverable_and_project(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $this->createTask($deliverable, $jordan, ['title' => 'First', 'time_budget_minutes' => 60]);
        $this->createTask($deliverable, $jordan, ['title' => 'Second', 'time_budget_minutes' => 150]);

        $this->assertSame(210, $deliverable->timeBudgetMinutes());
        $this->assertSame(210, $project->timeBudgetMinutes());
    }

    public function test_tasks_are_ordered_by_priority_then_due_date(): void
    {
        [, $deliverable, $jordan] = $this->scenario();
        $normal = $this->createTask($deliverable, $jordan, ['title' => 'Normal task', 'priority' => 'Normal', 'due_date' => '2026-07-01']);
        $high = $this->createTask($deliverable, $jordan, ['title' => 'High task', 'priority' => 'High', 'due_date' => '2026-07-02']);
        $urgent = $this->createTask($deliverable, $jordan, ['title' => 'Urgent task', 'priority' => 'Urgent', 'due_date' => '2026-07-03']);

        $this->assertSame(
            [$urgent->id, $high->id, $normal->id],
            $deliverable->tasks()->pluck('id')->all(),
        );
    }

    public function test_clarification_task_can_be_created_and_is_separated_from_work_tasks(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $workTask = $this->createTask($deliverable, $jordan, [
            'title' => 'Design invitation',
            'assigned_to_profile_id' => $jordan->id,
        ]);

        $this->actingAs($jordan->user)
            ->post(route('tasks.store', [$project, $deliverable]), [
                'title' => 'Confirm service times',
                'task_type' => TaskType::Clarification->value,
                'assigned_to_profile_id' => $jordan->id,
                'status' => 'Not Started',
                'priority' => 'High',
            ])
            ->assertRedirect();

        $clarificationTask = Task::query()->where('title', 'Confirm service times')->firstOrFail();
        $this->assertSame(TaskType::Clarification, $clarificationTask->taskType());
        $this->assertSame(TaskType::Work, $workTask->taskType());

        $this->actingAs($jordan->user)
            ->get(route('tasks.index'))
            ->assertOk()
            ->assertSee('Needs clarification')
            ->assertSee('Work tasks')
            ->assertSee('tabler--message-question', false);
    }

    public function test_blocked_task_requires_blocker_details(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->post(route('tasks.store', [$project, $deliverable]), [
                'title' => 'Blocked task',
                'status' => 'Blocked',
                'priority' => 'Normal',
            ])
            ->assertSessionHasErrors(['blocker_type', 'blocker_reason']);
    }

    public function test_blocked_task_rolls_attention_up_and_creates_alerts(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $marcus = $this->addInternalMember($project, 'Marcus Bell');
        $task = $this->createTask($deliverable, $jordan, ['assigned_to_profile_id' => $marcus->id]);

        $this->actingAs($jordan->user)
            ->patch(route('tasks.update', [$project, $deliverable, $task]), [
                'title' => $task->title,
                'status' => 'Blocked',
                'priority' => 'Normal',
                'blocker_type' => 'Missing Information',
                'blocker_reason' => 'Waiting on service times.',
            ])
            ->assertRedirect();

        $this->assertSame('Blocked', $deliverable->fresh()->attention_state);
        $this->assertSame('Blocked', $project->fresh()->attention_state);
        $this->assertDatabaseHas('work_notifications', [
            'recipient_profile_id' => $marcus->id,
            'notification_type' => 'Blocked',
            'subject_id' => $task->id,
        ]);
        $this->assertDatabaseHas('project_activity_events', ['task_id' => $task->id, 'event_type' => 'task_blocked']);

        $this->actingAs($marcus->user)
            ->get(route('tasks.index'))
            ->assertOk()
            ->assertSee("Blocked: {$task->title}")
            ->assertSee('Waiting on service times.');
    }

    public function test_clearing_final_blocker_clears_derived_parent_attention(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $task = $this->createTask($deliverable, $jordan, [
            'status' => TaskStatus::Blocked->value,
            'blocker_type' => 'Technical',
            'blocker_reason' => 'Export failed.',
        ]);

        $this->actingAs($jordan->user)
            ->patch(route('tasks.update', [$project, $deliverable, $task]), [
                'title' => $task->title,
                'status' => 'In Progress',
                'priority' => 'Normal',
            ]);

        $this->assertSame('On Track', $deliverable->fresh()->attention_state);
        $this->assertSame('On Track', $project->fresh()->attention_state);
        $resolvedAlert = WorkNotification::query()
            ->where('notification_type', 'Blocked')
            ->where('subject_id', $task->id)
            ->firstOrFail();
        $this->assertNotNull($resolvedAlert->read_at);
        $this->assertDatabaseMissing('work_notifications', ['notification_type' => 'Unblocked', 'subject_id' => $task->id]);
        $this->assertDatabaseHas('project_activity_events', ['task_id' => $task->id, 'event_type' => 'task_unblocked']);

        $this->actingAs($jordan->user)
            ->get(route('tasks.index'))
            ->assertOk()
            ->assertDontSee("Blocked: {$task->title}");
    }

    public function test_stale_unresolved_blocked_notification_is_hidden_when_task_is_not_blocked(): void
    {
        [, $deliverable, $jordan] = $this->scenario();
        $task = $this->createTask($deliverable, $jordan, ['assigned_to_profile_id' => $jordan->id]);

        WorkNotification::create([
            'organization_id' => $task->organization_id,
            'recipient_profile_id' => $jordan->id,
            'actor_profile_id' => $jordan->id,
            'notification_type' => 'Blocked',
            'subject_type' => Task::class,
            'subject_id' => $task->id,
            'title' => "Blocked: {$task->title}",
            'body' => 'Legacy unresolved alert.',
        ]);

        $this->actingAs($jordan->user)
            ->get(route('tasks.index'))
            ->assertOk()
            ->assertDontSee("Blocked: {$task->title}");
    }

    public function test_clearing_final_blocker_restores_previous_parent_attention(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $project->update(['attention_state' => 'At Risk']);
        $deliverable->update(['attention_state' => 'Needs Attention']);
        $task = $this->createTask($deliverable, $jordan, [
            'status' => TaskStatus::Blocked->value,
            'blocker_type' => 'Scheduling',
            'blocker_reason' => 'Shoot date is unresolved.',
        ]);

        $this->actingAs($jordan->user)
            ->patch(route('tasks.update', [$project, $deliverable, $task]), [
                'title' => $task->title,
                'status' => 'In Progress',
                'priority' => 'Normal',
            ]);

        $this->assertSame('Needs Attention', $deliverable->fresh()->attention_state);
        $this->assertSame('At Risk', $project->fresh()->attention_state);
    }

    public function test_done_task_records_completion(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $task = $this->createTask($deliverable, $jordan);

        $this->actingAs($jordan->user)
            ->patch(route('tasks.update', [$project, $deliverable, $task]), [
                'title' => $task->title,
                'status' => 'Done',
                'priority' => 'Normal',
            ]);

        $task->refresh();
        $this->assertSame(TaskStatus::Done, $task->status);
        $this->assertSame($jordan->id, $task->completed_by_profile_id);
        $this->assertNotNull($task->completed_at);
    }

    public function test_terminal_tasks_leave_my_tasks_but_deferred_tasks_remain(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $done = $this->createTask($deliverable, $jordan, [
            'title' => 'Completed assignment',
            'assigned_to_profile_id' => $jordan->id,
        ]);
        $canceled = $this->createTask($deliverable, $jordan, [
            'title' => 'Canceled assignment',
            'assigned_to_profile_id' => $jordan->id,
            'status' => TaskStatus::Canceled->value,
        ]);
        $deferred = $this->createTask($deliverable, $jordan, [
            'title' => 'Deferred assignment',
            'assigned_to_profile_id' => $jordan->id,
            'status' => TaskStatus::Deferred->value,
        ]);

        $this->actingAs($jordan->user)
            ->patch(route('tasks.update', [$project, $deliverable, $done]), [
                'title' => $done->title,
                'status' => TaskStatus::Done->value,
                'priority' => 'Normal',
            ])
            ->assertRedirect();

        $this->actingAs($jordan->user)
            ->get(route('tasks.index'))
            ->assertOk()
            ->assertDontSee($done->title)
            ->assertDontSee($canceled->title)
            ->assertSee($deferred->title);
    }

    public function test_ready_for_review_creates_owner_alert_that_resolves_and_returns_on_resubmission(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $marcus = $this->addInternalMember($project, 'Marcus Bell');
        $task = $this->createTask($deliverable, $jordan, [
            'title' => 'Edit invitation video',
            'assigned_to_profile_id' => $marcus->id,
        ]);

        $this->actingAs($marcus->user)
            ->patch(route('tasks.update', [$project, $deliverable, $task]), [
                'title' => $task->title,
                'status' => 'Ready for Review',
                'priority' => 'High',
            ])
            ->assertRedirect();

        $this->assertSame(TaskStatus::ReadyForReview, $task->fresh()->status);
        $this->assertDatabaseCount('tasks', 1);
        $this->assertDatabaseHas('work_notifications', [
            'recipient_profile_id' => $deliverable->owner_profile_id ?: $project->owner_profile_id,
            'notification_type' => 'Needs Approval',
            'subject_type' => Task::class,
            'subject_id' => $task->id,
            'read_at' => null,
        ]);
        $this->assertDatabaseHas('project_activity_events', [
            'task_id' => $task->id,
            'event_type' => 'task_submitted_for_review',
        ]);

        $this->actingAs($jordan->user)
            ->get(route('tasks.index'))
            ->assertOk()
            ->assertSee('Needs approval')
            ->assertSee("Needs approval: {$task->title}")
            ->assertSee('tabler--clipboard-check', false)
            ->assertSee('text-secondary', false);

        $this->actingAs($jordan->user)
            ->patch(route('tasks.update', [$project, $deliverable, $task]), [
                'title' => $task->title,
                'assigned_to_profile_id' => $marcus->id,
                'status' => 'In Progress',
                'priority' => 'High',
            ])
            ->assertRedirect();

        $this->actingAs($jordan->user)
            ->get(route('tasks.index'))
            ->assertOk()
            ->assertDontSee("Needs approval: {$task->title}");

        $firstAlert = WorkNotification::query()
            ->where('notification_type', 'Needs Approval')
            ->where('subject_id', $task->id)
            ->firstOrFail();
        $this->assertNotNull($firstAlert->read_at);

        $this->actingAs($marcus->user)
            ->patch(route('tasks.update', [$project, $deliverable, $task]), [
                'title' => $task->title,
                'assigned_to_profile_id' => $marcus->id,
                'status' => 'Ready for Review',
                'priority' => 'High',
            ])
            ->assertRedirect();

        $this->assertSame(2, WorkNotification::query()
            ->where('notification_type', 'Needs Approval')
            ->where('subject_id', $task->id)
            ->count());

        $this->actingAs($jordan->user)
            ->patch(route('tasks.update', [$project, $deliverable, $task]), [
                'title' => $task->title,
                'assigned_to_profile_id' => $marcus->id,
                'status' => 'Done',
                'priority' => 'High',
            ])
            ->assertRedirect();

        $task->refresh();
        $this->assertSame(TaskStatus::Done, $task->status);
        $this->assertSame($jordan->id, $task->completed_by_profile_id);
        $this->assertSame(0, WorkNotification::query()
            ->where('notification_type', 'Needs Approval')
            ->where('subject_id', $task->id)
            ->whereNull('read_at')
            ->count());
        $this->assertDatabaseHas('project_activity_events', [
            'task_id' => $task->id,
            'event_type' => 'task_completed',
        ]);
    }

    public function test_assignee_can_view_update_and_find_task_in_my_tasks(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $marcus = $this->addInternalMember($project, 'Marcus Bell');
        $task = $this->createTask($deliverable, $jordan, ['assigned_to_profile_id' => $marcus->id]);

        $this->actingAs($marcus->user)
            ->get(route('tasks.index'))
            ->assertOk()
            ->assertSee($task->title)
            ->assertSee(route('projects.show', $project), false)
            ->assertSee(route('deliverables.show', [$project, $deliverable]), false);

        $this->actingAs($marcus->user)
            ->get(route('tasks.show', [$project, $deliverable, $task]))
            ->assertOk()
            ->assertSee('View project')
            ->assertSee('View deliverable');

        $this->actingAs($marcus->user)
            ->patch(route('tasks.update', [$project, $deliverable, $task]), [
                'title' => $task->title,
                'status' => 'In Progress',
                'priority' => 'Normal',
            ])
            ->assertRedirect();
    }

    public function test_task_can_be_assigned_to_active_organization_profile_outside_project_team(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $rachel = $this->profile('Rachel Kim');

        $this->actingAs($jordan->user)
            ->get(route('tasks.create', [$project, $deliverable]))
            ->assertOk()
            ->assertSee($rachel->display_name);

        $this->actingAs($jordan->user)
            ->post(route('tasks.store', [$project, $deliverable]), [
                'title' => 'Capture event photography',
                'assigned_to_profile_id' => $rachel->id,
                'status' => 'Not Started',
                'priority' => 'Normal',
            ])
            ->assertRedirect();

        $task = Task::query()->where('title', 'Capture event photography')->firstOrFail();

        $this->actingAs($rachel->user)
            ->get(route('tasks.show', [$project, $deliverable, $task]))
            ->assertOk()
            ->assertSee($task->title)
            ->assertSee($project->title);

        $this->actingAs($rachel->user)
            ->get(route('deliverables.show', [$project, $deliverable]))
            ->assertOk()
            ->assertSee($deliverable->title);

        $this->actingAs($rachel->user)
            ->get(route('projects.show', $project))
            ->assertOk()
            ->assertSee('Project time budget')
            ->assertSee($task->title);

        $this->actingAs($rachel->user)
            ->patch(route('tasks.update', [$project, $deliverable, $task]), [
                'title' => $task->title,
                'assigned_to_profile_id' => $rachel->id,
                'status' => 'In Progress',
                'priority' => 'Normal',
            ])
            ->assertRedirect();

        $this->assertSame(TaskStatus::InProgress, $task->fresh()->status);
    }

    public function test_stakeholder_cannot_view_private_task(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $rachel = $this->profile('Rachel Kim');
        $task = $this->createTask($deliverable, $jordan);

        $this->actingAs($rachel->user)
            ->get(route('tasks.show', [$project, $deliverable, $task]))
            ->assertForbidden();

        $this->actingAs($rachel->user)
            ->get(route('projects.show', $project))
            ->assertOk()
            ->assertDontSee('Project time budget')
            ->assertDontSee($task->title);
    }

    public function test_authorized_task_user_can_add_and_remove_links(): void
    {
        [$project, $deliverable, $jordan] = $this->scenario();
        $task = $this->createTask($deliverable, $jordan);

        $this->actingAs($jordan->user)
            ->post(route('tasks.links.store', [$project, $deliverable, $task]), [
                'url' => 'https://www.figma.com/file/task',
            ])
            ->assertRedirect();

        $link = $task->links()->firstOrFail();
        $this->assertSame('figma.com', $link->displayLabel());
        $this->actingAs($jordan->user)
            ->get(route('tasks.show', [$project, $deliverable, $task]))
            ->assertOk()
            ->assertSee('Files & links', false)
            ->assertSee('figma.com');

        $this->actingAs($jordan->user)
            ->delete(route('tasks.links.destroy', [$project, $deliverable, $task, $link]))
            ->assertRedirect();

        $this->assertDatabaseMissing('task_links', ['id' => $link->id]);
    }

    private function scenario(): array
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        $organization = Organization::query()->where('slug', 'grace-community-church')->firstOrFail();
        $jordan = $this->profile('Jordan Lee');
        $project = Project::query()->where('organization_id', $organization->id)->latest('id')->firstOrFail();
        $deliverable = $project->deliverables()->firstOrFail();

        return [$project, $deliverable, $jordan];
    }

    private function createTask($deliverable, Profile $actor, array $overrides = []): Task
    {
        return app(TaskManagementService::class)->create($deliverable, array_merge([
            'title' => 'Prepare first draft',
            'status' => TaskStatus::NotStarted->value,
            'priority' => 'Normal',
        ], $overrides), $actor);
    }

    private function addInternalMember(Project $project, string $name): Profile
    {
        $profile = $this->profile($name);
        $project->members()->firstOrCreate(
            ['profile_id' => $profile->id],
            ['organization_id' => $project->organization_id, 'project_role' => 'Contributor'],
        );

        return $profile;
    }

    private function profile(string $name): Profile
    {
        return Profile::query()->where('display_name', $name)->where('status', 'Active')->firstOrFail();
    }
}
