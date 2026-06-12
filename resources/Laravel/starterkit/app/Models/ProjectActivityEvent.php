<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectActivityEvent extends Model
{
    protected $fillable = [
        'organization_id',
        'project_id',
        'deliverable_id', 'task_id',
        'actor_profile_id',
        'event_type',
        'description',
        'metadata_json',
        'occurred_at',
    ];

    protected function casts(): array
    {
        return [
            'metadata_json' => 'array',
            'occurred_at' => 'datetime',
        ];
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function deliverable(): BelongsTo
    {
        return $this->belongsTo(Deliverable::class);
    }

    public function actorProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'actor_profile_id');
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function icon(): string
    {
        return match ($this->event_type) {
            'deliverable_moved_to_planning' => 'tabler--clipboard-check',
            'deliverable_started_production' => 'tabler--tools',
            'deliverable_updated' => 'tabler--pencil',
            'deliverable_owner_assigned' => 'tabler--user-check',
            'deliverable_reviewer_assigned' => 'tabler--user-plus',
            'deliverable_submitted_for_review' => 'tabler--send',
            'deliverable_review_approved', 'deliverable_approved' => 'tabler--circle-check',
            'deliverable_changes_requested' => 'tabler--message-exclamation',
            'deliverable_started_delivery' => 'tabler--truck-delivery',
            'deliverable_published' => 'tabler--world-upload',
            'deliverable_ended' => 'tabler--player-stop',
            'deliverable_archived' => 'tabler--archive',
            'deliverable_created' => 'tabler--package',
            'project_status_updated' => 'tabler--progress-check',
            'project_schedule_reordered', 'project_schedule_dates_updated' => 'tabler--calendar-time',
            'project_closeout_started', 'project_closeout_updated' => 'tabler--clipboard-check',
            'project_archived' => 'tabler--archive',
            'task_created' => 'tabler--list-check',
            'task_updated' => 'tabler--pencil',
            'task_blocked' => 'tabler--alert-triangle',
            'task_unblocked' => 'tabler--circle-check',
            'task_completed' => 'tabler--check',
            default => 'tabler--activity',
        };
    }

    public function color(): string
    {
        return match ($this->event_type) {
            'deliverable_moved_to_planning' => 'text-primary',
            'deliverable_started_production' => 'text-warning',
            'deliverable_updated' => 'text-default-500',
            'deliverable_owner_assigned', 'deliverable_reviewer_assigned' => 'text-success',
            'deliverable_submitted_for_review' => 'text-info',
            'deliverable_review_approved', 'deliverable_approved' => 'text-success',
            'deliverable_changes_requested' => 'text-danger',
            'deliverable_started_delivery', 'deliverable_published' => 'text-primary',
            'deliverable_ended', 'deliverable_archived' => 'text-default-500',
            'deliverable_created' => 'text-warning',
            'project_status_updated' => 'text-primary',
            'project_schedule_reordered', 'project_schedule_dates_updated' => 'text-info',
            'project_closeout_started', 'project_closeout_updated' => 'text-warning',
            'project_archived' => 'text-default-500',
            'task_blocked' => 'text-danger',
            'task_completed', 'task_unblocked' => 'text-success',
            'task_created', 'task_updated' => 'text-primary',
            default => 'text-default-400',
        };
    }

    public function title(): string
    {
        return match ($this->event_type) {
            'deliverable_moved_to_planning' => 'Moved to Planning',
            'deliverable_started_production' => 'Production started',
            'deliverable_updated' => 'Deliverable updated',
            'deliverable_owner_assigned' => 'Owner assigned',
            'deliverable_reviewer_assigned' => 'Reviewer assigned',
            'deliverable_submitted_for_review' => 'Submitted for review',
            'deliverable_review_approved' => 'Review approved',
            'deliverable_approved' => 'Deliverable approved',
            'deliverable_changes_requested' => 'Changes requested',
            'deliverable_started_delivery' => 'Delivery started',
            'deliverable_published' => 'Published / delivered',
            'deliverable_ended' => 'Deliverable ended',
            'deliverable_archived' => 'Deliverable archived',
            'deliverable_created' => 'Deliverable added',
            'project_status_updated' => 'Project status updated',
            'project_schedule_reordered' => 'Project schedule reordered',
            'project_schedule_dates_updated' => 'Project schedule dates updated',
            'project_closeout_started' => 'Project closeout started',
            'project_closeout_updated' => 'Project closeout updated',
            'project_archived' => 'Project archived',
            'task_created' => 'Task added',
            'task_updated' => 'Task updated',
            'task_blocked' => 'Task blocked',
            'task_unblocked' => 'Task unblocked',
            'task_completed' => 'Task completed',
            default => 'Activity recorded',
        };
    }
}
