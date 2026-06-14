<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Profile;
use App\Models\ProfileRoleAssignment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserInviteController extends Controller
{
    public function create(Request $request): View
    {
        $profile = $request->user()->profiles()->where('status', 'Active')->orderBy('id')->first();

        abort_unless($profile?->hasPermission('users.invite'), 403);

        $departments = Department::where('organization_id', $profile->organization_id)
            ->orderBy('name')
            ->get();

        $roles = Role::where(function ($q) use ($profile) {
                $q->whereNull('organization_id')
                    ->orWhere('organization_id', $profile->organization_id);
            })
            ->orderBy('name')
            ->get();

        return view('users.create', compact('departments', 'roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $profile = $request->user()->profiles()->where('status', 'Active')->orderBy('id')->first();

        abort_unless($profile?->hasPermission('users.invite'), 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'display_name' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'department_id' => ['nullable', 'exists:departments,id'],
            'person_type' => ['required', 'string'],
            'role_id' => ['nullable', 'integer', 'exists:roles,id'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make(Str::random(24)),
        ]);

        $newProfile = Profile::create([
            'organization_id' => $profile->organization_id,
            'user_id' => $user->id,
            'display_name' => filled($validated['display_name']) ? $validated['display_name'] : $validated['name'],
            'title' => $validated['title'] ?? null,
            'department_id' => $validated['department_id'] ?? null,
            'person_type' => $validated['person_type'],
            'status' => 'Active',
        ]);

        if (filled($validated['role_id'] ?? null)) {
            ProfileRoleAssignment::create([
                'organization_id' => $profile->organization_id,
                'profile_id' => $newProfile->id,
                'role_id' => $validated['role_id'],
                'assigned_by_profile_id' => $profile->id,
                'assigned_at' => now(),
            ]);
        }

        Password::broker()->sendResetLink(['email' => $validated['email']]);

        return redirect()->route('people.index')
            ->with('success', $validated['name'].' has been added and will receive an email to set their password.');
    }
}
