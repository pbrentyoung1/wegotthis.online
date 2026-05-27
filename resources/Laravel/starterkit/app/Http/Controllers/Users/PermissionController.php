<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class PermissionController extends Controller
{
    /**
     * Display the permissions index.
     */
    public function index(Request $request): Response
    {
        $filters = [
            'search' => trim((string) $request->string('search')),
            'group' => trim((string) $request->string('group')),
        ];

        $permissions = Permission::query()
            ->select(['id', 'name', 'slug', 'description', 'group_name', 'created_at'])
            ->with(['roles:id,name,slug,color'])
            ->withCount('roles')
            ->when($filters['search'] !== '', function (Builder $query) use ($filters) {
                $search = '%'.$filters['search'].'%';

                $query->where(function (Builder $builder) use ($search) {
                    $builder
                        ->where('name', 'like', $search)
                        ->orWhere('description', 'like', $search)
                        ->orWhere('group_name', 'like', $search);
                });
            })
            ->when($filters['group'] !== '', fn (Builder $query) => $query->where('group_name', $filters['group']))
            ->orderBy('group_name')
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $usersCountByPermission = DB::table('permission_role')
            ->leftJoin('role_user', 'role_user.role_id', '=', 'permission_role.role_id')
            ->selectRaw('permission_role.permission_id, count(distinct role_user.user_id) as users_count')
            ->whereIn('permission_role.permission_id', $permissions->getCollection()->pluck('id'))
            ->groupBy('permission_role.permission_id')
            ->pluck('users_count', 'permission_role.permission_id');

        $permissions->setCollection(
            $permissions->getCollection()->map(function (Permission $permission) use ($usersCountByPermission): array {
                return [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'slug' => $permission->slug,
                    'description' => $permission->description,
                    'group' => $permission->group_name ?: 'General',
                    'createdAt' => $permission->created_at?->format('M j, Y'),
                    'roleCount' => $permission->roles_count,
                    'userCount' => (int) ($usersCountByPermission[$permission->id] ?? 0),
                    'roles' => $permission->roles
                        ->sortBy('name')
                        ->values()
                        ->map(fn (Role $role) => [
                            'name' => $role->name,
                            'slug' => $role->slug,
                            'color' => $role->color,
                        ])
                        ->all(),
                ];
            })
        );

        return Inertia::render('admin/users/permissions/index', [
            'filters' => $filters,
            'stats' => [
                'permissions' => Permission::query()->count(),
                'roleAssignments' => DB::table('permission_role')->count(),
                'userCoverage' => DB::table('role_user')->distinct()->count('user_id'),
            ],
            'groups' => Permission::query()
                ->whereNotNull('group_name')
                ->distinct()
                ->orderBy('group_name')
                ->pluck('group_name'),
            'permissions' => [
                'data' => $permissions->items(),
                'meta' => [
                    'currentPage' => $permissions->currentPage(),
                    'lastPage' => $permissions->lastPage(),
                    'perPage' => $permissions->perPage(),
                    'total' => $permissions->total(),
                ],
            ],
        ]);
    }
}
