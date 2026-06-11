<?php

namespace App\Services;

use App\Enums\RequestStatus;
use App\Models\Deliverable;
use App\Models\DeliverableType;
use App\Models\MinistryRequest;
use App\Models\Profile;
use App\Models\Project;
use App\Models\RequestIdea;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProjectConversionService
{
    public function __construct(private readonly RequestIntakeService $requestIntakeService) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function convert(MinistryRequest $request, Profile $actor, array $attributes): Project
    {
        if ($request->organization_id !== $actor->organization_id || ! $actor->hasPermission('projects.create')) {
            throw ValidationException::withMessages(['conversion' => 'You cannot create a project for this request.']);
        }

        if (! in_array($request->status, [RequestStatus::Submitted, RequestStatus::InTriage, RequestStatus::Accepted], true)
            || $request->converted_project_id !== null) {
            throw ValidationException::withMessages(['conversion' => 'Only an active, unconverted request can become a project.']);
        }

        $request = $this->acceptForConversion($request, $actor);
        $ideaIds = collect($attributes['idea_ids'] ?? [])->map(fn ($id) => (int) $id)->unique()->values();
        $ideas = RequestIdea::query()
            ->where('organization_id', $request->organization_id)
            ->where('request_id', $request->id)
            ->whereIn('id', $ideaIds)
            ->get();

        if ($ideas->count() !== $ideaIds->count()) {
            throw ValidationException::withMessages(['idea_ids' => 'Every selected deliverable idea must belong to this request.']);
        }

        $project = Project::query()->create([
            'organization_id' => $request->organization_id,
            'department_id' => $request->department_id,
            'source_request_id' => $request->id,
            'owner_profile_id' => $actor->id,
            'title' => $attributes['title'],
            'slug' => $this->uniqueSlug($request->organization_id, $attributes['title']),
            'project_type' => $attributes['project_type'],
            'lifecycle_status' => 'Planning',
            'attention_state' => 'On Track',
            'objective' => $request->ministry_need,
            'scope_summary' => $request->triage_summary ?: $request->why_it_matters,
            'audience' => $request->audience,
            'desired_action' => $request->desired_action,
            'start_date' => data_get($request->key_dates_json, 'event_starts_on'),
            'stop_date' => data_get($request->key_dates_json, 'action_deadline')
                ?: data_get($request->key_dates_json, 'registration_deadline')
                ?: data_get($request->key_dates_json, 'needed_by'),
            'metadata_json' => ['converted_from_request_id' => $request->id],
        ]);

        $members = collect([
            $actor->id => 'Coordinator',
            $request->requester_profile_id => 'Stakeholder',
        ]);

        $request->conversation?->participants()
            ->get()
            ->each(function ($participant) use ($members) {
                if (! $members->has($participant->profile_id)) {
                    $members->put($participant->profile_id, $participant->participant_role === 'reviewer' ? 'Reviewer' : 'Stakeholder');
                }
            });

        foreach ($members as $profileId => $role) {
            $project->members()->create([
                'organization_id' => $request->organization_id,
                'profile_id' => $profileId,
                'project_role' => $role,
            ]);
        }

        foreach ($ideas as $idea) {
            $deliverable = $this->createDeliverable($project, $request, $idea);
            $idea->update([
                'triage_decision' => $idea->triage_decision === 'Suggested' ? 'Accepted' : $idea->triage_decision,
                'converted_deliverable_id' => $deliverable->id,
            ]);
        }

        $request->update(['converted_project_id' => $project->id]);
        $this->requestIntakeService->transition($request->refresh(), RequestStatus::Converted, $actor);

        return $project->refresh();
    }

    private function acceptForConversion(MinistryRequest $request, Profile $actor): MinistryRequest
    {
        if ($request->status === RequestStatus::Submitted) {
            $request = $this->requestIntakeService->transition($request, RequestStatus::InTriage, $actor);
        }

        if ($request->status === RequestStatus::InTriage) {
            $request = $this->requestIntakeService->transition(
                $request,
                RequestStatus::Accepted,
                $actor,
                'Accepted through project conversion.',
            );
        }

        return $request;
    }

    private function createDeliverable(Project $project, MinistryRequest $request, RequestIdea $idea): Deliverable
    {
        $typeName = $idea->idea_type ?: 'Other';
        $type = DeliverableType::query()->firstOrCreate(
            ['organization_id' => $project->organization_id, 'slug' => Str::slug($typeName)],
            ['name' => $typeName, 'is_active' => true],
        );

        return $project->deliverables()->create([
            'organization_id' => $project->organization_id,
            'source_request_idea_id' => $idea->id,
            'deliverable_type_id' => $type->id,
            'title' => $idea->title,
            'description' => $idea->decision_notes,
            'lifecycle_status' => 'Proposed',
            'attention_state' => 'On Track',
            'purpose' => $request->why_it_matters,
            'audience' => $request->audience,
            'desired_action' => $request->desired_action,
            'due_date' => data_get($request->key_dates_json, 'needed_by'),
        ]);
    }

    private function uniqueSlug(int $organizationId, string $title): string
    {
        $base = Str::slug($title) ?: 'project';
        $slug = $base;
        $suffix = 2;

        while (Project::query()->where('organization_id', $organizationId)->where('slug', $slug)->exists()) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
