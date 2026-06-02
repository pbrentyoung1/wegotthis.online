<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Permission;
use App\Models\Profile;
use App\Models\ProfileRoleAssignment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Phase1FoundationSeeder extends Seeder
{
    /**
     * Seed the Phase 1 organization, profile, role, and permission foundation.
     */
    public function run(): void
    {
        $organization = Organization::query()->updateOrCreate(
            ['slug' => 'forworship-creative-demo'],
            [
                'name' => 'ForWorship Creative Demo',
                'status' => 'Active',
                'timezone' => 'UTC',
                'settings_json' => [],
            ],
        );

        $permissions = $this->seedPermissions();
        $roles = $this->seedRoles();

        $this->syncRolePermissions($roles, $permissions);
        $this->seedAdminProfile($organization, $roles['organization-admin']);
    }

    /**
     * @return array<string, Permission>
     */
    private function seedPermissions(): array
    {
        $permissions = [
            'organizations.manage' => 'Manage organizations',
            'users.invite' => 'Invite users',
            'profiles.manage' => 'Manage profiles',
            'departments.manage' => 'Manage departments',
            'roles.manage' => 'Manage roles',
            'permissions.manage' => 'Manage permissions',
            'requests.submit' => 'Submit requests',
            'requests.triage' => 'Triage requests',
            'projects.create' => 'Create projects',
            'projects.view' => 'View projects',
            'projects.manage' => 'Manage projects',
            'deliverables.create' => 'Create deliverables',
            'deliverables.view' => 'View deliverables',
            'deliverables.manage' => 'Manage deliverables',
            'tasks.create' => 'Create tasks',
            'tasks.complete' => 'Complete tasks',
            'reviews.assign' => 'Assign reviews',
            'reviews.decide' => 'Decide reviews',
        ];

        return collect($permissions)
            ->mapWithKeys(fn (string $name, string $key): array => [
                $key => Permission::query()->updateOrCreate(
                    ['key' => $key],
                    [
                        'name' => $name,
                        'description' => null,
                    ],
                ),
            ])
            ->all();
    }

    /**
     * @return array<string, Role>
     */
    private function seedRoles(): array
    {
        $roles = [
            'organization-admin' => 'Organization Admin',
            'communications-manager' => 'Communications Manager',
            'department-leader' => 'Department Leader',
            'contributor' => 'Contributor',
            'viewer' => 'Viewer',
        ];

        return collect($roles)
            ->mapWithKeys(fn (string $name, string $slug): array => [
                $slug => Role::query()->updateOrCreate(
                    [
                        'organization_id' => null,
                        'slug' => $slug,
                    ],
                    [
                        'name' => $name,
                        'scope_type' => 'Organization',
                        'description' => null,
                        'is_system' => true,
                    ],
                ),
            ])
            ->all();
    }

    /**
     * @param  array<string, Role>  $roles
     * @param  array<string, Permission>  $permissions
     */
    private function syncRolePermissions(array $roles, array $permissions): void
    {
        $rolePermissionKeys = [
            'organization-admin' => array_keys($permissions),
            'communications-manager' => [
                'users.invite',
                'profiles.manage',
                'departments.manage',
                'requests.submit',
                'requests.triage',
                'projects.create',
                'projects.view',
                'projects.manage',
                'deliverables.create',
                'deliverables.view',
                'deliverables.manage',
                'tasks.create',
                'tasks.complete',
                'reviews.assign',
                'reviews.decide',
            ],
            'department-leader' => [
                'requests.submit',
                'projects.view',
                'deliverables.view',
                'reviews.decide',
            ],
            'contributor' => [
                'projects.view',
                'deliverables.view',
                'tasks.complete',
            ],
            'viewer' => [
                'projects.view',
                'deliverables.view',
            ],
        ];

        foreach ($rolePermissionKeys as $roleSlug => $permissionKeys) {
            $roles[$roleSlug]->permissions()->sync(
                collect($permissionKeys)
                    ->map(fn (string $key): int => $permissions[$key]->id)
                    ->all(),
            );
        }
    }

    private function seedAdminProfile(Organization $organization, Role $adminRole): void
    {
        $user = User::query()->updateOrCreate(
            ['email' => 'demo@user.com'],
            [
                'name' => 'Demo Admin',
                'password' => Hash::make('password'),
            ],
        );

        $profile = Profile::query()->updateOrCreate(
            [
                'organization_id' => $organization->id,
                'user_id' => $user->id,
            ],
            [
                'display_name' => $user->name,
                'title' => 'Organization Admin',
                'person_type' => 'Staff',
                'status' => 'Active',
                'metadata_json' => [],
            ],
        );

        ProfileRoleAssignment::query()->updateOrCreate(
            [
                'organization_id' => $organization->id,
                'profile_id' => $profile->id,
                'role_id' => $adminRole->id,
                'scope_type' => 'Organization',
                'scope_id' => null,
                'ended_at' => null,
            ],
            [
                'assigned_by_profile_id' => null,
                'assigned_at' => now(),
            ],
        );

        $organization->forceFill([
            'settings_json' => [
                'seeded_admin_profile_id' => $profile->id,
            ],
        ])->save();
    }
}
