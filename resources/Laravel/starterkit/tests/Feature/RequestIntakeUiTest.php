<?php

namespace Tests\Feature;

use App\Enums\RequestStatus;
use App\Models\Message;
use App\Models\MinistryRequest;
use App\Models\Profile;
use Database\Seeders\Phase2RequestIntakeScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RequestIntakeUiTest extends TestCase
{
    use RefreshDatabase;

    public function test_requester_can_view_only_their_requests(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $otherRequest = MinistryRequest::query()->create([
            'organization_id' => $rachel->organization_id,
            'requester_profile_id' => $this->profile('Jordan Lee')->id,
            'title' => 'Communications Team Request',
            'status' => RequestStatus::Draft,
        ]);

        $response = $this->actingAs($rachel->user)->get(route('requests.index'));

        $response
            ->assertOk()
            ->assertSee('VBS Promotion Support')
            ->assertSee('Important date')
            ->assertSee('Last activity')
            ->assertDontSee($otherRequest->title);
    }

    public function test_profile_without_submit_permission_cannot_access_request_intake(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $marcus = $this->profile('Marcus Bell');

        $this->assertFalse($marcus->hasPermission('requests.submit'));
        $this->actingAs($marcus->user)->get(route('requests.index'))->assertForbidden();
        $this->actingAs($marcus->user)->get(route('requests.create'))->assertForbidden();
    }

    public function test_requester_can_save_and_update_a_draft(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $department = $rachel->department;

        $response = $this->actingAs($rachel->user)->post(route('requests.store'), [
            'title' => 'Easter volunteer recruitment',
            'department_id' => $department->id,
            'ministry_need' => '',
            'audience' => 'Current church attendees',
            'event_date' => '2027-03-28',
            'intent' => 'draft',
        ]);

        $draft = MinistryRequest::query()->where('title', 'Easter volunteer recruitment')->firstOrFail();

        $response->assertRedirect(route('requests.show', $draft));
        $this->assertSame(RequestStatus::Draft, $draft->status);
        $this->assertSame($rachel->id, $draft->requester_profile_id);
        $this->assertSame('2027-03-28', data_get($draft->key_dates_json, 'event_date'));

        $this->actingAs($rachel->user)->put(route('requests.update', $draft), [
            'title' => 'Easter volunteer recruitment',
            'department_id' => $department->id,
            'ministry_need' => 'Recruit enough volunteers to serve Easter guests well.',
            'audience' => 'Current church attendees',
            'intent' => 'draft',
        ])->assertRedirect(route('requests.show', $draft));

        $this->assertSame(
            'Recruit enough volunteers to serve Easter guests well.',
            $draft->refresh()->ministry_need,
        );
    }

    public function test_requester_can_submit_a_complete_request(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');

        $response = $this->actingAs($rachel->user)->post(route('requests.store'), [
            'title' => 'Fall groups launch',
            'ministry_need' => 'Help people understand and join a fall small group.',
            'why_it_matters' => 'People need meaningful community.',
            'audience' => 'Adults not currently in a group',
            'desired_action' => 'Find and join a group',
            'needed_by' => '2026-08-15',
            'intent' => 'submit',
        ]);

        $request = MinistryRequest::query()->where('title', 'Fall groups launch')->firstOrFail();

        $response->assertRedirect(route('requests.show', $request));
        $this->assertSame(RequestStatus::Submitted, $request->status);
        $this->assertNotNull($request->submitted_at);
    }

    public function test_requester_can_submit_a_complete_ministry_brief_with_asset_links_and_ideas(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $assetLinks = "Brand guide: https://drive.example.test/brand\nVBS registration: https://example.test/vbs";

        $this->actingAs($rachel->user)->post(route('requests.store'), [
            'title' => 'Complete ministry brief',
            'ministry_need' => 'Invite families to VBS.',
            'success_looks_like' => 'Fifty new families register.',
            'key_message' => 'VBS is welcoming and easy to join.',
            'existing_assets_links' => $assetLinks,
            'reviewers_approvals' => 'Kids Pastor and Executive Pastor',
            'sensitivities' => 'Avoid language that assumes every child attends with a parent.',
            'requester_ideas' => "Parent email\nSocial countdown",
            'action_deadline' => '2026-07-06',
            'intent' => 'submit',
        ]);

        $request = MinistryRequest::query()->where('title', 'Complete ministry brief')->firstOrFail();

        $this->assertSame('2026-07-06', data_get($request->key_dates_json, 'action_deadline'));
        $this->assertSame($assetLinks, $request->answers()->where('question_key', 'existing_assets')->value('answer_value'));
        $this->assertSame('Fifty new families register.', $request->answers()->where('question_key', 'success_looks_like')->value('answer_value'));
        $this->assertEqualsCanonicalizing(['Parent email', 'Social countdown'], $request->ideas()->pluck('title')->all());

        $this->actingAs($rachel->user)
            ->get(route('requests.show', $request))
            ->assertOk()
            ->assertSee('Existing branding, assets, examples, and links')
            ->assertSee('https://example.test/vbs')
            ->assertSee('Kids Pastor and Executive Pastor')
            ->assertSee('Parent email');

        $this->actingAs($this->profile('Jordan Lee')->user)
            ->get(route('triage.show', $request))
            ->assertOk()
            ->assertSee('Fifty new families register.')
            ->assertSee('Social countdown');
    }

    public function test_submission_requires_a_ministry_need_without_creating_a_request(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $requestCount = MinistryRequest::query()->count();

        $this->actingAs($rachel->user)
            ->from(route('requests.create'))
            ->post(route('requests.store'), [
                'title' => 'Incomplete submission',
                'intent' => 'submit',
            ])
            ->assertRedirect(route('requests.create'))
            ->assertSessionHasErrors('ministry_need');

        $this->assertSame($requestCount, MinistryRequest::query()->count());
    }

    public function test_requester_update_does_not_reset_an_existing_idea_triage_decision(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $request = MinistryRequest::query()->where('title', 'VBS Promotion Support')->firstOrFail();
        $idea = $request->ideas()->where('title', 'Social posts')->firstOrFail();

        $request->update(['status' => RequestStatus::NeedsClarification]);
        $idea->update(['triage_decision' => 'Accepted']);

        $this->actingAs($rachel->user)->put(route('requests.update', $request), [
            'title' => $request->title,
            'department_id' => $request->department_id,
            'ministry_need' => $request->ministry_need,
            'requester_ideas' => $request->ideas()->pluck('title')->implode("\n"),
            'intent' => 'draft',
        ])->assertRedirect(route('requests.show', $request));

        $this->assertSame('Accepted', $idea->refresh()->triage_decision);
    }

    public function test_requester_cannot_view_another_requester_request_or_edit_a_submitted_request(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $jordan = $this->profile('Jordan Lee');
        $rachelRequest = MinistryRequest::query()->where('title', 'VBS Promotion Support')->firstOrFail();
        $jordanRequest = MinistryRequest::query()->create([
            'organization_id' => $jordan->organization_id,
            'requester_profile_id' => $jordan->id,
            'title' => 'Jordan draft',
            'status' => RequestStatus::Draft,
        ]);

        $this->actingAs($rachel->user)->get(route('requests.show', $jordanRequest))->assertForbidden();
        $this->actingAs($rachel->user)->get(route('requests.edit', $rachelRequest))->assertForbidden();
    }

    public function test_requester_can_post_to_the_shared_request_conversation(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $request = MinistryRequest::query()->where('title', 'VBS Promotion Support')->firstOrFail();

        $this->actingAs($rachel->user)
            ->post(route('requests.messages.store', $request), [
                'message' => 'Registration will close on July 6.',
                'intent' => 'message',
            ])
            ->assertRedirect(route('requests.show', $request));

        $message = Message::query()->where('body', 'Registration will close on July 6.')->firstOrFail();

        $this->assertSame($rachel->id, $message->author_profile_id);
        $this->assertSame('Requester Visible', $message->visibility);
        $this->assertCount(2, $message->conversation->participants);

        $this->actingAs($rachel->user)
            ->get(route('requests.show', $request))
            ->assertOk()
            ->assertSee('Conversation')
            ->assertSee('Registration will close on July 6.');
    }

    public function test_requester_cannot_post_to_another_request_conversation(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $jordan = $this->profile('Jordan Lee');
        $request = MinistryRequest::query()->create([
            'organization_id' => $jordan->organization_id,
            'requester_profile_id' => $jordan->id,
            'title' => 'Jordan submitted request',
            'status' => RequestStatus::Submitted,
            'ministry_need' => 'Keep this conversation scoped.',
            'submitted_at' => now(),
        ]);

        $this->actingAs($rachel->user)
            ->post(route('requests.messages.store', $request), [
                'message' => 'I should not be able to post this.',
                'intent' => 'message',
            ])
            ->assertForbidden();

        $this->assertDatabaseMissing('messages', ['body' => 'I should not be able to post this.']);
    }

    public function test_requester_can_reply_to_a_specific_conversation_message(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $jordan = $this->profile('Jordan Lee');
        $request = MinistryRequest::query()->where('title', 'VBS Promotion Support')->firstOrFail();

        $this->actingAs($jordan->user)->post(route('requests.messages.store', $request), [
            'message' => 'Which registration link should we use?',
            'intent' => 'message',
        ]);

        $question = Message::query()->where('body', 'Which registration link should we use?')->firstOrFail();

        $this->actingAs($rachel->user)
            ->post(route('requests.messages.store', $request), [
                'message' => 'Use the registration link already included in the brief.',
                'intent' => 'message',
                'parent_message_id' => $question->id,
            ])
            ->assertRedirect(route('requests.show', $request));

        $this->assertDatabaseHas('messages', [
            'body' => 'Use the registration link already included in the brief.',
            'parent_message_id' => $question->id,
        ]);

        $this->actingAs($rachel->user)
            ->get(route('requests.show', $request))
            ->assertOk()
            ->assertSee('Reply')
            ->assertSeeInOrder([
                'Which registration link should we use?',
                'Use the registration link already included in the brief.',
            ]);
    }

    public function test_requester_cannot_reply_to_a_message_from_another_request(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');
        $jordan = $this->profile('Jordan Lee');
        $request = MinistryRequest::query()->where('title', 'VBS Promotion Support')->firstOrFail();
        $otherRequest = MinistryRequest::query()->create([
            'organization_id' => $jordan->organization_id,
            'requester_profile_id' => $jordan->id,
            'title' => 'Other submitted request',
            'status' => RequestStatus::Submitted,
            'ministry_need' => 'Keep replies scoped.',
            'submitted_at' => now(),
        ]);

        $this->actingAs($jordan->user)->post(route('requests.messages.store', $otherRequest), [
            'message' => 'Message from another request.',
            'intent' => 'message',
        ]);

        $otherMessage = Message::query()->where('body', 'Message from another request.')->firstOrFail();

        $this->actingAs($rachel->user)
            ->from(route('requests.show', $request))
            ->post(route('requests.messages.store', $request), [
                'message' => 'This reply should be rejected.',
                'intent' => 'message',
                'parent_message_id' => $otherMessage->id,
            ])
            ->assertRedirect(route('requests.show', $request))
            ->assertSessionHasErrors('parent_message_id');

        $this->assertDatabaseMissing('messages', ['body' => 'This reply should be rejected.']);
    }

    private function profile(string $displayName): Profile
    {
        return Profile::query()
            ->with(['department', 'user'])
            ->where('display_name', $displayName)
            ->firstOrFail();
    }
}
