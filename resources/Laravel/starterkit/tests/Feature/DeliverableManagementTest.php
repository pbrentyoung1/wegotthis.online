<?php

namespace Tests\Feature;

use App\Enums\DeliverableStatus;
use App\Models\Deliverable;
use App\Models\DeliverableType;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use App\Models\WorkNotification;
use Database\Seeders\Phase3ProjectScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeliverableManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_manager_can_view_deliverable(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->get(route('deliverables.show', [$project, $deliverable]))
            ->assertOk()
            ->assertSee($deliverable->title);
    }

    public function test_deliverables_list_on_project_is_clickable(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->get(route('projects.show', $project))
            ->assertOk()
            ->assertSee(route('deliverables.show', [$project, $deliverable]));
    }

    public function test_project_manager_sees_add_deliverable_button(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, , $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->get(route('projects.show', $project))
            ->assertOk()
            ->assertSee(route('deliverables.create', $project));
    }

    public function test_project_manager_can_create_deliverable(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, , $jordan] = $this->scenario();

        $response = $this->actingAs($jordan->user)
            ->post(route('deliverables.store', $project), [
                'title' => 'New Welcome Video',
                'description' => 'Short intro video for the series.',
                'due_date' => '2026-09-01',
                'owner_profile_id' => $jordan->id,
            ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('deliverables', [
            'project_id' => $project->id,
            'title' => 'New Welcome Video',
            'owner_profile_id' => $jordan->id,
        ]);
    }

    public function test_creating_deliverable_records_activity_event(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, , $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->post(route('deliverables.store', $project), [
                'title' => 'New Deliverable',
                'owner_profile_id' => $jordan->id,
            ]);

        $this->assertDatabaseHas('project_activity_events', [
            'project_id' => $project->id,
            'actor_profile_id' => $jordan->id,
            'event_type' => 'deliverable_created',
        ]);
    }

    public function test_project_manager_can_edit_deliverable(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->patch(route('deliverables.update', [$project, $deliverable]), [
                'title' => 'Updated Title',
                'description' => 'Updated description.',
            ]);

        $this->assertDatabaseHas('deliverables', [
            'id' => $deliverable->id,
            'title' => 'Updated Title',
        ]);
    }

    public function test_editing_deliverable_records_update_event(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->patch(route('deliverables.update', [$project, $deliverable]), [
                'title' => $deliverable->title,
                'description' => 'Some new notes.',
            ]);

        $this->assertDatabaseHas('project_activity_events', [
            'project_id' => $project->id,
            'deliverable_id' => $deliverable->id,
            'actor_profile_id' => $jordan->id,
            'event_type' => 'deliverable_updated',
        ]);
    }

    public function test_move_to_planning_allows_missing_owner(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $deliverable->update(['owner_profile_id' => null, 'due_date' => '2026-09-01']);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.plan', [$project, $deliverable]))
            ->assertRedirect(route('deliverables.show', [$project, $deliverable]));

        $this->assertDatabaseHas('deliverables', [
            'id' => $deliverable->id,
            'lifecycle_status' => DeliverableStatus::Planning->value,
        ]);
    }

    public function test_move_to_planning_allows_missing_due_date(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $rachel = $this->orgProfile('Rachel Kim');

        $deliverable->update(['owner_profile_id' => $rachel->id, 'due_date' => null]);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.plan', [$project, $deliverable]))
            ->assertRedirect(route('deliverables.show', [$project, $deliverable]));

        $this->assertDatabaseHas('deliverables', [
            'id' => $deliverable->id,
            'lifecycle_status' => DeliverableStatus::Planning->value,
        ]);
    }

    public function test_move_to_planning_succeeds_with_owner_and_due_date(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $deliverable->update(['owner_profile_id' => $jordan->id, 'due_date' => '2026-09-01']);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.plan', [$project, $deliverable]))
            ->assertRedirect(route('deliverables.show', [$project, $deliverable]));

        $this->assertDatabaseHas('deliverables', [
            'id' => $deliverable->id,
            'lifecycle_status' => DeliverableStatus::Planning->value,
        ]);
    }

    public function test_move_to_planning_records_activity_event(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $deliverable->update(['owner_profile_id' => $jordan->id, 'due_date' => '2026-09-01']);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.plan', [$project, $deliverable]));

        $this->assertDatabaseHas('project_activity_events', [
            'project_id' => $project->id,
            'deliverable_id' => $deliverable->id,
            'actor_profile_id' => $jordan->id,
            'event_type' => 'deliverable_moved_to_planning',
        ]);
    }

    public function test_move_to_planning_creates_team_conversation(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $deliverable->update(['owner_profile_id' => $jordan->id, 'due_date' => '2026-09-01']);
        $this->assertNull($deliverable->fresh()->conversation);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.plan', [$project, $deliverable]));

        $this->assertNotNull($deliverable->fresh()->conversation);
        $this->assertDatabaseHas('conversations', [
            'subject_type' => Deliverable::class,
            'subject_id' => $deliverable->id,
            'conversation_type' => 'Deliverable Discussion',
            'visibility' => 'Project Team',
        ]);
    }

    public function test_project_member_can_post_team_discussion_message(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $deliverable->update(['owner_profile_id' => $jordan->id, 'due_date' => '2026-09-01']);

        // Move to planning first to create conversation
        $this->actingAs($jordan->user)
            ->post(route('deliverables.plan', [$project, $deliverable]));

        $this->actingAs($jordan->user)
            ->post(route('deliverables.messages.store', [$project, $deliverable->fresh()]), [
                'message' => 'Initial brief review complete — starting draft.',
            ])
            ->assertRedirect(route('deliverables.show', [$project, $deliverable]));

        $this->assertDatabaseHas('messages', [
            'author_profile_id' => $jordan->id,
            'body' => 'Initial brief review complete — starting draft.',
            'visibility' => 'Project Team',
        ]);
    }

    public function test_stakeholder_cannot_view_or_post_to_private_deliverable_discussion(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable] = $this->scenario();
        $rachel = $this->orgProfile('Rachel Kim');

        $deliverable->update(['owner_profile_id' => $this->orgProfile('Jordan Lee')->id, 'due_date' => '2026-09-01']);

        $this->actingAs($rachel->user)
            ->get(route('deliverables.show', [$project, $deliverable]))
            ->assertForbidden();

        $this->actingAs($rachel->user)
            ->post(route('deliverables.messages.store', [$project, $deliverable]), [
                'message' => 'This should remain private.',
            ])
            ->assertForbidden();

        $this->assertDatabaseMissing('messages', ['body' => 'This should remain private.']);
    }

    public function test_assigned_internal_reviewer_can_access_private_deliverable_discussion(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $rachel = $this->orgProfile('Rachel Kim');

        $deliverable->update([
            'owner_profile_id' => $jordan->id,
            'internal_reviewer_profile_id' => $rachel->id,
            'due_date' => '2026-09-01',
        ]);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.plan', [$project, $deliverable]));

        $this->actingAs($rachel->user)
            ->get(route('deliverables.show', [$project, $deliverable]))
            ->assertOk();

        $this->actingAs($rachel->user)
            ->post(route('deliverables.messages.store', [$project, $deliverable]), [
                'message' => 'Internal review note.',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('messages', [
            'author_profile_id' => $rachel->id,
            'body' => 'Internal review note.',
        ]);
    }

    public function test_reply_must_belong_to_deliverable_conversation(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $otherDeliverable = $project->deliverables()->whereKeyNot($deliverable->id)->firstOrFail();

        foreach ([$deliverable, $otherDeliverable] as $item) {
            $item->update(['owner_profile_id' => $jordan->id, 'due_date' => '2026-09-01']);
            $this->actingAs($jordan->user)->post(route('deliverables.plan', [$project, $item]));
        }

        $otherMessage = $otherDeliverable->fresh()->conversation->messages()->create([
            'organization_id' => $project->organization_id,
            'author_profile_id' => $jordan->id,
            'body' => 'Message from another deliverable.',
            'message_type' => 'Comment',
            'visibility' => 'Project Team',
        ]);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.messages.store', [$project, $deliverable]), [
                'message' => 'Invalid cross-deliverable reply.',
                'parent_message_id' => $otherMessage->id,
            ])
            ->assertSessionHasErrors('parent_message_id');

        $this->assertDatabaseMissing('messages', ['body' => 'Invalid cross-deliverable reply.']);
    }

    public function test_only_proposed_deliverable_can_move_to_planning(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $deliverable->update(['owner_profile_id' => $jordan->id, 'due_date' => '2026-09-01']);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.plan', [$project, $deliverable]))
            ->assertRedirect();

        $this->actingAs($jordan->user)
            ->post(route('deliverables.plan', [$project, $deliverable->fresh()]))
            ->assertSessionHasErrors('plan');

        $this->assertSame(
            1,
            $deliverable->activityEvents()->where('event_type', 'deliverable_moved_to_planning')->count(),
        );
    }

    public function test_owner_can_start_production_from_planning(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $deliverable->update([
            'owner_profile_id' => $jordan->id,
            'lifecycle_status' => DeliverableStatus::Planning->value,
        ]);

        $this->actingAs($jordan->user)
            ->get(route('deliverables.show', [$project, $deliverable]))
            ->assertOk()
            ->assertSee('Start production')
            ->assertDontSee('Submit for review');

        $this->actingAs($jordan->user)
            ->post(route('deliverables.production.start', [$project, $deliverable]))
            ->assertRedirect();

        $this->assertSame(DeliverableStatus::InProduction, $deliverable->fresh()->lifecycle_status);
        $this->assertDatabaseHas('project_activity_events', [
            'deliverable_id' => $deliverable->id,
            'actor_profile_id' => $jordan->id,
            'event_type' => 'deliverable_started_production',
        ]);

        $this->actingAs($jordan->user)
            ->get(route('deliverables.show', [$project, $deliverable]))
            ->assertOk()
            ->assertSee('Submit for review')
            ->assertDontSee('Start production');
    }

    public function test_planning_deliverable_cannot_skip_production_and_submit_for_review(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $deliverable->update([
            'owner_profile_id' => $jordan->id,
            'stakeholder_reviewer_profile_id' => $this->orgProfile('Avery Brooks')->id,
            'lifecycle_status' => DeliverableStatus::Planning->value,
        ]);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.review.submit', [$project, $deliverable]))
            ->assertSessionHasErrors('review');

        $this->assertSame(DeliverableStatus::Planning, $deliverable->fresh()->lifecycle_status);
        $this->assertDatabaseCount('deliverable_reviews', 0);
    }

    public function test_deliverable_review_requires_all_assigned_reviewers_and_protects_internal_workspace(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $rachel = $this->orgProfile('Rachel Kim');
        $avery = $this->orgProfile('Avery Brooks');
        $deliverable->update([
            'owner_profile_id' => $jordan->id,
            'internal_reviewer_profile_id' => $rachel->id,
            'stakeholder_reviewer_profile_id' => $avery->id,
            'lifecycle_status' => DeliverableStatus::InProduction->value,
        ]);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.review.submit', [$project, $deliverable]))
            ->assertRedirect();

        $this->assertSame(DeliverableStatus::ReadyForReview, $deliverable->fresh()->lifecycle_status);
        $this->assertDatabaseHas('deliverable_reviews', [
            'deliverable_id' => $deliverable->id,
            'reviewer_profile_id' => $rachel->id,
            'round_number' => 1,
            'decision' => 'Pending',
        ]);
        $this->assertDatabaseHas('deliverable_reviews', [
            'deliverable_id' => $deliverable->id,
            'reviewer_profile_id' => $avery->id,
            'round_number' => 1,
            'decision' => 'Pending',
        ]);

        $this->actingAs($avery->user)
            ->get(route('tasks.index'))
            ->assertOk()
            ->assertSee("Needs approval: {$deliverable->title}");

        $this->actingAs($avery->user)
            ->get(route('deliverables.show', [$project, $deliverable]))
            ->assertOk()
            ->assertSee('Review workspace')
            ->assertSee('Approve')
            ->assertDontSee('Team Discussion')
            ->assertDontSee('deliverable-tasks-tab', false);

        $this->actingAs($avery->user)
            ->post(route('deliverables.review.decision', [$project, $deliverable]), [
                'decision' => 'Approved',
                'notes' => 'Looks good for families.',
            ])
            ->assertRedirect();

        $this->assertSame(DeliverableStatus::ReadyForReview, $deliverable->fresh()->lifecycle_status);
        $this->assertDatabaseHas('deliverable_reviews', [
            'deliverable_id' => $deliverable->id,
            'reviewer_profile_id' => $avery->id,
            'decision' => 'Approved',
            'notes' => 'Looks good for families.',
        ]);

        $this->actingAs($rachel->user)
            ->post(route('deliverables.review.decision', [$project, $deliverable]), [
                'decision' => 'Approved',
            ])
            ->assertRedirect();

        $this->assertSame(DeliverableStatus::Approved, $deliverable->fresh()->lifecycle_status);
        $this->assertDatabaseHas('project_activity_events', [
            'deliverable_id' => $deliverable->id,
            'event_type' => 'deliverable_approved',
        ]);
    }

    public function test_requested_changes_resolve_alerts_and_resubmission_creates_new_round(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $avery = $this->orgProfile('Avery Brooks');
        $deliverable->update([
            'owner_profile_id' => $jordan->id,
            'stakeholder_reviewer_profile_id' => $avery->id,
            'lifecycle_status' => DeliverableStatus::InProduction->value,
        ]);

        $this->actingAs($jordan->user)->post(route('deliverables.review.submit', [$project, $deliverable]));

        $this->actingAs($avery->user)
            ->post(route('deliverables.review.decision', [$project, $deliverable]), [
                'decision' => 'Changes Requested',
                'notes' => 'Update the event time.',
            ])
            ->assertRedirect();

        $this->assertSame(DeliverableStatus::Revision, $deliverable->fresh()->lifecycle_status);
        $this->assertSame(0, WorkNotification::query()
            ->where('subject_type', Deliverable::class)
            ->where('subject_id', $deliverable->id)
            ->whereNull('read_at')
            ->count());

        $this->actingAs($jordan->user)
            ->post(route('deliverables.review.submit', [$project, $deliverable]))
            ->assertRedirect();

        $this->assertSame(2, $deliverable->reviews()->max('round_number'));
        $this->assertDatabaseHas('deliverable_reviews', [
            'deliverable_id' => $deliverable->id,
            'reviewer_profile_id' => $avery->id,
            'round_number' => 2,
            'decision' => 'Pending',
        ]);
        $this->assertSame(1, WorkNotification::query()
            ->where('subject_type', Deliverable::class)
            ->where('subject_id', $deliverable->id)
            ->whereNull('read_at')
            ->count());
    }

    public function test_person_without_pending_review_cannot_decide_deliverable_review(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $avery = $this->orgProfile('Avery Brooks');
        $marcus = $this->orgProfile('Marcus Bell');
        $deliverable->update([
            'owner_profile_id' => $jordan->id,
            'stakeholder_reviewer_profile_id' => $avery->id,
            'lifecycle_status' => DeliverableStatus::InProduction->value,
        ]);

        $this->actingAs($jordan->user)->post(route('deliverables.review.submit', [$project, $deliverable]));

        $this->actingAs($marcus->user)
            ->post(route('deliverables.review.decision', [$project, $deliverable]), ['decision' => 'Approved'])
            ->assertForbidden();

        $this->assertSame(DeliverableStatus::ReadyForReview, $deliverable->fresh()->lifecycle_status);
    }

    public function test_post_approval_delivery_lifecycle_is_sequential_and_records_activity(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $deliverable->update([
            'owner_profile_id' => $jordan->id,
            'lifecycle_status' => DeliverableStatus::Approved->value,
        ]);

        $this->actingAs($jordan->user)
            ->get(route('deliverables.show', [$project, $deliverable]))
            ->assertOk()
            ->assertSee('Start delivery');

        $this->actingAs($jordan->user)
            ->post(route('deliverables.delivery.start', [$project, $deliverable]))
            ->assertRedirect();
        $this->assertSame(DeliverableStatus::Delivery, $deliverable->fresh()->lifecycle_status);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.published.mark', [$project, $deliverable]), ['delivery_note' => ''])
            ->assertSessionHasErrors('delivery_note');

        $this->actingAs($jordan->user)
            ->post(route('deliverables.published.mark', [$project, $deliverable]), [
                'delivery_note' => 'Published to the church website and sent to the ministry lead.',
            ])
            ->assertRedirect();
        $this->assertSame(DeliverableStatus::PublishedRunning, $deliverable->fresh()->lifecycle_status);
        $this->assertSame(
            'Published to the church website and sent to the ministry lead.',
            $deliverable->fresh()->metadata_json['delivery_note'],
        );

        $this->actingAs($jordan->user)
            ->post(route('deliverables.end', [$project, $deliverable]))
            ->assertRedirect();
        $this->assertSame(DeliverableStatus::Ended, $deliverable->fresh()->lifecycle_status);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.archive', [$project, $deliverable]))
            ->assertRedirect();
        $this->assertSame(DeliverableStatus::Archived, $deliverable->fresh()->lifecycle_status);
        $this->assertNotNull($deliverable->fresh()->archived_at);

        foreach (['deliverable_started_delivery', 'deliverable_published', 'deliverable_ended', 'deliverable_archived'] as $eventType) {
            $this->assertDatabaseHas('project_activity_events', [
                'deliverable_id' => $deliverable->id,
                'event_type' => $eventType,
            ]);
        }
    }

    public function test_final_link_allows_delivery_without_note_and_invalid_transition_is_rejected(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $deliverable->update([
            'owner_profile_id' => $jordan->id,
            'lifecycle_status' => DeliverableStatus::Delivery->value,
        ]);
        $deliverable->links()->create([
            'organization_id' => $project->organization_id,
            'url' => 'https://drive.google.com/final-file',
            'label' => 'Final file',
            'added_by_profile_id' => $jordan->id,
        ]);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.published.mark', [$project, $deliverable]), ['delivery_note' => ''])
            ->assertRedirect();
        $this->assertSame(DeliverableStatus::PublishedRunning, $deliverable->fresh()->lifecycle_status);

        $this->actingAs($jordan->user)
            ->post(route('deliverables.archive', [$project, $deliverable]))
            ->assertSessionHasErrors('archive');
        $this->assertSame(DeliverableStatus::PublishedRunning, $deliverable->fresh()->lifecycle_status);
    }

    public function test_updating_internal_assignment_adds_participant_to_existing_conversation(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $rachel = $this->orgProfile('Rachel Kim');

        $deliverable->update(['owner_profile_id' => $jordan->id, 'due_date' => '2026-09-01']);
        $this->actingAs($jordan->user)->post(route('deliverables.plan', [$project, $deliverable]));

        $this->assertDatabaseMissing('conversation_participants', [
            'conversation_id' => $deliverable->fresh()->conversation->id,
            'profile_id' => $rachel->id,
        ]);

        $this->actingAs($jordan->user)
            ->patch(route('deliverables.update', [$project, $deliverable]), [
                'title' => $deliverable->title,
                'internal_reviewer_profile_id' => $rachel->id,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('conversation_participants', [
            'conversation_id' => $deliverable->fresh()->conversation->id,
            'profile_id' => $rachel->id,
        ]);
    }

    public function test_deliverable_type_must_belong_to_project_organization(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();
        $otherOrg = Organization::create(['name' => 'Other Church', 'slug' => 'other-church', 'timezone' => 'America/Chicago']);
        $otherType = DeliverableType::create([
            'organization_id' => $otherOrg->id,
            'name' => 'Other Type',
            'slug' => 'other-type',
            'is_active' => true,
        ]);

        $this->actingAs($jordan->user)
            ->patch(route('deliverables.update', [$project, $deliverable]), [
                'title' => $deliverable->title,
                'deliverable_type_id' => $otherType->id,
            ])
            ->assertSessionHasErrors('deliverable_type_id');

        $this->assertNotSame($otherType->id, $deliverable->fresh()->deliverable_type_id);
    }

    public function test_deliverable_is_org_scoped(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        // Create a second organization user without factories
        $otherOrg = Organization::create(['name' => 'Other Church', 'slug' => 'other-church', 'timezone' => 'America/Chicago']);
        $otherUser = User::create(['name' => 'Other User', 'email' => 'other@church.test', 'password' => bcrypt('password')]);
        $otherUser->markEmailAsVerified();
        Profile::create([
            'organization_id' => $otherOrg->id,
            'user_id' => $otherUser->id,
            'display_name' => 'Other User',
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);

        $this->actingAs($otherUser)
            ->get(route('deliverables.show', [$project, $deliverable]))
            ->assertForbidden();
    }

    // Helpers

    /** @return array{Project, Deliverable, Profile} */
    private function scenario(): array
    {
        $org = Organization::query()->where('slug', 'grace-community-church')->firstOrFail();
        $jordan = $this->orgProfile('Jordan Lee');
        $project = Project::query()
            ->where('organization_id', $org->id)
            ->latest('id')
            ->firstOrFail();
        $deliverable = $project->deliverables()->firstOrFail();

        return [$project, $deliverable, $jordan];
    }

    private function orgProfile(string $displayName): Profile
    {
        return Profile::query()
            ->where('display_name', $displayName)
            ->where('status', 'Active')
            ->firstOrFail();
    }
}
