<?php

namespace App\Services;

use App\Enums\TaskStatus;
use App\Enums\TaskType;
use App\Models\Deliverable;
use App\Models\Profile;
use App\Models\ProjectActivityEvent;
use App\Models\Task;
use App\Models\WorkNotification;
use Illuminate\Support\Facades\DB;

class TaskManagementService
{
    public function create(Deliverable $deliverable, array $attributes, Profile $actor): Task
    {
        return DB::transaction(function () use ($deliverable, $attributes, $actor) {
            $attributes = $this->withTaskTypeMetadata($attributes);
            $task = $deliverable->tasks()->create(array_merge($attributes, [
                'organization_id' => $deliverable->organization_id,
                'status' => $attributes['status'] ?? TaskStatus::NotStarted->value,
                'priority' => $attributes['priority'] ?? 'Normal',
                'sort_order' => $attributes['sort_order'] ?? ($deliverable->tasks()->max('sort_order') + 1),
            ]));

            $this->recordActivity($task, $actor, 'task_created', "Added task \"{$task->title}\".");
            $this->handleStatusEffects($task, null, $actor);

            return $task->refresh();
        });
    }

    public function update(Task $task, array $attributes, Profile $actor): Task
    {
        return DB::transaction(function () use ($task, $attributes, $actor) {
            $oldStatus = $task->status;
            $attributes = $this->withTaskTypeMetadata($attributes, $task);

            if (($attributes['status'] ?? null) === TaskStatus::Done->value) {
                $attributes['completed_by_profile_id'] = $actor->id;
                $attributes['completed_at'] = now();
            } elseif (($attributes['status'] ?? null) !== TaskStatus::Done->value) {
                $attributes['completed_by_profile_id'] = null;
                $attributes['completed_at'] = null;
            }

            if (($attributes['status'] ?? null) !== TaskStatus::Blocked->value) {
                $attributes['blocker_type'] = null;
                $attributes['blocker_reason'] = null;
            }

            $task->update($attributes);

            $eventType = $task->status === TaskStatus::Done ? 'task_completed' : 'task_updated';
            $this->recordActivity($task, $actor, $eventType, "Updated task \"{$task->title}\".");
            $this->handleStatusEffects($task, $oldStatus, $actor);

            return $task->refresh();
        });
    }

    private function withTaskTypeMetadata(array $attributes, ?Task $task = null): array
    {
        $hasTaskType = array_key_exists('task_type', $attributes);
        $taskType = $attributes['task_type'] ?? null;
        unset($attributes['task_type']);

        if ($task && ! $hasTaskType) {
            return $attributes;
        }

        $metadata = $task?->metadata_json ?? [];
        if ($taskType === TaskType::Clarification->value) {
            $metadata['task_type'] = TaskType::Clarification->value;
        } else {
            unset($metadata['task_type']);
        }
        $attributes['metadata_json'] = $metadata ?: null;

        return $attributes;
    }

    private function handleStatusEffects(Task $task, ?TaskStatus $oldStatus, Profile $actor): void
    {
        if ($task->status === TaskStatus::Blocked && $oldStatus !== TaskStatus::Blocked) {
            $this->recordActivity($task, $actor, 'task_blocked', "\"{$task->title}\" is blocked: {$task->blocker_reason}");
            $this->notifyUpChain($task, $actor, 'Blocked', "Blocked: {$task->blocker_reason}");
        }

        if ($oldStatus === TaskStatus::Blocked && $task->status !== TaskStatus::Blocked) {
            $this->recordActivity($task, $actor, 'task_unblocked', "\"{$task->title}\" is no longer blocked.");
            $this->resolveBlockedAlerts($task);
        }

        if ($oldStatus === TaskStatus::ReadyForReview && $task->status !== TaskStatus::ReadyForReview) {
            $this->resolveReviewAlerts($task);
        }

        if ($task->status === TaskStatus::ReadyForReview && $oldStatus !== TaskStatus::ReadyForReview) {
            $this->recordActivity($task, $actor, 'task_submitted_for_review', "\"{$task->title}\" is ready for review.");
            $this->notifyReviewer($task, $actor);
        }

        $this->syncParentAttention($task->deliverable);
    }

    private function notifyReviewer(Task $task, Profile $actor): void
    {
        $deliverable = $task->deliverable;
        $reviewerId = $deliverable->owner_profile_id ?: $deliverable->project->owner_profile_id;

        if (! $reviewerId) {
            return;
        }

        WorkNotification::create([
            'organization_id' => $task->organization_id,
            'recipient_profile_id' => $reviewerId,
            'actor_profile_id' => $actor->id,
            'notification_type' => 'Needs Approval',
            'subject_type' => Task::class,
            'subject_id' => $task->id,
            'title' => "Needs approval: {$task->title}",
            'body' => 'Review the submitted work, then move the task to Done or return it to active work.',
            'action_url' => route('tasks.show', [$deliverable->project, $deliverable, $task]),
        ]);
    }

    private function resolveReviewAlerts(Task $task): void
    {
        WorkNotification::query()
            ->where('subject_type', Task::class)
            ->where('subject_id', $task->id)
            ->where('notification_type', 'Needs Approval')
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }

    private function syncParentAttention(Deliverable $deliverable): void
    {
        $deliverableBlocked = $deliverable->tasks()->where('status', TaskStatus::Blocked->value)->exists();
        if ($deliverableBlocked) {
            if ($deliverable->attention_state !== 'Blocked') {
                $metadata = $deliverable->metadata_json ?? [];
                $metadata['task_blocked_previous_attention_state'] = $deliverable->attention_state;
                $deliverable->update(['attention_state' => 'Blocked', 'metadata_json' => $metadata]);
            }
        } elseif ($deliverable->attention_state === 'Blocked') {
            $metadata = $deliverable->metadata_json ?? [];
            $attentionState = $metadata['task_blocked_previous_attention_state'] ?? 'On Track';
            unset($metadata['task_blocked_previous_attention_state']);
            $deliverable->update(['attention_state' => $attentionState, 'metadata_json' => $metadata]);
        }

        $project = $deliverable->project;
        $projectBlocked = Task::query()
            ->whereHas('deliverable', fn ($query) => $query->where('project_id', $project->id))
            ->where('status', TaskStatus::Blocked->value)
            ->exists();
        if ($projectBlocked) {
            if ($project->attention_state !== 'Blocked') {
                $metadata = $project->metadata_json ?? [];
                $metadata['task_blocked_previous_attention_state'] = $project->attention_state;
                $project->update(['attention_state' => 'Blocked', 'metadata_json' => $metadata]);
            }
        } elseif ($project->attention_state === 'Blocked') {
            $metadata = $project->metadata_json ?? [];
            $attentionState = $metadata['task_blocked_previous_attention_state'] ?? 'On Track';
            unset($metadata['task_blocked_previous_attention_state']);
            $project->update(['attention_state' => $attentionState, 'metadata_json' => $metadata]);
        }
    }

    private function notifyUpChain(Task $task, Profile $actor, string $state, string $body): void
    {
        $deliverable = $task->deliverable;
        $project = $deliverable->project;
        $recipientIds = collect([
            $task->assigned_to_profile_id,
            $deliverable->owner_profile_id,
            $project->owner_profile_id,
        ])->merge(
            $project->members()
                ->whereIn('project_role', ['Coordinator', 'Admin'])
                ->pluck('profile_id'),
        )->filter()->unique();

        foreach ($recipientIds as $recipientId) {
            WorkNotification::create([
                'organization_id' => $task->organization_id,
                'recipient_profile_id' => $recipientId,
                'actor_profile_id' => $actor->id,
                'notification_type' => $state,
                'subject_type' => Task::class,
                'subject_id' => $task->id,
                'title' => "{$state}: {$task->title}",
                'body' => $body,
                'action_url' => route('tasks.show', [$project, $deliverable, $task]),
                'metadata_json' => ['blocker_type' => $task->blocker_type],
            ]);
        }
    }

    private function resolveBlockedAlerts(Task $task): void
    {
        WorkNotification::query()
            ->where('subject_type', Task::class)
            ->where('subject_id', $task->id)
            ->where('notification_type', 'Blocked')
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }

    private function recordActivity(Task $task, Profile $actor, string $eventType, string $description): void
    {
        ProjectActivityEvent::create([
            'organization_id' => $task->organization_id,
            'project_id' => $task->deliverable->project_id,
            'deliverable_id' => $task->deliverable_id,
            'task_id' => $task->id,
            'actor_profile_id' => $actor->id,
            'event_type' => $eventType,
            'description' => $description,
            'occurred_at' => now(),
        ]);
    }
}
