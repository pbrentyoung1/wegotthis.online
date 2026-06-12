<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\ProfileRoleAssignment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Phase1ScenarioSeeder extends Seeder
{
    /**
     * Seed the Grace Community Church Phase 1 scenario.
     */
    public function run(): void
    {
        $this->call(Phase1FoundationSeeder::class);

        $organization = Organization::query()->updateOrCreate(
            ['slug' => 'grace-community-church'],
            [
                'name' => 'Grace Community Church',
                'timezone' => 'America/Chicago',
                'status' => 'Active',
                'settings_json' => [],
            ],
        );

        $departments = $this->seedDepartments($organization);
        $roles = Role::query()
            ->whereNull('organization_id')
            ->whereIn('slug', [
                'organization-admin',
                'communications-manager',
                'department-leader',
                'contributor',
            ])
            ->get()
            ->keyBy('slug');

        $this->moveDemoAdminToOrganization($organization, $roles['organization-admin']);

        $this->seedLoginBackedProfile(
            organization: $organization,
            department: $departments['communications'],
            role: $roles['communications-manager'],
            name: 'Jordan Lee',
            email: 'jordan@example.test',
            title: 'Communications Manager',
            avatarUrl: '/images/users/user-2.jpg',
            futureUse: [
                'Campaign owner',
                'Project owner',
                'Communications triage',
                'Review coordinator',
            ],
        );

        $this->seedLoginBackedProfile(
            organization: $organization,
            department: $departments['kids-ministry'],
            role: $roles['department-leader'],
            name: 'Rachel Kim',
            email: 'rachel@example.test',
            title: 'Kids Pastor',
            avatarUrl: '/images/users/user-3.jpg',
            futureUse: [
                'requester',
                'stakeholder',
                'reviewer/approver for Kids Ministry work',
            ],
        );

        $this->seedLoginBackedProfile(
            organization: $organization,
            department: $departments['production'],
            role: $roles['contributor'],
            name: 'Marcus Bell',
            email: 'marcus@example.test',
            title: 'Production Lead',
            avatarUrl: '/images/users/user-4.jpg',
            futureUse: [
                'Production Project owner',
                'task assignee',
                'production contributor',
            ],
        );

        $this->seedLoginBackedProfile(
            organization: $organization,
            department: $departments['administration'],
            role: $roles['contributor'],
            name: 'Elena Torres',
            email: 'elena@example.test',
            title: 'Communications Admin',
            avatarUrl: '/images/users/user-5.jpg',
            futureUse: [
                'delegated Admin participant',
                'calendar/Kanban visibility support',
                'updates on behalf of Communications Manager or Director',
            ],
        );

        $this->seedLoginBackedContactProfile(
            organization: $organization,
            department: null,
            name: 'Chris Morgan',
            email: 'chris@example.test',
            personType: 'Vendor Contact',
            title: 'Print Vendor Contact',
            avatarUrl: '/images/users/user-6.jpg',
            futureUse: [
                'vendor contact for banners, signage, and print projects',
            ],
        );

        $this->seedLoginBackedContactProfile(
            organization: $organization,
            department: $departments['kids-ministry'],
            name: 'Avery Brooks',
            email: 'avery@example.test',
            personType: 'External Reviewer',
            title: 'Parent Volunteer Reviewer',
            avatarUrl: '/images/users/user-7.jpg',
            futureUse: [
                'external reviewer/contact with demo login',
                'future stakeholder/reviewer flow',
            ],
        );
    }

    /**
     * @return array<string, Department>
     */
    private function seedDepartments(Organization $organization): array
    {
        $departments = [
            'communications' => [
                'name' => 'Communications',
                'notes' => 'communications planning, campaigns, content, approvals, and production coordination',
            ],
            'kids-ministry' => [
                'name' => 'Kids Ministry',
                'notes' => "children's ministry events and parent communication",
            ],
            'worship' => [
                'name' => 'Worship',
                'notes' => 'service planning and worship communication needs',
            ],
            'production' => [
                'name' => 'Production',
                'notes' => 'audio, video, livestream, and technical support',
            ],
            'administration' => [
                'name' => 'Administration',
                'notes' => 'operational and scheduling support',
            ],
        ];

        return collect($departments)
            ->mapWithKeys(fn (array $department, string $slug): array => [
                $slug => Department::query()->updateOrCreate(
                    [
                        'organization_id' => $organization->id,
                        'slug' => $slug,
                    ],
                    [
                        'name' => $department['name'],
                        'status' => 'Active',
                        'notes' => $department['notes'],
                    ],
                ),
            ])
            ->all();
    }

    private function seedLoginBackedProfile(
        Organization $organization,
        Department $department,
        Role $role,
        string $name,
        string $email,
        string $title,
        string $avatarUrl,
        array $futureUse,
    ): Profile {
        $user = User::query()->updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
        );

        $profile = Profile::query()->updateOrCreate(
            [
                'organization_id' => $organization->id,
                'user_id' => $user->id,
            ],
            [
                'department_id' => $department->id,
                'display_name' => $name,
                'title' => $title,
                'person_type' => 'Staff',
                'avatar_url' => $avatarUrl,
                'status' => 'Active',
                'metadata_json' => [
                    'scenario_contact_email' => $email,
                    'future_use' => $futureUse,
                ],
            ],
        );

        $this->assignRole($organization, $profile, $role);

        return $profile;
    }

    private function moveDemoAdminToOrganization(Organization $organization, Role $role): void
    {
        $user = User::query()->where('email', 'demo@user.com')->firstOrFail();
        $profile = $user->profiles()->firstOrFail();

        $profile->update([
            'organization_id' => $organization->id,
            'display_name' => 'Demo Admin',
            'title' => 'Organization Admin',
            'person_type' => 'Staff',
            'avatar_url' => '/images/users/user-1.jpg',
            'status' => 'Active',
            'metadata_json' => [
                'scenario_contact_email' => $user->email,
                'future_use' => [
                    'organization administration',
                    'role and permission testing',
                    'full Grace Community Church visibility',
                ],
            ],
        ]);

        ProfileRoleAssignment::query()
            ->where('profile_id', $profile->id)
            ->update(['organization_id' => $organization->id]);

        $this->assignRole($organization, $profile, $role);
    }

    private function seedLoginBackedContactProfile(
        Organization $organization,
        ?Department $department,
        string $name,
        string $email,
        string $personType,
        string $title,
        string $avatarUrl,
        array $futureUse,
    ): Profile {
        $user = User::query()->updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
        );

        return Profile::query()->updateOrCreate(
            [
                'organization_id' => $organization->id,
                'display_name' => $name,
            ],
            [
                'user_id' => $user->id,
                'department_id' => $department?->id,
                'title' => $title,
                'person_type' => $personType,
                'avatar_url' => $avatarUrl,
                'status' => 'Active',
                'metadata_json' => [
                    'scenario_contact_email' => $email,
                    'future_use' => $futureUse,
                ],
            ],
        );
    }

    private function assignRole(Organization $organization, Profile $profile, Role $role): void
    {
        ProfileRoleAssignment::query()->updateOrCreate(
            [
                'organization_id' => $organization->id,
                'profile_id' => $profile->id,
                'role_id' => $role->id,
                'scope_type' => 'Organization',
                'scope_id' => null,
                'ended_at' => null,
            ],
            [
                'assigned_by_profile_id' => null,
                'assigned_at' => now(),
            ],
        );
    }
}
