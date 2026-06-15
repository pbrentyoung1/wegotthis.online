<?php

namespace App\Http\Controllers\Settings;

use App\Enums\TaskStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ProfileUpdateRequest;
use App\Models\Conversation;
use App\Models\Deliverable;
use App\Models\MinistryRequest;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(Request $request): View
    {
        $profile = $this->profileFor($request);

        $myTasks = $profile ? Task::query()
            ->where('organization_id', $profile->organization_id)
            ->where('assigned_to_profile_id', $profile->id)
            ->whereNotIn('status', [TaskStatus::Done->value, TaskStatus::Canceled->value])
            ->with(['deliverable.project'])
            ->orderByRaw("CASE WHEN status = 'Blocked' THEN 0 WHEN status = 'In Progress' THEN 1 ELSE 2 END")
            ->orderByRaw("CASE priority WHEN 'Urgent' THEN 0 WHEN 'High' THEN 1 ELSE 2 END")
            ->orderBy('due_date')
            ->limit(8)
            ->get()
            : collect();

        $myConversations = $profile ? Conversation::whereHas(
                'participants',
                fn ($q) => $q->where('profile_id', $profile->id)
            )
            ->whereHas('messages')
            ->with([
                'participants' => fn ($q) => $q->where('profile_id', $profile->id),
                'latestMessage',
                'subject' => fn (MorphTo $morphTo) => $morphTo->morphWith([
                    MinistryRequest::class => [],
                    Project::class => [],
                    Deliverable::class => ['project'],
                    Task::class => ['deliverable.project'],
                ]),
            ])
            ->latest()
            ->limit(8)
            ->get()
            ->map(function ($conversation) {
                $participant = $conversation->participants->first();
                $unread = is_null($participant?->last_read_at)
                    || $participant?->last_read_at < $conversation->updated_at;

                return [
                    'title' => $conversation->title,
                    'preview' => $conversation->latestMessage?->textPreview(70),
                    'unread' => $unread,
                    'url' => $conversation->url(),
                    'updated_at' => $conversation->updated_at,
                ];
            })
            : collect();

        return view('profile.show', [
            'profile' => $profile,
            'myTasks' => $myTasks,
            'myConversations' => $myConversations,
        ]);
    }

    public function edit(Request $request): View
    {
        return view('settings.account', [
            'profile' => $this->profileFor($request),
            'status' => $request->session()->get('status'),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = $request->user();

        $user->fill(Arr::only($validated, ['name', 'email']));

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $profile = $this->profileFor($request);

        if ($profile) {
            $profile->update(Arr::only($validated, [
                'display_name',
                'title',
                'phone',
                'bio',
            ]));
        }

        return to_route('profile.edit')->with('status', 'Your profile has been updated.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', Password::min(8), 'confirmed'],
        ]);

        $user = $request->user();

        if (! Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
        }

        $user->update(['password' => Hash::make($request->password)]);

        return to_route('profile.edit')->with('status', 'Your password has been updated.');
    }

    public function updateAvatar(Request $request): JsonResponse
    {
        $request->validate([
            'avatar' => ['required', 'image', 'max:4096'],
        ]);

        $profile = $this->profileFor($request);
        abort_unless($profile, 403);

        $path = $request->file('avatar')->store('avatars', 'public');
        $url = Storage::url($path);
        $profile->update(['avatar_url' => $url]);

        return response()->json(['url' => $url]);
    }

    public function updateBanner(Request $request): JsonResponse
    {
        $request->validate([
            'banner' => ['required', 'image', 'max:6144'],
        ]);

        $profile = $this->profileFor($request);
        abort_unless($profile, 403);

        $path = $request->file('banner')->store('banners', 'public');
        $url = Storage::url($path);
        $profile->update(['banner_url' => $url]);

        return response()->json(['url' => $url]);
    }

    private function profileFor(Request $request): ?Profile
    {
        return $request->user()
            ->profiles()
            ->with(['department', 'organization', 'roleAssignments.role'])
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();
    }
}
