# Direct Messages — Implementation Plan

## Summary

Add a "Send message" button to the people profile page (`/people/{profile}`) that opens a one-to-one direct message thread between the current user's profile and the viewed profile. The thread should behave like a simple inbox/DM, reusing the existing `Conversation`, `ConversationParticipant`, and `Message` models.

No real-time (WebSockets) in this pass — page-refresh-based posting is acceptable for MVP.

---

## What Already Exists

- `Conversation` model with `conversation_type`, `subject` morph, `visibility`
- `ConversationParticipant` with `profile_id`, `last_read_at`
- `Message` model with Quill Delta `body`, `Message::textPreview()`
- `Conversation::url()` already returns a routable URL
- Topbar already surfaces unread conversation counts
- Profile show page (`/profile`) already has a "Messages" card listing recent conversations

---

## New conversation type: `Direct`

The `conversation_type` field already accepts free strings. Use `'Direct'` for one-to-one DMs. No migration needed — the column is already there.

A direct conversation has:
- `conversation_type = 'Direct'`
- `visibility = 'Direct'` (new value — currently `'Project Team'` or `'External'`)
- No `subject` morph (nullable)
- Exactly two `ConversationParticipant` rows

**Find-or-create logic**: Before creating a new DM, check for an existing Direct conversation where both profile IDs are participants. This prevents duplicates.

---

## Files to Create

### `app/Http/Controllers/DirectMessageController.php`

Two actions:

**`store(Request $request, Profile $profile): RedirectResponse`**
- Resolves `$currentProfile` from auth user (active profile, same org)
- Aborts 403 if no current profile, or if target is same person, or different org
- Calls `findOrCreateDirectConversation($currentProfile, $profile)`
- Redirects to `conversations.show`

**`show(Request $request, Conversation $conversation): View`**
- Verifies current profile is a participant (403 otherwise)
- Marks `last_read_at = now()` for the participant row
- Loads messages oldest-first, with sender profile
- Returns `conversations.show` view

**`reply(Request $request, Conversation $conversation): RedirectResponse`**
- Validates `body` (required string)
- Verifies current profile is a participant
- Creates a `Message` (sender_profile_id, body, conversation_id)
- Updates `conversation->touch()` so topbar sort order updates
- Redirects back to `conversations.show`

Helper method: `findOrCreateDirectConversation(Profile $a, Profile $b): Conversation`
- Queries for a Direct conversation where both $a->id and $b->id are participants
- Creates one (with both participants) if none found

### `resources/views/conversations/show.blade.php`

- Standard shell: topbar + sidenav + page-title (`subtitle = "Messages"`)
- Left: list of other participant(s) — name, avatar
- Right/main: messages thread (oldest at top)
  - Each message: avatar, display name, timestamp, Quill-rendered body
  - Current user's messages right-aligned or highlighted
- Reply form at bottom: Quill editor, submit button
- "Back to messages" link → `/messages` (inbox, built later or stubbed)

---

## Files to Modify

### `routes/web.php`

```php
Route::post('/messages/{profile}', [DirectMessageController::class, 'store'])->name('messages.store');
Route::get('/conversations/{conversation}', [DirectMessageController::class, 'show'])->name('conversations.show');
Route::post('/conversations/{conversation}/reply', [DirectMessageController::class, 'reply'])->name('conversations.reply');
```

### `resources/views/people/show.blade.php`

Add "Send message" button to the hero card quick-actions area (alongside "Send email"), but only if the viewed profile is not the current user's own profile (own profile redirects to `/profile` anyway, but guard it for clarity):

```blade
@if ($profile->id !== $currentProfile->id)
    <form action="{{ route('messages.store', $profile) }}" method="POST">
        @csrf
        <button class="btn btn-sm bg-light text-default-700 mb-1" type="submit">
            <i class="iconify tabler--message me-1.5 size-4"></i>Send message
        </button>
    </form>
@endif
```

### `Conversation::url()`

Ensure it returns `route('conversations.show', $this)` for Direct conversations.

### `app/Models/Conversation.php`

Add a scope for finding direct threads:

```php
public function scopeDirect(Builder $query): Builder
{
    return $query->where('conversation_type', 'Direct');
}
```

---

## Deferred (post-MVP)

- `/messages` inbox page (list all DMs, sorted by latest activity)
- Real-time updates via Laravel Reverb or Pusher
- Group DMs (more than two participants)
- Read receipts visible to sender
- Message reactions / threads

---

## Test cases to write (`tests/Feature/DirectMessageTest.php`)

1. Authenticated user can start a DM with another org member → redirects to conversation
2. Starting a second DM with same person reuses existing conversation (no duplicate)
3. User cannot start a DM with someone from a different org (403)
4. Conversation show page renders messages in order
5. Reply creates a message and redirects back
6. Non-participant cannot view the conversation (403)
7. Viewing the conversation marks it as read (`last_read_at` updated)
