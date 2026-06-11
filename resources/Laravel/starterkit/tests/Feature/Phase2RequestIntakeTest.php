<?php

namespace Tests\Feature;

use App\Enums\RequestStatus;
use App\Models\Deliverable;
use App\Models\Department;
use App\Models\MinistryRequest;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\RequestAnswer;
use App\Models\RequestIdea;
use App\Services\RequestConversationService;
use App\Services\RequestIntakeService;
use Database\Seeders\Phase1ScenarioSeeder;
use Database\Seeders\Phase2RequestIntakeScenarioSeeder;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class Phase2RequestIntakeTest extends TestCase
{
    use RefreshDatabase;

    public function test_request_intake_scenario_seeder_is_idempotent(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $request = $this->scenarioRequest();

        $this->assertSame(1, MinistryRequest::query()->where('title', 'VBS Promotion Support')->count());
        $this->assertSame(2, $request->answers()->count());
        $this->assertSame(3, $request->ideas()->count());
    }

    public function test_submitted_scenario_preserves_request_answers_and_suggested_ideas(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $request = $this->scenarioRequest();
        $rachel = $this->profile('Rachel Kim');

        $this->assertSame(RequestStatus::Submitted, $request->status);
        $this->assertNotNull($request->submitted_at);
        $this->assertTrue($request->requesterProfile->is($rachel));
        $this->assertSame('Staff', $rachel->person_type);
        $this->assertTrue($this->profileHasRole($rachel, 'department-leader'));

        $answer = $request->answers()->where('question_key', 'success_looks_like')->firstOrFail();
        $this->assertSame('What would success look like?', $answer->question_label);
        $this->assertSame('Families understand VBS and complete registration.', $answer->answer_value);

        $this->assertSame(['Suggested'], $request->ideas()->pluck('triage_decision')->unique()->values()->all());
        $this->assertSame(0, Deliverable::query()->count());
    }

    public function test_request_service_rejects_cross_organization_request_relationships(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $otherOrganization = Organization::query()->create([
            'name' => 'Other Church',
            'slug' => 'other-church',
        ]);
        $otherProfile = $this->createProfile($otherOrganization, 'Other Requester');

        $this->expectException(ValidationException::class);

        $this->service()->createRequest($this->graceOrganization(), $otherProfile, [
            'title' => 'Invalid Request',
            'ministry_need' => 'This should fail.',
        ]);
    }

    public function test_request_service_rejects_cross_organization_manager_department_answer_and_idea_relationships(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $otherOrganization = Organization::query()->create([
            'name' => 'Other Church',
            'slug' => 'other-church',
        ]);
        $otherProfile = $this->createProfile($otherOrganization, 'Other Manager');
        $otherDepartment = Department::query()->create([
            'organization_id' => $otherOrganization->id,
            'name' => 'Other Department',
            'slug' => 'other-department',
            'status' => 'Active',
        ]);
        $service = $this->service();

        foreach ([
            fn () => $service->createRequest($this->graceOrganization(), $this->profile('Rachel Kim'), [
                'assigned_manager' => $otherProfile,
                'title' => 'Invalid Manager',
                'ministry_need' => 'This should fail.',
            ]),
            fn () => $service->createRequest($this->graceOrganization(), $this->profile('Rachel Kim'), [
                'department' => $otherDepartment,
                'title' => 'Invalid Department',
                'ministry_need' => 'This should fail.',
            ]),
            fn () => $service->saveAnswer($this->draftRequest(), [
                'organization_id' => $otherOrganization->id,
                'question_key' => 'invalid',
                'question_label' => 'Invalid',
                'answer_type' => 'text',
            ]),
            fn () => $service->saveIdea($this->draftRequest(), [
                'suggested_by_profile' => $otherProfile,
                'title' => 'Invalid Idea',
                'idea_type' => 'Other',
                'source' => 'Requester',
            ]),
        ] as $operation) {
            try {
                $operation();
                $this->fail('Expected a cross-organization relationship to be rejected.');
            } catch (ValidationException) {
                $this->addToAssertionCount(1);
            }
        }
    }

    public function test_request_service_enforces_submission_requirements_and_transition_authority(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $service = $this->service();
        $rachel = $this->profile('Rachel Kim');
        $jordan = $this->profile('Jordan Lee');
        $request = $service->createRequest($this->graceOrganization(), $rachel, [
            'title' => 'Incomplete Request',
        ]);

        try {
            $service->transition($request, RequestStatus::Submitted, $rachel);
            $this->fail('Expected submission without ministry need to be rejected.');
        } catch (ValidationException) {
            $this->addToAssertionCount(1);
        }

        $request->update(['ministry_need' => 'Need communications support.']);
        $request = $service->transition($request->refresh(), RequestStatus::Submitted, $rachel);

        $this->assertSame(RequestStatus::Submitted, $request->status);

        $this->expectException(ValidationException::class);
        $service->transition($request, RequestStatus::InTriage, $rachel);
    }

    public function test_communications_manager_can_triage_and_record_a_terminal_decision(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $service = $this->service();
        $jordan = $this->profile('Jordan Lee');
        $request = $service->transition($this->scenarioRequest(), RequestStatus::InTriage, $jordan);
        $request = $service->transition($request, RequestStatus::Accepted, $jordan, 'Ready for future project planning.');

        $this->assertSame(RequestStatus::Accepted, $request->status);
        $this->assertTrue($request->decisionByProfile->is($jordan));
        $this->assertSame('Ready for future project planning.', $request->decision_notes);
        $this->assertNotNull($request->decision_at);
    }

    public function test_request_answer_question_key_is_unique_per_request(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $request = $this->draftRequest();

        RequestAnswer::query()->create([
            'organization_id' => $request->organization_id,
            'request_id' => $request->id,
            'question_key' => 'audience',
            'question_label' => 'Who needs to know?',
            'answer_type' => 'text',
        ]);

        $this->expectException(QueryException::class);

        RequestAnswer::query()->create([
            'organization_id' => $request->organization_id,
            'request_id' => $request->id,
            'question_key' => 'audience',
            'question_label' => 'Audience',
            'answer_type' => 'text',
        ]);
    }

    public function test_request_foreign_key_delete_behavior_preserves_request_and_restricts_requester_deletion(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $organization = $this->graceOrganization();
        $department = Department::query()->create([
            'organization_id' => $organization->id,
            'name' => 'Temporary Ministry',
            'slug' => 'temporary-ministry',
            'status' => 'Active',
        ]);
        $requester = $this->createProfile($organization, 'Temporary Requester');
        $manager = $this->createProfile($organization, 'Temporary Manager');
        $request = $this->service()->createRequest($organization, $requester, [
            'department' => $department,
            'assigned_manager' => $manager,
            'title' => 'Temporary Request',
            'ministry_need' => 'Test delete behavior.',
        ]);

        $manager->delete();
        $department->delete();

        $this->assertNull($request->refresh()->assigned_manager_profile_id);
        $this->assertNull($request->department_id);

        $this->expectException(QueryException::class);
        $requester->delete();
    }

    public function test_hard_deleting_request_cascades_request_owned_records(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $request = $this->scenarioRequest();
        $requestId = $request->id;
        $conversation = app(RequestConversationService::class)->addMessage(
            $request,
            $this->profile('Rachel Kim'),
            'Conversation record to remove with the request.',
        )->conversation;

        $request->delete();

        $this->assertSame(0, RequestAnswer::query()->where('request_id', $requestId)->count());
        $this->assertSame(0, RequestIdea::query()->where('request_id', $requestId)->count());
        $this->assertDatabaseMissing('conversations', ['id' => $conversation->id]);
        $this->assertDatabaseMissing('messages', ['conversation_id' => $conversation->id]);
        $this->assertSame(7, Profile::query()->where('organization_id', $this->graceOrganization()->id)->count());
        $this->assertSame(5, Department::query()->where('organization_id', $this->graceOrganization()->id)->count());
    }

    public function test_only_approved_request_and_conversion_foundation_tables_exist(): void
    {
        foreach (['requests', 'request_answers', 'request_ideas', 'conversations', 'conversation_participants', 'messages', 'projects', 'project_members', 'project_types', 'project_type_deliverable_templates', 'deliverable_types', 'deliverables'] as $table) {
            $this->assertTrue(Schema::hasTable($table));
        }

        foreach (['campaigns', 'tasks', 'work_participants', 'assets', 'asset_links', 'review_rounds', 'change_requests'] as $table) {
            $this->assertFalse(Schema::hasTable($table), "Unexpected later-scope table exists: {$table}");
        }
    }

    private function draftRequest(): MinistryRequest
    {
        return $this->service()->createRequest($this->graceOrganization(), $this->profile('Rachel Kim'), [
            'title' => 'Draft Request '.MinistryRequest::query()->count(),
            'ministry_need' => 'Need communications support.',
        ]);
    }

    private function scenarioRequest(): MinistryRequest
    {
        return MinistryRequest::query()->where('title', 'VBS Promotion Support')->firstOrFail();
    }

    private function graceOrganization(): Organization
    {
        return Organization::query()->where('slug', 'grace-community-church')->firstOrFail();
    }

    private function profile(string $displayName): Profile
    {
        return Profile::query()
            ->where('organization_id', $this->graceOrganization()->id)
            ->where('display_name', $displayName)
            ->firstOrFail();
    }

    private function createProfile(Organization $organization, string $displayName): Profile
    {
        return Profile::query()->create([
            'organization_id' => $organization->id,
            'display_name' => $displayName,
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);
    }

    private function profileHasRole(Profile $profile, string $roleSlug): bool
    {
        return $profile->roleAssignments()
            ->whereNull('ended_at')
            ->whereHas('role', fn ($query) => $query->where('slug', $roleSlug))
            ->exists();
    }

    private function service(): RequestIntakeService
    {
        return app(RequestIntakeService::class);
    }
}
