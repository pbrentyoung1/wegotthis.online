<?php

namespace Tests\Feature;

use App\Enums\RequestStatus;
use App\Models\MinistryRequest;
use App\Models\Organization;
use App\Models\Profile;
use Database\Seeders\Phase2RequestIntakeScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TriageRequestUiTest extends TestCase
{
    use RefreshDatabase;

    public function test_triage_queue_shows_active_organization_requests_without_drafts(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');
        $rachel = $this->profile('Rachel Kim');
        $draft = MinistryRequest::query()->create([
            'organization_id' => $jordan->organization_id,
            'requester_profile_id' => $rachel->id,
            'title' => 'Private requester draft',
            'status' => RequestStatus::Draft,
        ]);
        $otherRequest = $this->otherOrganizationRequest();

        $this->actingAs($jordan->user)
            ->get(route('triage.index'))
            ->assertOk()
            ->assertSee('VBS Promotion Support')
            ->assertDontSee($draft->title)
            ->assertDontSee($otherRequest->title);
    }

    public function test_profile_without_triage_permission_cannot_access_queue(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');

        $this->assertFalse($rachel->hasPermission('requests.triage'));
        $this->actingAs($rachel->user)->get(route('triage.index'))->assertForbidden();
    }

    public function test_triage_workspace_centers_conversation_activity_and_conversion_choices(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');

        $this->actingAs($jordan->user)
            ->get(route('triage.show', $this->scenarioRequest()))
            ->assertOk()
            ->assertSee('Clarification conversation')
            ->assertSee('Activity')
            ->assertSee('Convert to')
            ->assertSee('Project')
            ->assertSee('Campaign')
            ->assertSee('Initiative')
            ->assertDontSee('Start triage');
    }

    public function test_triage_manager_can_start_triage_and_assign_the_request(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');
        $request = $this->scenarioRequest();

        $this->actingAs($jordan->user)->post(route('triage.transition', $request), [
            'status' => RequestStatus::InTriage->value,
            'triage_summary' => 'Review the timing and recommended communication plan.',
        ])->assertRedirect(route('triage.show', $request));

        $request->refresh();

        $this->assertSame(RequestStatus::InTriage, $request->status);
        $this->assertSame($jordan->id, $request->assigned_manager_profile_id);
        $this->assertSame('Review the timing and recommended communication plan.', $request->triage_summary);
    }

    public function test_clarification_request_is_visible_and_requester_can_update_and_resubmit(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');
        $rachel = $this->profile('Rachel Kim');
        $request = $this->scenarioRequest();
        $question = 'Please confirm the final registration deadline.';

        $this->actingAs($jordan->user)->post(route('triage.transition', $request), [
            'status' => RequestStatus::NeedsClarification->value,
            'notes' => $question,
        ])->assertRedirect(route('triage.show', $request));

        $this->assertSame(RequestStatus::NeedsClarification, $request->refresh()->status);
        $this->assertSame($question, data_get($request->missing_information_json, 'message'));

        $this->actingAs($rachel->user)
            ->get(route('requests.show', $request))
            ->assertOk()
            ->assertSee($question);

        $this->actingAs($rachel->user)->put(route('requests.update', $request), [
            'title' => $request->title,
            'department_id' => $request->department_id,
            'ministry_need' => $request->ministry_need,
            'known_constraints' => 'Registration closes July 6.',
            'intent' => 'submit',
        ])->assertRedirect(route('requests.show', $request));

        $this->assertSame(RequestStatus::Submitted, $request->refresh()->status);
        $this->assertSame('Registration closes July 6.', $request->known_constraints);
    }

    public function test_triage_manager_can_accept_and_record_decision_notes(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');
        $request = $this->scenarioRequest();

        $this->actingAs($jordan->user)->post(route('triage.transition', $request), [
            'status' => RequestStatus::InTriage->value,
        ]);

        $this->actingAs($jordan->user)->post(route('triage.transition', $request), [
            'status' => RequestStatus::Accepted->value,
            'notes' => 'Accepted for project planning.',
        ])->assertRedirect(route('triage.show', $request));

        $request->refresh();

        $this->assertSame(RequestStatus::Accepted, $request->status);
        $this->assertSame($jordan->id, $request->decision_by_profile_id);
        $this->assertSame('Accepted for project planning.', $request->decision_notes);
        $this->assertNotNull($request->decision_at);
    }

    public function test_clarification_defer_and_reject_require_notes(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');
        $request = $this->scenarioRequest();

        foreach ([RequestStatus::NeedsClarification, RequestStatus::Deferred, RequestStatus::Rejected] as $status) {
            $this->actingAs($jordan->user)
                ->from(route('triage.show', $request))
                ->post(route('triage.transition', $request), ['status' => $status->value])
                ->assertRedirect(route('triage.show', $request))
                ->assertSessionHasErrors('notes');
        }

        $this->assertSame(RequestStatus::Submitted, $request->refresh()->status);
    }

    public function test_triage_manager_cannot_open_drafts_or_cross_organization_requests(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');
        $draft = MinistryRequest::query()->create([
            'organization_id' => $jordan->organization_id,
            'requester_profile_id' => $this->profile('Rachel Kim')->id,
            'title' => 'Private requester draft',
            'status' => RequestStatus::Draft,
        ]);

        $this->actingAs($jordan->user)->get(route('triage.show', $draft))->assertForbidden();
        $this->actingAs($jordan->user)->get(route('triage.show', $this->otherOrganizationRequest()))->assertForbidden();
    }

    private function scenarioRequest(): MinistryRequest
    {
        return MinistryRequest::query()->where('title', 'VBS Promotion Support')->firstOrFail();
    }

    private function profile(string $displayName): Profile
    {
        return Profile::query()->with('user')->where('display_name', $displayName)->firstOrFail();
    }

    private function otherOrganizationRequest(): MinistryRequest
    {
        $organization = Organization::query()->create([
            'name' => 'Other Church',
            'slug' => 'other-church',
        ]);
        $requester = Profile::query()->create([
            'organization_id' => $organization->id,
            'display_name' => 'Other Requester',
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);

        return MinistryRequest::query()->create([
            'organization_id' => $organization->id,
            'requester_profile_id' => $requester->id,
            'title' => 'Other organization request',
            'status' => RequestStatus::Submitted,
            'ministry_need' => 'Keep this request isolated.',
            'submitted_at' => now(),
        ]);
    }
}
