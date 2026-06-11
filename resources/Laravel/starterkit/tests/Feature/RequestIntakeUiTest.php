<?php

namespace Tests\Feature;

use App\Enums\RequestStatus;
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

    private function profile(string $displayName): Profile
    {
        return Profile::query()
            ->with(['department', 'user'])
            ->where('display_name', $displayName)
            ->firstOrFail();
    }
}
