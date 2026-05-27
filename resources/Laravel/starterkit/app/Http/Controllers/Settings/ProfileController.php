<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ProfileDeleteRequest;
use App\Http\Requests\Settings\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Show the user's profile settings page.
     */
    public function edit(Request $request): Response
    {
        $request->user()->loadMissing('profile');

        return Inertia::render('admin/settings/profile', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'profile' => [
                'jobTitle' => $request->user()->profile?->job_title,
                'department' => $request->user()->profile?->department,
                'phone' => $request->user()->profile?->phone,
                'city' => $request->user()->profile?->city,
                'state' => $request->user()->profile?->state,
                'country' => $request->user()->profile?->country,
                'timezone' => $request->user()->profile?->timezone,
                'website' => $request->user()->profile?->website,
                'avatarPath' => $request->user()->profile?->avatar_path,
                'bio' => $request->user()->profile?->bio,
                'facebookUrl' => $request->user()->profile?->facebook_url,
                'instagramHandle' => $request->user()->profile?->instagram_handle,
                'linkedinUrl' => $request->user()->profile?->linkedin_url,
                'xHandle' => $request->user()->profile?->x_handle,
            ],
            'status' => $request->session()->get('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->fill(Arr::only($validated, ['name', 'email']));

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        $request->user()->profile()->updateOrCreate(
            [],
            Arr::only($validated, [
                'job_title',
                'department',
                'phone',
                'city',
                'state',
                'country',
                'timezone',
                'website',
                'bio',
                'facebook_url',
                'instagram_handle',
                'linkedin_url',
                'x_handle',
            ])
        );

        return to_route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's profile.
     */
    public function destroy(ProfileDeleteRequest $request): RedirectResponse
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
