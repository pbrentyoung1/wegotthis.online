<?php

namespace Tests\Feature;

use App\Enums\RequestStatus;
use App\Models\Conversation;
use App\Models\MinistryRequest;
use App\Models\Organization;
use App\Models\Profile;
use Database\Seeders\Phase2RequestIntakeScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaggedRequestsTest extends TestCase
{
    use RefreshDatabase;

    public function test_participant_sees_tagged_request(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $request = $this->vbsRequest();
        $marcus = $this->profile('Marcus Bell');

        $this->tagAsParticipant($request, $marcus);

        $this->actingAs($marcus->user)
            ->get(route('requests.tagged'))
            ->assertOk()
            ->assertSee('VBS Promotion Support')
            ->assertSee('Submitted by');
    }

    public function test_requester_does_not_see_own_request_in_tagged(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $request = $this->vbsRequest();
        $rachel = $this->profile('Rachel Kim');

        // Even if Rachel is a participant (she's the requester), she should not see it
        $this->tagAsParticipant($request, $rachel);

        $this->actingAs($rachel->user)
            ->get(route('requests.tagged'))
            ->assertOk()
            ->assertDontSee('VBS Promotion Support');
    }

    public function test_non_participant_does_not_see_request(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $marcus = $this->profile('Marcus Bell');

        // Marcus is not tagged on the VBS request
        $this->actingAs($marcus->user)
            ->get(route('requests.tagged'))
            ->assertOk()
            ->assertDontSee('VBS Promotion Support');
    }

    public function test_tagged_requests_are_org_scoped(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        // Create a second org with its own request
        $otherOrg = Organization::query()->create([
            'name' => 'Other Church',
            'slug' => 'other-church',
        ]);
        $rachel = $this->profile('Rachel Kim');

        $otherRequest = MinistryRequest::query()->create([
            'organization_id' => $otherOrg->id,
            'requester_profile_id' => $rachel->id, // a real ID; different org still enforces isolation
            'title' => 'Other Org Request',
            'status' => RequestStatus::Submitted,
        ]);
        $conversation = $otherRequest->conversation()->create([
            'organization_id' => $otherOrg->id,
            'conversation_type' => 'Request Discussion',
            'title' => $otherRequest->title,
            'visibility' => 'Requester Visible',
            'status' => 'Open',
            'created_by_profile_id' => $rachel->id,
        ]);

        $marcus = $this->profile('Marcus Bell');

        // Add Marcus to the other org's request conversation — should still be invisible
        $conversation->participants()->create([
            'organization_id' => $otherOrg->id,
            'profile_id' => $marcus->id,
            'participant_role' => 'reviewer',
        ]);

        $this->actingAs($marcus->user)
            ->get(route('requests.tagged'))
            ->assertOk()
            ->assertDontSee('Other Org Request');
    }

    public function test_draft_and_archived_requests_are_excluded(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $org = Organization::query()->where('slug', 'grace-community-church')->firstOrFail();
        $rachel = $this->profile('Rachel Kim');
        $marcus = $this->profile('Marcus Bell');

        foreach ([RequestStatus::Draft, RequestStatus::Archived] as $status) {
            $req = MinistryRequest::query()->create([
                'organization_id' => $org->id,
                'requester_profile_id' => $rachel->id,
                'title' => "Hidden {$status->value} Request",
                'status' => $status,
            ]);
            $this->tagAsParticipant($req, $marcus);
        }

        $response = $this->actingAs($marcus->user)
            ->get(route('requests.tagged'))
            ->assertOk();

        $response->assertDontSee('Hidden Draft Request');
        $response->assertDontSee('Hidden Archived Request');
    }

    public function test_tagged_participant_can_post_a_message(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $request = $this->vbsRequest();
        $marcus = $this->profile('Marcus Bell');

        $this->tagAsParticipant($request, $marcus);

        $this->actingAs($marcus->user)
            ->post(route('requests.messages.store', $request), [
                'message' => 'Looks good to me.',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('messages', [
            'author_profile_id' => $marcus->id,
            'body' => 'Looks good to me.',
        ]);
    }

    public function test_tagged_participant_cannot_edit_request(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $request = $this->vbsRequest();
        $marcus = $this->profile('Marcus Bell');

        $this->tagAsParticipant($request, $marcus);

        $this->actingAs($marcus->user)
            ->get(route('requests.edit', $request))
            ->assertForbidden();
    }

    public function test_tagged_requests_shows_empty_state_when_none(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $marcus = $this->profile('Marcus Bell');

        $this->actingAs($marcus->user)
            ->get(route('requests.tagged'))
            ->assertOk()
            ->assertSee('No tagged requests');
    }

    public function test_unauthenticated_user_is_redirected(): void
    {
        $this->get(route('requests.tagged'))->assertRedirect(route('login'));
    }

    private function vbsRequest(): MinistryRequest
    {
        return MinistryRequest::query()->where('title', 'VBS Promotion Support')->firstOrFail();
    }

    private function tagAsParticipant(MinistryRequest $request, Profile $profile): void
    {
        $conversation = $request->conversation()->firstOrCreate(
            [],
            [
                'organization_id' => $request->organization_id,
                'conversation_type' => 'Request Discussion',
                'title' => $request->title,
                'visibility' => 'Requester Visible',
                'status' => 'Open',
                'created_by_profile_id' => $request->requester_profile_id,
            ],
        );

        $conversation->participants()->firstOrCreate(
            ['profile_id' => $profile->id],
            [
                'organization_id' => $request->organization_id,
                'participant_role' => 'reviewer',
            ],
        );
    }

    private function profile(string $displayName): Profile
    {
        return Profile::query()
            ->with(['department', 'user'])
            ->where('display_name', $displayName)
            ->firstOrFail();
    }
}
