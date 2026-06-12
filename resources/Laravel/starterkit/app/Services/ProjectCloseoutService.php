<?php

namespace App\Services;

use App\Enums\DeliverableStatus;
use App\Enums\ProjectStatus;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectActivityEvent;
use Illuminate\Validation\ValidationException;

class ProjectCloseoutService
{
    public function start(Project $project, Profile $actor): Project
    {
        if (in_array($project->lifecycle_status, [ProjectStatus::Closeout->value, ProjectStatus::Archived->value], true)) {
            throw ValidationException::withMessages(['closeout' => 'This project is already in closeout or archived.']);
        }

        if ($project->deliverables()->doesntExist()) {
            throw ValidationException::withMessages(['closeout' => 'Add and complete at least one deliverable before closeout.']);
        }

        if ($project->deliverables()->where('lifecycle_status', '!=', DeliverableStatus::Archived->value)->exists()) {
            throw ValidationException::withMessages(['closeout' => 'Every deliverable must be archived before project closeout begins.']);
        }

        $project->update(['lifecycle_status' => ProjectStatus::Closeout->value]);
        $this->activity($project, $actor, 'project_closeout_started', 'Started project closeout.');

        return $project->refresh();
    }

    public function update(Project $project, Profile $actor, array $attributes): Project
    {
        if ($project->lifecycle_status !== ProjectStatus::Closeout->value) {
            throw ValidationException::withMessages(['closeout' => 'The project must be in Closeout before updating its checklist.']);
        }

        $metadata = $project->metadata_json ?? [];
        $metadata['closeout'] = [
            'final_links_verified' => (bool) ($attributes['final_links_verified'] ?? false),
            'approvals_preserved' => (bool) ($attributes['approvals_preserved'] ?? false),
            'reusable_context_captured' => (bool) ($attributes['reusable_context_captured'] ?? false),
            'notes' => $attributes['notes'] ?? null,
            'updated_by_profile_id' => $actor->id,
            'updated_at' => now()->toIso8601String(),
        ];
        $project->update(['metadata_json' => $metadata]);
        $this->activity($project, $actor, 'project_closeout_updated', 'Updated the project closeout checklist.');

        return $project->refresh();
    }

    public function archive(Project $project, Profile $actor): Project
    {
        $closeout = data_get($project->metadata_json, 'closeout', []);
        if ($project->lifecycle_status !== ProjectStatus::Closeout->value || collect([
            'final_links_verified',
            'approvals_preserved',
            'reusable_context_captured',
        ])->contains(fn (string $key) => ! data_get($closeout, $key))) {
            throw ValidationException::withMessages(['closeout' => 'Complete every closeout checklist item before archiving the project.']);
        }

        $project->update([
            'lifecycle_status' => ProjectStatus::Archived->value,
            'archived_at' => now(),
        ]);
        $this->activity($project, $actor, 'project_archived', 'Archived the completed project.');

        return $project->refresh();
    }

    private function activity(Project $project, Profile $actor, string $eventType, string $description): void
    {
        ProjectActivityEvent::create([
            'organization_id' => $project->organization_id,
            'project_id' => $project->id,
            'actor_profile_id' => $actor->id,
            'event_type' => $eventType,
            'description' => $description,
            'occurred_at' => now(),
        ]);
    }
}
