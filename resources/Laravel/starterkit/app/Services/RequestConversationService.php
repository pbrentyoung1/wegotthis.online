<?php

namespace App\Services;

use App\Models\Message;
use App\Models\MinistryRequest;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class RequestConversationService
{
    public function addMessage(MinistryRequest $request, Profile $author, string $body, string $messageType = 'Comment'): Message
    {
        if ($request->organization_id !== $author->organization_id) {
            throw ValidationException::withMessages([
                'message' => 'The message author must belong to the request organization.',
            ]);
        }

        return DB::transaction(function () use ($request, $author, $body, $messageType) {
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

            foreach (collect([$request->requesterProfile, $request->assignedManagerProfile, $author])->filter()->unique('id') as $profile) {
                $conversation->participants()->firstOrCreate(
                    ['profile_id' => $profile->id],
                    [
                        'organization_id' => $request->organization_id,
                        'participant_role' => $profile->id === $request->requester_profile_id ? 'requester' : 'participant',
                    ],
                );
            }

            $message = $conversation->messages()->create([
                'organization_id' => $request->organization_id,
                'author_profile_id' => $author->id,
                'body' => $body,
                'message_type' => $messageType,
                'visibility' => 'Requester Visible',
            ]);

            $conversation->participants()
                ->where('profile_id', $author->id)
                ->update(['last_read_at' => now()]);

            $request->touch();

            return $message;
        });
    }
}
