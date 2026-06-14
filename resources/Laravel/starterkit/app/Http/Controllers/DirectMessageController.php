<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\ConversationParticipant;
use App\Models\Message;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DirectMessageController extends Controller
{
    public function store(Request $request, Profile $profile): RedirectResponse
    {
        $currentProfile = $request->user()
            ->profiles()
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($currentProfile, 403);
        abort_if($profile->id === $currentProfile->id, 403);
        abort_if($profile->organization_id !== $currentProfile->organization_id, 403);

        $conversation = $this->findOrCreateDirectConversation($currentProfile, $profile);

        return redirect()->route('conversations.show', $conversation);
    }

    public function show(Request $request, Conversation $conversation): View
    {
        $currentProfile = $request->user()
            ->profiles()
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($currentProfile, 403);

        $participant = $conversation->participants()
            ->where('profile_id', $currentProfile->id)
            ->first();

        abort_unless($participant, 403);

        $participant->update(['last_read_at' => now()]);

        $messages = $conversation->messages()->with('authorProfile')->get();

        $otherProfile = $conversation->participants()
            ->with('profile')
            ->where('profile_id', '!=', $currentProfile->id)
            ->first()
            ?->profile;

        return view('conversations.show', [
            'conversation' => $conversation,
            'messages' => $messages,
            'currentProfile' => $currentProfile,
            'otherProfile' => $otherProfile,
        ]);
    }

    public function reply(Request $request, Conversation $conversation): RedirectResponse
    {
        $request->validate(['body' => ['required', 'string', 'max:10000']]);

        $currentProfile = $request->user()
            ->profiles()
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($currentProfile, 403);

        $isParticipant = $conversation->participants()
            ->where('profile_id', $currentProfile->id)
            ->exists();

        abort_unless($isParticipant, 403);

        Message::create([
            'organization_id' => $currentProfile->organization_id,
            'conversation_id' => $conversation->id,
            'author_profile_id' => $currentProfile->id,
            'body' => $request->string('body')->trim(),
            'message_type' => 'direct',
            'visibility' => 'Direct',
        ]);

        $conversation->touch();

        return redirect()->route('conversations.show', $conversation)->with('scrollToBottom', true);
    }

    private function findOrCreateDirectConversation(Profile $a, Profile $b): Conversation
    {
        $existing = Conversation::where('conversation_type', 'Direct')
            ->where('organization_id', $a->organization_id)
            ->whereHas('participants', fn ($q) => $q->where('profile_id', $a->id))
            ->whereHas('participants', fn ($q) => $q->where('profile_id', $b->id))
            ->first();

        if ($existing) {
            return $existing;
        }

        $conversation = Conversation::create([
            'organization_id' => $a->organization_id,
            'conversation_type' => 'Direct',
            'visibility' => 'Direct',
            'title' => $a->display_name.' & '.$b->display_name,
            'status' => 'Active',
            'created_by_profile_id' => $a->id,
        ]);

        ConversationParticipant::create([
            'organization_id' => $a->organization_id,
            'conversation_id' => $conversation->id,
            'profile_id' => $a->id,
            'participant_role' => 'member',
        ]);

        ConversationParticipant::create([
            'organization_id' => $a->organization_id,
            'conversation_id' => $conversation->id,
            'profile_id' => $b->id,
            'participant_role' => 'member',
        ]);

        return $conversation;
    }
}
