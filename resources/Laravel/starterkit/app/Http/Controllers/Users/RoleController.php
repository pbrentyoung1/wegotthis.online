<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;
use Inertia\Response;

class RoleController extends Controller
{
    /**
     * Display the roles index.
     */
    public function index(): Response
    {
        $roles = Role::query()
            ->withCount(['users', 'permissions'])
            ->with([
                'permissions:id,name,slug',
                'users:id,name',
                'users.profile:user_id,avatar_path',
            ])
            ->orderBy('name')
            ->get();

        return Inertia::render('admin/users/roles/index', [
            'stats' => [
                'roles' => $roles->count(),
                'permissions' => $roles->sum('permissions_count'),
                'assignedUsers' => User::query()->has('roles')->count(),
            ],
            'roles' => $roles->map(function (Role $role): array {
                return [
                    'id' => $role->id,
                    'name' => $role->name,
                    'slug' => $role->slug,
                    'description' => $role->description,
                    'icon' => $role->icon,
                    'color' => $role->color,
                    'userCount' => $role->users_count,
                    'permissionCount' => $role->permissions_count,
                    'updatedAt' => $role->updated_at?->diffForHumans(),
                    'detailsUrl' => route('users.roles.show', $role),
                    'members' => $role->users
                        ->sortBy('name')
                        ->take(4)
                        ->values()
                        ->map(fn (User $user) => [
                            'id' => $user->id,
                            'name' => $user->name,
                            'initials' => $this->initials($user->name),
                            'avatarUrl' => $user->profile?->avatar_path,
                        ])
                        ->all(),
                    'permissions' => $role->permissions
                        ->sortBy('name')
                        ->take(4)
                        ->values()
                        ->map(fn ($permission) => $permission->name)
                        ->all(),
                ];
            }),
        ]);
    }

    /**
     * Display an individual role.
     */
    public function show(Request $request, Role $role): Response
    {
        $filters = [
            'search' => trim((string) $request->string('search')),
            'status' => trim((string) $request->string('status')),
        ];

        $role->load(['permissions:id,name,slug,group_name']);
        $role->loadCount(['users', 'permissions']);

        $members = $role->users()
            ->select(['users.id', 'users.name', 'users.email', 'users.created_at', 'role_user.created_at as assigned_at'])
            ->with('profile:user_id,job_title,avatar_path,status')
            ->when($filters['search'] !== '', function (Builder $query) use ($filters) {
                $search = '%'.$filters['search'].'%';

                $query->where(function (Builder $builder) use ($search) {
                    $builder
                        ->where('users.name', 'like', $search)
                        ->orWhere('users.email', 'like', $search)
                        ->orWhereHas('profile', function (Builder $profileQuery) use ($search) {
                            $profileQuery
                                ->where('job_title', 'like', $search)
                                ->orWhere('status', 'like', $search);
                        });
                });
            })
            ->when($filters['status'] !== '', fn (Builder $query) => $query->whereHas('profile', fn (Builder $profileQuery) => $profileQuery->where('status', $filters['status'])))
            ->orderBy('users.name')
            ->paginate(10)
            ->withQueryString()
            ->through(function (User $user): array {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'initials' => $this->initials($user->name),
                    'avatarUrl' => $user->profile?->avatar_path,
                    'jobTitle' => $user->profile?->job_title ?? 'Team member',
                    'status' => $user->profile?->status ?? 'active',
                    'statusLabel' => str($user->profile?->status ?? 'active')->headline()->toString(),
                    'assignedAt' => $user->assigned_at ? Carbon::parse($user->assigned_at)->format('M j, Y') : null,
                    'profileUrl' => route('users.profile.show', $user),
                ];
            });

        return Inertia::render('admin/users/roles/show', [
            'filters' => $filters,
            'role' => [
                'id' => $role->id,
                'name' => $role->name,
                'slug' => $role->slug,
                'description' => $role->description,
                'icon' => $role->icon,
                'color' => $role->color,
                'userCount' => $role->users_count,
                'permissionCount' => $role->permissions_count,
                'updatedAt' => $role->updated_at?->diffForHumans(),
                'permissions' => $role->permissions
                    ->sortBy(fn ($permission) => sprintf('%s-%s', $permission->group_name, $permission->name))
                    ->values()
                    ->map(fn ($permission) => [
                        'name' => $permission->name,
                        'group' => $permission->group_name ?: 'General',
                    ])
                    ->all(),
            ],
            'members' => [
                'data' => $members->items(),
                'meta' => [
                    'currentPage' => $members->currentPage(),
                    'lastPage' => $members->lastPage(),
                    'perPage' => $members->perPage(),
                    'total' => $members->total(),
                ],
            ],
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
