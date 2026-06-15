<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PeopleDirectoryController extends Controller
{
    public function index(Request $request): View
    {
        $currentProfile = $request->user()
            ->profiles()
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($currentProfile, 403);

        $filters = [
            'search' => trim((string) $request->string('search')),
            'department' => trim((string) $request->string('department')),
            'person_type' => trim((string) $request->string('person_type')),
        ];

        $profiles = Profile::query()
            ->where('organization_id', $currentProfile->organization_id)
            ->with(['department', 'user', 'roleAssignments.role'])
            ->when($filters['search'] !== '', function (Builder $query) use ($filters) {
                $search = '%'.$filters['search'].'%';

                $query->where(function (Builder $builder) use ($search) {
                    $builder
                        ->where('display_name', 'like', $search)
                        ->orWhere('title', 'like', $search)
                        ->orWhere('phone', 'like', $search)
                        ->orWhereHas('user', fn (Builder $userQuery) => $userQuery->where('email', 'like', $search));
                });
            })
            ->when($filters['department'] !== '', fn (Builder $query) => $query->whereHas(
                'department',
                fn (Builder $departmentQuery) => $departmentQuery->where('slug', $filters['department'])
            ))
            ->when($filters['person_type'] !== '', fn (Builder $query) => $query->where('person_type', $filters['person_type']))
            ->orderBy('display_name')
            ->paginate(12)
            ->withQueryString();

        return view('people.index', [
            'currentProfile' => $currentProfile,
            'canInviteUsers' => $currentProfile->hasPermission('users.invite'),
            'filters' => $filters,
            'profiles' => $profiles,
            'departments' => $currentProfile->organization->departments()->orderBy('name')->get(),
            'personTypes' => Profile::query()
                ->where('organization_id', $currentProfile->organization_id)
                ->distinct()
                ->orderBy('person_type')
                ->pluck('person_type'),
        ]);
    }

    public function show(Request $request, Profile $profile): View|RedirectResponse
    {
        $currentProfile = $request->user()
            ->profiles()
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($currentProfile, 403);
        abort_if($profile->organization_id !== $currentProfile->organization_id, 403);

        // Own profile → redirect to personal dashboard
        if ($profile->user_id === $request->user()->id) {
            return redirect()->route('profile.show');
        }

        $profile->load(['department', 'organization', 'user', 'roleAssignments.role']);

        return view('people.show', [
            'profile' => $profile,
            'currentProfile' => $currentProfile,
            'canManageProfiles' => $currentProfile->hasPermission('profiles.manage'),
        ]);
    }

    public function resetPassword(Request $request, Profile $profile): RedirectResponse
    {
        $currentProfile = $request->user()
            ->profiles()
            ->where('status', 'Active')
            ->orderBy('id')
            ->first();

        abort_unless($currentProfile && $currentProfile->hasPermission('profiles.manage'), 403);
        abort_if($profile->organization_id !== $currentProfile->organization_id, 403);
        abort_unless($profile->user?->email, 422);

        $status = Password::sendResetLink(['email' => $profile->user->email]);

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', "Password reset email sent to {$profile->user->email}.");
        }

        return back()->withErrors(['reset' => __($status)]);
    }
}
