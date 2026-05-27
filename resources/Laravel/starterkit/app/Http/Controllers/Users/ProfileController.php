<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display an individual user profile.
     */
    public function show(User $user): Response
    {
        $user->load([
            'profile',
            'roles' => fn ($query) => $query->withCount('permissions')->orderBy('name'),
        ]);

        $permissionGroups = Permission::query()
            ->select(['permissions.name', 'permissions.group_name'])
            ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
            ->join('role_user', 'role_user.role_id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', $user->id)
            ->orderBy('permissions.group_name')
            ->orderBy('permissions.name')
            ->distinct()
            ->get()
            ->groupBy(fn (Permission $permission) => $permission->group_name ?: 'General')
            ->map(fn ($permissions, string $group) => [
                'group' => $group,
                'permissions' => $permissions->pluck('name')->values()->all(),
            ])
            ->values();

        $roleCount = $user->roles->count();
        $permissionCount = DB::table('permission_role')
            ->join('role_user', 'role_user.role_id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', $user->id)
            ->distinct()
            ->count('permission_role.permission_id');

        $profile = $user->profile;
        $location = collect([$profile?->city, $profile?->state, $profile?->country])->filter()->implode(', ');

        return Inertia::render('admin/users/profile/show', [
            'profileUser' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'initials' => $this->initials($user->name),
                'avatarUrl' => $profile?->avatar_path,
                'jobTitle' => $profile?->job_title ?? 'Team member',
                'department' => $profile?->department ?? 'General',
                'phone' => $profile?->phone,
                'website' => $profile?->website,
                'bio' => $profile?->bio ?: 'This team member has not added a profile summary yet.',
                'city' => $profile?->city,
                'state' => $profile?->state,
                'country' => $profile?->country,
                'location' => $location !== '' ? $location : 'Location not set',
                'timezone' => $profile?->timezone,
                'status' => $profile?->status ?? 'active',
                'statusLabel' => str($profile?->status ?? 'active')->headline()->toString(),
                'joinedAt' => $user->created_at?->format('M j, Y'),
                'lastSeen' => $profile?->last_seen_at?->diffForHumans() ?? 'No recent activity',
                'social' => [
                    'facebook' => $profile?->facebook_url,
                    'instagram' => $profile?->instagram_handle,
                    'linkedin' => $profile?->linkedin_url,
                    'x' => $profile?->x_handle,
                ],
                'roles' => $user->roles->map(fn ($role) => [
                    'name' => $role->name,
                    'slug' => $role->slug,
                    'color' => $role->color,
                    'permissionCount' => $role->permissions_count,
                    'detailsUrl' => route('users.roles.show', $role),
                ])->all(),
                'stats' => [
                    'roles' => $roleCount,
                    'permissions' => $permissionCount,
                ],
            ],
            'permissionGroups' => $permissionGroups,
        ]);
    }

    /**
     * Build initials for avatar placeholders.
     */
    private function initials(string $name): string
    {
        return str($name)
            ->explode(' ')
            ->filter()
            ->map(fn (string $part) => str($part)->substr(0, 1)->upper()->toString())
            ->take(2)
            ->implode('');
    }
}
