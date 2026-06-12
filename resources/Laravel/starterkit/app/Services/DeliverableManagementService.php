<?php

namespace App\Services;

use App\Enums\DeliverableStatus;
use App\Models\Conversation;
use App\Models\Deliverable;
use App\Models\DeliverableReview;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectActivityEvent;
use App\Models\WorkNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DeliverableManagementService
{
    public function createDeliverable(Project $project, array $attributes, Profile $actor): Deliverable
    {
        $deliverable = $project->deliverables()->create(array_merge($attributes, [
            'organization_id' => $project->organization_id,
            'lifecycle_status' => DeliverableStatus::Proposed->value,
            'attention_state' => 'On Track',
        ]));

        ProjectActivityEvent::create([
            'organization_id' => $project->organization_id,
            'project_id' => $project->id,
            'deliverable_id' => $deliverable->id,
            'actor_profile_id' => $actor->id,
            'event_type' => 'deliverable_created',
            'description' => "Added deliverable \"{$deliverable->title}\".",
            'occurred_at' => now(),
        ]);

        if ($deliverable->owner_profile_id) {
            ProjectActivityEvent::create([
                'organization_id' => $project->organization_id,
                'project_id' => $project->id,
                'deliverable_id' => $deliverable->id,
                'actor_profile_id' => $actor->id,
                'event_type' => 'deliverable_owner_assigned',
                'description' => "Assigned owner for \"{$deliverable->title}\".",
                'occurred_at' => now(),
            ]);
        }

        return $deliverable->refresh();
    }

    public function updateDeliverable(Deliverable $deliverable, array $attributes, Profile $actor): Deliverable
    {
        $oldOwnerId = $deliverable->owner_profile_id;
        $oldReviewerId = $deliverable->internal_reviewer_profile_id;

        $deliverable->update($attributes);

        ProjectActivityEvent::create([
            'organization_id' => $deliverable->project->organization_id,
            'project_id' => $deliverable->project_id,
            'deliverable_id' => $deliverable->id,
            'actor_profile_id' => $actor->id,
            'event_type' => 'deliverable_updated',
            'description' => "Updated \"{$deliverable->title}\".",
            'occurred_at' => now(),
        ]);

        $newOwnerId = $attributes['owner_profile_id'] ?? null;
        if ($newOwnerId && (int) $newOwnerId !== (int) $oldOwnerId) {
            ProjectActivityEvent::create([
                'organization_id' => $deliverable->project->organization_id,
                'project_id' => $deliverable->project_id,
                'deliverable_id' => $deliverable->id,
                'actor_profile_id' => $actor->id,
                'event_type' => 'deliverable_owner_assigned',
                'description' => "Assigned owner for \"{$deliverable->title}\".",
                'occurred_at' => now(),
            ]);
        }

        $newReviewerId = $attributes['internal_reviewer_profile_id'] ?? null;
        if ($newReviewerId && (int) $newReviewerId !== (int) $oldReviewerId) {
            ProjectActivityEvent::create([
                'organization_id' => $deliverable->project->organization_id,
                'project_id' => $deliverable->project_id,
                'deliverable_id' => $deliverable->id,
                'actor_profile_id' => $actor->id,
                'event_type' => 'deliverable_reviewer_assigned',
                'description' => "Assigned reviewer for \"{$deliverable->title}\".",
                'occurred_at' => now(),
            ]);
        }

        if ($deliverable->conversation) {
            $this->syncConversationParticipants($deliverable->conversation, $deliverable);
        }

        return $deliverable->refresh();
    }

    public function moveToPlanningStatus(Deliverable $deliverable, Profile $actor): Deliverable
    {
        if ($deliverable->lifecycle_status !== DeliverableStatus::Proposed) {
            throw ValidationException::withMessages(['plan' => 'Only Proposed deliverables can move to Planning.']);
        }

        if (! $deliverable->owner_profile_id) {
            throw ValidationException::withMessages(['plan' => 'Assign an owner before moving to Planning.']);
        }

        if (! $deliverable->due_date) {
            throw ValidationException::withMessages(['plan' => 'Set a due date before moving to Planning.']);
        }

        $deliverable->update(['lifecycle_status' => DeliverableStatus::Planning->value]);

        ProjectActivityEvent::create([
            'organization_id' => $deliverable->project->organization_id,
            'project_id' => $deliverable->project_id,
            'deliverable_id' => $deliverable->id,
            'actor_profile_id' => $actor->id,
            'event_type' => 'deliverable_moved_to_planning',
            'description' => "Moved \"{$deliverable->title}\" to Planning.",
            'occurred_at' => now(),
        ]);

        $this->ensureConversation($deliverable, $actor);

        return $deliverable->refresh();
    }

    public function startProduction(Deliverable $deliverable, Profile $actor): Deliverable
    {
        if ($deliverable->lifecycle_status !== DeliverableStatus::Planning) {
            throw ValidationException::withMessages(['production' => 'Only Planning deliverables can move to In Production.']);
        }

        $deliverable->update(['lifecycle_status' => DeliverableStatus::InProduction->value]);
        $this->recordActivity($deliverable, $actor, 'deliverable_started_production', "Started production on \"{$deliverable->title}\".");

        return $deliverable->refresh();
    }

    public function submitForReview(Deliverable $deliverable, Profile $actor): Deliverable
    {
        return DB::transaction(function () use ($deliverable, $actor) {
            if (! in_array($deliverable->lifecycle_status, [
                DeliverableStatus::InProduction,
                DeliverableStatus::Revision,
            ], true)) {
                throw ValidationException::withMessages(['review' => 'This deliverable cannot be submitted for review from its current status.']);
            }

            $reviewers = collect([
                $deliverable->internal_reviewer_profile_id => 'Internal reviewer',
                $deliverable->stakeholder_reviewer_profile_id => 'Stakeholder reviewer',
            ])->filter(fn ($role, $profileId) => (bool) $profileId);

            if ($reviewers->isEmpty()) {
                $fallbackId = $deliverable->owner_profile_id ?: $deliverable->project->owner_profile_id;
                if ($fallbackId) {
                    $reviewers->put($fallbackId, 'Owner reviewer');
                }
            }

            if ($reviewers->isEmpty()) {
                throw ValidationException::withMessages(['review' => 'Assign a reviewer or owner before submitting for review.']);
            }

            $this->resolveReviewAlerts($deliverable);
            $roundNumber = ((int) $deliverable->reviews()->max('round_number')) + 1;

            foreach ($reviewers as $reviewerId => $reviewerRole) {
                DeliverableReview::create([
                    'organization_id' => $deliverable->organization_id,
                    'deliverable_id' => $deliverable->id,
                    'reviewer_profile_id' => $reviewerId,
                    'round_number' => $roundNumber,
                    'reviewer_role' => $reviewerRole,
                    'decision' => 'Pending',
                ]);

                WorkNotification::create([
                    'organization_id' => $deliverable->organization_id,
                    'recipient_profile_id' => $reviewerId,
                    'actor_profile_id' => $actor->id,
                    'notification_type' => 'Needs Approval',
                    'subject_type' => Deliverable::class,
                    'subject_id' => $deliverable->id,
                    'title' => "Needs approval: {$deliverable->title}",
                    'body' => 'Review the deliverable and approve it or request changes.',
                    'action_url' => route('deliverables.show', [$deliverable->project, $deliverable]),
                    'metadata_json' => ['round_number' => $roundNumber],
                ]);
            }

            $deliverable->update(['lifecycle_status' => DeliverableStatus::ReadyForReview->value]);
            $this->recordActivity($deliverable, $actor, 'deliverable_submitted_for_review', "Submitted \"{$deliverable->title}\" for review (round {$roundNumber}).");

            return $deliverable->refresh();
        });
    }

    public function recordReviewDecision(Deliverable $deliverable, Profile $actor, string $decision, ?string $notes): Deliverable
    {
        return DB::transaction(function () use ($deliverable, $actor, $decision, $notes) {
            if ($deliverable->lifecycle_status !== DeliverableStatus::ReadyForReview) {
                throw ValidationException::withMessages(['review' => 'This deliverable is not currently awaiting review.']);
            }

            $roundNumber = (int) $deliverable->reviews()->max('round_number');
            $review = $deliverable->reviews()
                ->where('round_number', $roundNumber)
                ->where('reviewer_profile_id', $actor->id)
                ->where('decision', 'Pending')
                ->first();

            if (! $review) {
                throw ValidationException::withMessages(['review' => 'You do not have a pending review for this deliverable.']);
            }

            if ($decision === 'Changes Requested' && ! filled($notes)) {
                throw ValidationException::withMessages(['notes' => 'Explain what needs to change.']);
            }

            $review->update([
                'decision' => $decision,
                'notes' => $notes,
                'decided_at' => now(),
            ]);
            $this->resolveReviewAlerts($deliverable, $actor->id);

            if ($decision === 'Changes Requested') {
                $deliverable->update(['lifecycle_status' => DeliverableStatus::Revision->value]);
                $this->resolveReviewAlerts($deliverable);
                $this->recordActivity($deliverable, $actor, 'deliverable_changes_requested', "Requested changes to \"{$deliverable->title}\".".($notes ? " {$notes}" : ''));
            } elseif (! $deliverable->reviews()->where('round_number', $roundNumber)->where('decision', 'Pending')->exists()) {
                $deliverable->update(['lifecycle_status' => DeliverableStatus::Approved->value]);
                $this->resolveReviewAlerts($deliverable);
                $this->recordActivity($deliverable, $actor, 'deliverable_approved', "Approved \"{$deliverable->title}\".".($notes ? " {$notes}" : ''));
            } else {
                $this->recordActivity($deliverable, $actor, 'deliverable_review_approved', "Approved \"{$deliverable->title}\" for review round {$roundNumber}.".($notes ? " {$notes}" : ''));
            }

            return $deliverable->refresh();
        });
    }

    public function startDelivery(Deliverable $deliverable, Profile $actor): Deliverable
    {
        return $this->transition(
            $deliverable,
            $actor,
            DeliverableStatus::Approved,
            DeliverableStatus::Delivery,
            'deliverable_started_delivery',
            "Started delivery for \"{$deliverable->title}\".",
        );
    }

    public function markPublished(Deliverable $deliverable, Profile $actor, ?string $deliveryNote): Deliverable
    {
        if ($deliverable->lifecycle_status !== DeliverableStatus::Delivery) {
            throw ValidationException::withMessages(['delivery' => 'Only Delivery deliverables can be marked published or delivered.']);
        }

        if (! filled($deliveryNote) && ! $deliverable->links()->exists()) {
            throw ValidationException::withMessages(['delivery_note' => 'Add a final link or delivery note before marking this deliverable published or delivered.']);
        }

        $metadata = $deliverable->metadata_json ?? [];
        if (filled($deliveryNote)) {
            $metadata['delivery_note'] = $deliveryNote;
        }

        $deliverable->update([
            'lifecycle_status' => DeliverableStatus::PublishedRunning->value,
            'metadata_json' => $metadata ?: null,
        ]);
        $this->recordActivity(
            $deliverable,
            $actor,
            'deliverable_published',
            "Marked \"{$deliverable->title}\" published / delivered.".($deliveryNote ? " {$deliveryNote}" : ''),
        );

        return $deliverable->refresh();
    }

    public function endDeliverable(Deliverable $deliverable, Profile $actor): Deliverable
    {
        return $this->transition(
            $deliverable,
            $actor,
            DeliverableStatus::PublishedRunning,
            DeliverableStatus::Ended,
            'deliverable_ended',
            "Ended \"{$deliverable->title}\".",
        );
    }

    public function archiveDeliverable(Deliverable $deliverable, Profile $actor): Deliverable
    {
        if ($deliverable->lifecycle_status !== DeliverableStatus::Ended) {
            throw ValidationException::withMessages(['archive' => 'Only Ended deliverables can be archived.']);
        }

        $deliverable->update([
            'lifecycle_status' => DeliverableStatus::Archived->value,
            'archived_at' => now(),
        ]);
        $this->recordActivity($deliverable, $actor, 'deliverable_archived', "Archived \"{$deliverable->title}\".");

        return $deliverable->refresh();
    }

    public function addConversationMessage(Deliverable $deliverable, Profile $actor, array $data): Message
    {
        $conversation = $this->ensureConversation($deliverable, $actor);
        $parentMessage = null;

        if ($data['parent_message_id'] ?? null) {
            $parentMessage = $conversation->messages()->find($data['parent_message_id']);

            if (! $parentMessage) {
                throw ValidationException::withMessages([
                    'parent_message_id' => 'The message being replied to does not belong to this deliverable.',
                ]);
            }

            if ($parentMessage->parent_message_id !== null) {
                $parentMessage = $conversation->messages()->findOrFail($parentMessage->parent_message_id);
            }
        }

        return $conversation->messages()->create([
            'organization_id' => $deliverable->organization_id,
            'author_profile_id' => $actor->id,
            'body' => $data['message'],
            'message_type' => 'Comment',
            'visibility' => 'Project Team',
            'parent_message_id' => $parentMessage?->id,
        ]);
    }

    public function ensureConversation(Deliverable $deliverable, Profile $actor): Conversation
    {
        $existing = $deliverable->conversation;
        if ($existing) {
            $this->syncConversationParticipants($existing, $deliverable);

            return $existing;
        }

        $project = $deliverable->project()->with('members')->first();

        $conversation = Conversation::create([
            'organization_id' => $deliverable->organization_id,
            'conversation_type' => 'Deliverable Discussion',
            'subject_type' => Deliverable::class,
            'subject_id' => $deliverable->id,
            'title' => $deliverable->title,
            'visibility' => 'Project Team',
            'status' => 'Open',
            'created_by_profile_id' => $actor->id,
        ]);

        $this->syncConversationParticipants($conversation, $deliverable, $project);

        return $conversation->refresh();
    }

    private function syncConversationParticipants(Conversation $conversation, Deliverable $deliverable, ?Project $project = null): void
    {
        $project ??= $deliverable->project()->with('members')->firstOrFail();

        foreach ($project->members->whereNotIn('project_role', ['Stakeholder', 'Reviewer']) as $member) {
            $conversation->participants()->firstOrCreate(
                ['profile_id' => $member->profile_id],
                [
                    'organization_id' => $deliverable->organization_id,
                    'participant_role' => $member->project_role === 'Coordinator' ? 'coordinator' : 'contributor',
                ],
            );
        }

        foreach ([$deliverable->owner_profile_id, $deliverable->internal_reviewer_profile_id] as $profileId) {
            if ($profileId) {
                $conversation->participants()->firstOrCreate(
                    ['profile_id' => $profileId],
                    [
                        'organization_id' => $deliverable->organization_id,
                        'participant_role' => 'contributor',
                    ],
                );
            }
        }
    }

    private function resolveReviewAlerts(Deliverable $deliverable, ?int $recipientProfileId = null): void
    {
        WorkNotification::query()
            ->where('subject_type', Deliverable::class)
            ->where('subject_id', $deliverable->id)
            ->where('notification_type', 'Needs Approval')
            ->whereNull('read_at')
            ->when($recipientProfileId, fn ($query) => $query->where('recipient_profile_id', $recipientProfileId))
            ->update(['read_at' => now()]);
    }

    private function recordActivity(Deliverable $deliverable, Profile $actor, string $eventType, string $description): void
    {
        ProjectActivityEvent::create([
            'organization_id' => $deliverable->organization_id,
            'project_id' => $deliverable->project_id,
            'deliverable_id' => $deliverable->id,
            'actor_profile_id' => $actor->id,
            'event_type' => $eventType,
            'description' => $description,
            'occurred_at' => now(),
        ]);
    }

    private function transition(
        Deliverable $deliverable,
        Profile $actor,
        DeliverableStatus $from,
        DeliverableStatus $to,
        string $eventType,
        string $description,
    ): Deliverable {
        if ($deliverable->lifecycle_status !== $from) {
            throw ValidationException::withMessages([
                'lifecycle' => "Only {$from->value} deliverables can move to {$to->value}.",
            ]);
        }

        $deliverable->update(['lifecycle_status' => $to->value]);
        $this->recordActivity($deliverable, $actor, $eventType, $description);

        return $deliverable->refresh();
    }
}
