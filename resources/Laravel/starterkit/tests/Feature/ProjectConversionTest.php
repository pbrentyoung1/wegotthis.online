<?php

namespace Tests\Feature;

use App\Enums\RequestStatus;
use App\Models\Deliverable;
use App\Models\MinistryRequest;
use App\Models\Profile;
use App\Models\Project;
use App\Services\RequestIntakeService;
use Database\Seeders\Phase2RequestIntakeScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectConversionTest extends TestCase
{
    use RefreshDatabase;

    public function test_communications_manager_converts_accepted_request_to_project_and_selected_deliverables(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');
        $rachel = $this->profile('Rachel Kim');
        $request = $this->acceptedRequest($jordan);
        $selectedIdeas = $request->ideas()->orderBy('id')->take(2)->pluck('id');

        $response = $this->actingAs($jordan->user)->post(route('triage.convert', $request), [
            'title' => 'VBS Communications Project',
            'project_type' => 'Event',
            'idea_ids' => $selectedIdeas->all(),
        ]);

        $project = Project::query()->where('source_request_id', $request->id)->firstOrFail();
        $response->assertRedirect(route('projects.show', $project));

        $this->assertSame(RequestStatus::Converted, $request->refresh()->status);
        $this->assertSame($project->id, $request->converted_project_id);
        $this->assertSame($jordan->id, $project->owner_profile_id);
        $this->assertSame('Planning', $project->lifecycle_status);
        $this->assertSame(2, $project->deliverables()->count());
        $this->assertSame(2, Deliverable::query()->whereIn('source_request_idea_id', $selectedIdeas)->count());
        $this->assertDatabaseHas('project_members', [
            'project_id' => $project->id,
            'profile_id' => $rachel->id,
            'project_role' => 'Stakeholder',
        ]);
        $this->assertDatabaseHas('project_members', [
            'project_id' => $project->id,
            'profile_id' => $jordan->id,
            'project_role' => 'Coordinator',
        ]);
    }

    public function test_active_unconverted_requests_can_be_converted(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');
        $request = $this->scenarioRequest();

        $this->actingAs($jordan->user)->post(route('triage.convert', $request), [
            'title' => $request->title,
            'project_type' => 'Standard',
        ])->assertRedirect();

        $this->assertSame(RequestStatus::Converted, $request->refresh()->status);

        $this->actingAs($jordan->user)->post(route('triage.convert', $request->refresh()), [
            'title' => $request->title,
            'project_type' => 'Standard',
        ])->assertSessionHasErrors('conversion');
    }

    public function test_request_with_unresolved_or_terminal_status_cannot_be_converted(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');

        foreach ([RequestStatus::NeedsClarification, RequestStatus::Deferred, RequestStatus::Rejected, RequestStatus::Archived] as $status) {
            $request = $this->scenarioRequest();
            $request->update(['status' => $status]);

            $this->actingAs($jordan->user)->post(route('triage.convert', $request), [
                'title' => $request->title,
                'project_type' => 'Standard',
            ])->assertSessionHasErrors('conversion');
        }
    }

    public function test_requester_can_view_converted_project_and_continuing_stakeholder_conversation(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');
        $rachel = $this->profile('Rachel Kim');
        $request = $this->acceptedRequest($jordan);

        $this->actingAs($jordan->user)->post(route('triage.convert', $request), [
            'title' => $request->title,
            'project_type' => 'Event',
            'idea_ids' => $request->ideas()->pluck('id')->all(),
        ]);

        $project = Project::query()->where('source_request_id', $request->id)->firstOrFail();

        $this->actingAs($rachel->user)
            ->get(route('projects.show', $project))
            ->assertOk()
            ->assertSee($project->title)
            ->assertSee('Deliverables')
            ->assertSee('Activity')
            ->assertSee('Conversation')
            ->assertDontSee('Project time budget')
            ->assertSee('Project created')
            ->assertSee('Stakeholder');

        $this->actingAs($rachel->user)
            ->get(route('projects.index'))
            ->assertOk()
            ->assertSee($project->title);
    }

    public function test_non_member_cannot_view_project_and_requester_cannot_convert(): void
    {
        $this->seed(Phase2RequestIntakeScenarioSeeder::class);

        $jordan = $this->profile('Jordan Lee');
        $rachel = $this->profile('Rachel Kim');
        $marcus = $this->profile('Marcus Bell');
        $request = $this->acceptedRequest($jordan);

        $this->actingAs($jordan->user)->post(route('triage.convert', $request), [
            'title' => $request->title,
            'project_type' => 'Standard',
        ]);

        $project = Project::query()->where('source_request_id', $request->id)->firstOrFail();

        $this->actingAs($marcus->user)->get(route('projects.show', $project))->assertForbidden();
        $this->actingAs($rachel->user)->post(route('triage.convert', $request), [
            'title' => $request->title,
            'project_type' => 'Standard',
        ])->assertForbidden();
    }

    private function acceptedRequest(Profile $actor): MinistryRequest
    {
        $service = app(RequestIntakeService::class);
        $request = $service->transition($this->scenarioRequest(), RequestStatus::InTriage, $actor);

        return $service->transition($request, RequestStatus::Accepted, $actor, 'Ready to convert.');
    }

    private function scenarioRequest(): MinistryRequest
    {
        return MinistryRequest::query()->where('title', 'VBS Promotion Support')->firstOrFail();
    }

    private function profile(string $displayName): Profile
    {
        return Profile::query()->with('user')->where('display_name', $displayName)->firstOrFail();
    }
}
