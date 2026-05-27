<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactsController extends Controller
{
    /**
     * Display the user directory.
     */
    public function index(Request $request): Response
    {
        $filters = [
            'search' => trim((string) $request->string('search')),
            'role' => trim((string) $request->string('role')),
            'department' => trim((string) $request->string('department')),
            'status' => trim((string) $request->string('status')),
        ];

        $contacts = User::query()
            ->select(['users.id', 'users.name', 'users.email', 'users.email_verified_at', 'users.created_at'])
            ->with([
                'profile:user_id,job_title,department,phone,city,state,country,website,avatar_path,status,last_seen_at',
                'roles:id,name,slug,color',
            ])
            ->withCount('roles')
            ->when($filters['search'] !== '', function (Builder $query) use ($filters) {
                $search = '%'.$filters['search'].'%';

                $query->where(function (Builder $builder) use ($search) {
                    $builder
                        ->where('users.name', 'like', $search)
                        ->orWhere('users.email', 'like', $search)
                        ->orWhereHas('profile', function (Builder $profileQuery) use ($search) {
                            $profileQuery
                                ->where('job_title', 'like', $search)
                                ->orWhere('department', 'like', $search)
                                ->orWhere('phone', 'like', $search)
                                ->orWhere('city', 'like', $search)
                                ->orWhere('state', 'like', $search);
                        });
                });
            })
            ->when($filters['role'] !== '', fn (Builder $query) => $query->whereHas('roles', fn (Builder $roleQuery) => $roleQuery->where('slug', $filters['role'])))
            ->when($filters['department'] !== '', fn (Builder $query) => $query->whereHas('profile', fn (Builder $profileQuery) => $profileQuery->where('department', $filters['department'])))
            ->when($filters['status'] !== '', fn (Builder $query) => $query->whereHas('profile', fn (Builder $profileQuery) => $profileQuery->where('status', $filters['status'])))
            ->orderBy('users.name')
            ->paginate(12)
            ->withQueryString()
            ->through(function (User $user): array {
                $profile = $user->profile;
                $location = collect([$profile?->city, $profile?->state, $profile?->country])
                    ->filter()
                    ->implode(', ');

                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'initials' => $this->initials($user->name),
                    'avatarUrl' => $profile?->avatar_path,
                    'jobTitle' => $profile?->job_title ?? 'Team member',
                    'department' => $profile?->department ?? 'General',
                    'phone' => $profile?->phone,
                    'website' => $profile?->website,
                    'location' => $location !== '' ? $location : 'Location not set',
                    'status' => $profile?->status ?? 'active',
                    'statusLabel' => str($profile?->status ?? 'active')->headline()->toString(),
                    'lastSeen' => $profile?->last_seen_at?->diffForHumans() ?? 'No recent activity',
                    'profileUrl' => route('users.profile.show', $user),
                    'roles' => $user->roles
                        ->sortBy('name')
                        ->values()
                        ->map(fn ($role) => [
                            'name' => $role->name,
                            'slug' => $role->slug,
                            'color' => $role->color,
                        ])
                        ->all(),
                ];
            });

        return Inertia::render('admin/users/contacts/index', [
            'filters' => $filters,
            'stats' => [
                'totalUsers' => User::query()->count(),
                'activeUsers' => UserProfile::query()->where('status', 'active')->count(),
                'verifiedUsers' => User::query()->whereNotNull('email_verified_at')->count(),
                'roles' => Role::query()->count(),
            ],
            'roles' => Role::query()
                ->orderBy('name')
                ->get(['name', 'slug'])
                ->map(fn (Role $role) => [
                    'label' => $role->name,
                    'value' => $role->slug,
                ]),
            'departments' => UserProfile::query()
                ->whereNotNull('department')
                ->distinct()
                ->orderBy('department')
                ->pluck('department'),
            'contacts' => [
                'data' => $contacts->items(),
                'meta' => [
                    'currentPage' => $contacts->currentPage(),
                    'lastPage' => $contacts->lastPage(),
                    'perPage' => $contacts->perPage(),
                    'total' => $contacts->total(),
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
