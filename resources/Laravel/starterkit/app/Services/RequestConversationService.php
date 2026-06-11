<?php

namespace App\Services;

use App\Models\Message;
use App\Models\MinistryRequest;
use App\Models\Profile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class RequestConversationService
{
    public function addMessage(
        MinistryRequest $request,
        Profile $author,
        string $body,
        string $messageType = 'Comment',
        ?int $parentMessageId = null,
    ): Message {
        if ($request->organization_id !== $author->organization_id) {
            throw ValidationException::withMessages([
                'message' => 'The message author must belong to the request organization.',
            ]);
        }

        return DB::transaction(function () use ($request, $author, $body, $messageType, $parentMessageId) {
            $conversation = $request->conversation()->firstOrCreate(
                [],
                [
                    'organization_id' => $request->organization_id,
                    'conversation_type' => 'Request Discussion',
                    'title' => $request->title,
                    'visibility' => 'Requester Visible',
                    'status' => 'Open',
                    'created_by_profile_id' => $author->id,
                ],
            );

            $this->syncParticipants($request);

            $parentMessage = $parentMessageId === null
                ? null
                : $conversation->messages()->find($parentMessageId);

            if ($parentMessageId !== null && $parentMessage === null) {
                throw ValidationException::withMessages([
                    'parent_message_id' => 'The message being replied to does not belong to this request.',
                ]);
            }

            if ($parentMessage?->parent_message_id !== null) {
                $parentMessage = $conversation->messages()->findOrFail($parentMessage->parent_message_id);
            }

            $conversation->participants()->firstOrCreate(
                ['profile_id' => $author->id],
                [
                    'organization_id' => $request->organization_id,
                    'participant_role' => 'participant',
                ],
            );

            $message = $conversation->messages()->create([
                'organization_id' => $request->organization_id,
                'author_profile_id' => $author->id,
                'body' => $body,
                'message_type' => $messageType,
                'visibility' => 'Requester Visible',
                'parent_message_id' => $parentMessage?->id,
            ]);

            $conversation->participants()
                ->where('profile_id', $author->id)
                ->update(['last_read_at' => now()]);

            $request->touch();

            return $message;
        });
    }

    /**
     * @param  Collection<int, Profile>|null  $reviewers
     */
    public function syncParticipants(MinistryRequest $request, ?Collection $reviewers = null): void
    {
        $reviewers ??= $this->reviewersFor($request);

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

        $participants = collect([$request->requesterProfile, $request->assignedManagerProfile])
            ->merge($reviewers)
            ->filter()
            ->unique('id');

        foreach ($participants as $profile) {
            $role = match (true) {
                $profile->id === $request->requester_profile_id => 'requester',
                $profile->id === $request->assigned_manager_profile_id => 'manager',
                default => 'reviewer',
            };

            $conversation->participants()->updateOrCreate(
                ['profile_id' => $profile->id],
                [
                    'organization_id' => $request->organization_id,
                    'participant_role' => $role,
                ],
            );
        }

        $conversation->participants()
            ->where('participant_role', 'reviewer')
            ->whereNotIn('profile_id', $reviewers->pluck('id'))
            ->delete();
    }

    /**
     * @return Collection<int, Profile>
     */
    private function reviewersFor(MinistryRequest $request): Collection
    {
        $reviewerIds = collect($request->answers()
            ->where('question_key', 'reviewers_approvals')
            ->value('answer_json') ?? [])
            ->pluck('profile_id')
            ->filter();

        return Profile::query()
            ->where('organization_id', $request->organization_id)
            ->where('status', 'Active')
            ->whereIn('id', $reviewerIds)
            ->get();
    }
}
