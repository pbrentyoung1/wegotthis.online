<?php

namespace App\Services;

use App\Enums\RequestStatus;
use App\Models\Deliverable;
use App\Models\DeliverableType;
use App\Models\MinistryRequest;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\ProjectTypeDeliverableTemplate;
use App\Models\RequestIdea;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
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

        $projectType = $this->projectType($request, $attributes);
        $templateDeliverables = $this->templateDeliverables($request, $projectType, $attributes);
        $projectTypeName = $projectType?->name ?: ($attributes['project_type'] ?? 'Standard');

        $project = Project::query()->create([
            'organization_id' => $request->organization_id,
            'department_id' => $request->department_id,
            'source_request_id' => $request->id,
            'owner_profile_id' => $actor->id,
            'project_type_id' => $projectType?->id,
            'title' => $attributes['title'],
            'slug' => $this->uniqueSlug($request->organization_id, $attributes['title']),
            'project_type' => $projectTypeName,
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
            'metadata_json' => [
                'converted_from_request_id' => $request->id,
                'project_type_template_id' => $projectType?->id,
            ],
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

        foreach ($templateDeliverables as $template) {
            $this->createTemplateDeliverable($project, $request, $template);
        }

        $request->update(['converted_project_id' => $project->id]);
        $this->requestIntakeService->transition($request->refresh(), RequestStatus::Converted, $actor);

        return $project->refresh();
    }

    private function projectType(MinistryRequest $request, array $attributes): ?ProjectType
    {
        if (blank($attributes['project_type_id'] ?? null)) {
            return null;
        }

        $projectType = ProjectType::query()->find($attributes['project_type_id']);

        if ($projectType?->organization_id !== $request->organization_id || ! $projectType->is_active) {
            throw ValidationException::withMessages(['project_type_id' => 'Select an active Project Type from this organization.']);
        }

        return $projectType;
    }

    private function templateDeliverables(MinistryRequest $request, ?ProjectType $projectType, array $attributes): Collection
    {
        $ids = collect($attributes['template_deliverable_ids'] ?? [])->map(fn ($id) => (int) $id)->unique()->values();

        if ($projectType === null && $ids->isNotEmpty()) {
            throw ValidationException::withMessages(['template_deliverable_ids' => 'Select a Project Type before choosing template Deliverables.']);
        }

        $templates = ProjectTypeDeliverableTemplate::query()
            ->where('organization_id', $request->organization_id)
            ->when($projectType, fn ($query) => $query->where('project_type_id', $projectType->id))
            ->whereIn('id', $ids)
            ->get();

        if ($templates->count() !== $ids->count()) {
            throw ValidationException::withMessages(['template_deliverable_ids' => 'Every selected default Deliverable must belong to the selected Project Type.']);
        }

        return $templates;
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

    private function createTemplateDeliverable(Project $project, MinistryRequest $request, ProjectTypeDeliverableTemplate $template): Deliverable
    {
        $targetDate = data_get($request->key_dates_json, 'event_starts_on')
            ?: data_get($request->key_dates_json, 'action_deadline')
            ?: data_get($request->key_dates_json, 'needed_by');

        return $project->deliverables()->create([
            'organization_id' => $project->organization_id,
            'deliverable_type_id' => $template->deliverable_type_id,
            'title' => $template->title,
            'description' => $template->description,
            'lifecycle_status' => 'Proposed',
            'attention_state' => 'On Track',
            'purpose' => $request->why_it_matters,
            'audience' => $request->audience,
            'desired_action' => $request->desired_action,
            'due_date' => $targetDate && $template->suggested_due_offset_days !== null
                ? Carbon::parse($targetDate)->subDays($template->suggested_due_offset_days)
                : null,
            'metadata_json' => [
                'created_from_project_type_deliverable_template_id' => $template->id,
            ],
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
