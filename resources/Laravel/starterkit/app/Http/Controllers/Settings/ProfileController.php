<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ProfileUpdateRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('settings.profile', [
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
