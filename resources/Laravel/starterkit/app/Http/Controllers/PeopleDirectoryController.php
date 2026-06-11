<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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
}
