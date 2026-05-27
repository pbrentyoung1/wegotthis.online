<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserDirectorySeeder extends Seeder
{
    /**
     * Seed user profile and access-control data.
     */
    public function run(): void
    {
        $permissions = collect([
            ['name' => 'View Requests', 'group_name' => 'Requests', 'description' => 'See incoming communications requests.'],
            ['name' => 'Create Requests', 'group_name' => 'Requests', 'description' => 'Submit new communications requests.'],
            ['name' => 'Manage Projects', 'group_name' => 'Projects', 'description' => 'Adjust timelines, assignments, and project details.'],
            ['name' => 'Edit Deliverables', 'group_name' => 'Projects', 'description' => 'Update creative deliverables and handoff details.'],
            ['name' => 'Approve Deliverables', 'group_name' => 'Approvals', 'description' => 'Approve work that is ready to publish or print.'],
            ['name' => 'Manage Review Links', 'group_name' => 'Approvals', 'description' => 'Control external review access and reviewer state.'],
            ['name' => 'Manage Assets', 'group_name' => 'Assets', 'description' => 'Organize and update media assets.'],
            ['name' => 'Publish Schedules', 'group_name' => 'Scheduling', 'description' => 'Finalize and publish communications schedules.'],
            ['name' => 'Manage Team Access', 'group_name' => 'Administration', 'description' => 'Invite users and adjust access levels.'],
        ])->mapWithKeys(function (array $permission) {
            $permission['slug'] = Str::slug($permission['name']);

            return [
                $permission['slug'] => Permission::query()->updateOrCreate(
                    ['slug' => $permission['slug']],
                    $permission
                ),
            ];
        });

        $roles = collect([
            [
                'name' => 'System Administrator',
                'description' => 'Oversees workspace configuration, security, and team access.',
                'icon' => 'shield-lock',
                'color' => 'danger',
                'permissions' => $permissions->keys()->all(),
            ],
            [
                'name' => 'Communications Director',
                'description' => 'Keeps campaigns, announcements, and approvals moving with clarity.',
                'icon' => 'speakerphone',
                'color' => 'primary',
                'permissions' => [
                    'view-requests',
                    'create-requests',
                    'manage-projects',
                    'edit-deliverables',
                    'approve-deliverables',
                    'publish-schedules',
                ],
            ],
            [
                'name' => 'Creative Lead',
                'description' => 'Guides creative direction, deliverables, and brand consistency.',
                'icon' => 'palette',
                'color' => 'warning',
                'permissions' => [
                    'view-requests',
                    'manage-projects',
                    'edit-deliverables',
                    'approve-deliverables',
                    'manage-assets',
                ],
            ],
            [
                'name' => 'Content Editor',
                'description' => 'Drafts and revises copy, media, and publishing details.',
                'icon' => 'writing',
                'color' => 'success',
                'permissions' => [
                    'view-requests',
                    'create-requests',
                    'edit-deliverables',
                    'publish-schedules',
                ],
            ],
            [
                'name' => 'Department Requester',
                'description' => 'Submits requests and tracks progress without managing the full workspace.',
                'icon' => 'clipboard-text',
                'color' => 'secondary',
                'permissions' => [
                    'view-requests',
                    'create-requests',
                ],
            ],
        ])->mapWithKeys(function (array $roleData) use ($permissions) {
            $role = Role::query()->updateOrCreate(
                ['slug' => Str::slug($roleData['name'])],
                [
                    'name' => $roleData['name'],
                    'slug' => Str::slug($roleData['name']),
                    'description' => $roleData['description'],
                    'icon' => $roleData['icon'],
                    'color' => $roleData['color'],
                ]
            );

            $role->permissions()->sync(
                collect($roleData['permissions'])
                    ->map(fn (string $slug) => $permissions[$slug]->id)
                    ->all()
            );

            return [$role->slug => $role];
        });

        $users = [
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'roles' => ['system-administrator', 'communications-director'],
                'profile' => [
                    'job_title' => 'Platform Administrator',
                    'department' => 'Operations',
                    'phone' => '(555) 120-4431',
                    'city' => 'Dallas',
                    'state' => 'Texas',
                    'country' => 'United States',
                    'timezone' => 'America/Chicago',
                    'website' => 'https://forworship.org',
                    'avatar_path' => '/images/headshots/headshot-01.jpeg',
                    'bio' => 'Keeps the workspace stable, ready, and clear for the team.',
                    'linkedin_url' => 'https://linkedin.com/in/test-user',
                    'status' => 'active',
                    'last_seen_at' => Carbon::now()->subMinutes(8),
                ],
            ],
            [
                'name' => 'Rachel Morrison',
                'email' => 'rachel.morrison@example.com',
                'roles' => ['communications-director'],
                'profile' => [
                    'job_title' => 'Communications Director',
                    'department' => 'Communications',
                    'phone' => '(555) 331-7720',
                    'city' => 'Nashville',
                    'state' => 'Tennessee',
                    'country' => 'United States',
                    'timezone' => 'America/Chicago',
                    'website' => 'https://forworship.org/team/rachel',
                    'avatar_path' => '/images/headshots/headshot-02.jpeg',
                    'bio' => 'Coordinates campaign planning, calendars, and approvals across ministries.',
                    'instagram_handle' => 'rachelwritescopy',
                    'status' => 'active',
                    'last_seen_at' => Carbon::now()->subMinutes(18),
                ],
            ],
            [
                'name' => 'Elias Grant',
                'email' => 'elias.grant@example.com',
                'roles' => ['creative-lead'],
                'profile' => [
                    'job_title' => 'Creative Lead',
                    'department' => 'Creative',
                    'phone' => '(555) 881-2250',
                    'city' => 'Phoenix',
                    'state' => 'Arizona',
                    'country' => 'United States',
                    'timezone' => 'America/Phoenix',
                    'website' => 'https://forworship.org/team/elias',
                    'avatar_path' => '/images/headshots/headshot-03.jpeg',
                    'bio' => 'Shapes visual direction and oversees design, video, and environmental graphics.',
                    'facebook_url' => 'https://facebook.com/elias.grant',
                    'status' => 'active',
                    'last_seen_at' => Carbon::now()->subHours(2),
                ],
            ],
            [
                'name' => 'Naomi Chen',
                'email' => 'naomi.chen@example.com',
                'roles' => ['content-editor'],
                'profile' => [
                    'job_title' => 'Content Editor',
                    'department' => 'Communications',
                    'phone' => '(555) 772-0094',
                    'city' => 'Chicago',
                    'state' => 'Illinois',
                    'country' => 'United States',
                    'timezone' => 'America/Chicago',
                    'avatar_path' => '/images/headshots/headshot-04.jpeg',
                    'bio' => 'Refines announcements, captions, and print copy so every message is clear.',
                    'x_handle' => 'naomiedits',
                    'status' => 'active',
                    'last_seen_at' => Carbon::now()->subHours(5),
                ],
            ],
            [
                'name' => 'Micah Johnson',
                'email' => 'micah.johnson@example.com',
                'roles' => ['department-requester'],
                'profile' => [
                    'job_title' => 'Student Ministry Coordinator',
                    'department' => 'Students',
                    'phone' => '(555) 690-1441',
                    'city' => 'Austin',
                    'state' => 'Texas',
                    'country' => 'United States',
                    'timezone' => 'America/Chicago',
                    'avatar_path' => '/images/headshots/headshot-05.jpeg',
                    'bio' => 'Submits event and promotion requests for student ministry weekends and camps.',
                    'status' => 'active',
                    'last_seen_at' => Carbon::now()->subDay(),
                ],
            ],
            [
                'name' => 'Abigail Flores',
                'email' => 'abigail.flores@example.com',
                'roles' => ['department-requester', 'content-editor'],
                'profile' => [
                    'job_title' => 'Worship Communications Coordinator',
                    'department' => 'Worship',
                    'phone' => '(555) 240-5521',
                    'city' => 'San Antonio',
                    'state' => 'Texas',
                    'country' => 'United States',
                    'timezone' => 'America/Chicago',
                    'avatar_path' => '/images/headshots/headshot-06.jpeg',
                    'bio' => 'Tracks worship set communication, rehearsal notes, and weekend support needs.',
                    'status' => 'invited',
                    'last_seen_at' => Carbon::now()->subDays(2),
                ],
            ],
            [
                'name' => 'Caleb Turner',
                'email' => 'caleb.turner@example.com',
                'roles' => ['creative-lead', 'content-editor'],
                'profile' => [
                    'job_title' => 'Video Producer',
                    'department' => 'Production',
                    'phone' => '(555) 990-7744',
                    'city' => 'Denver',
                    'state' => 'Colorado',
                    'country' => 'United States',
                    'timezone' => 'America/Denver',
                    'avatar_path' => '/images/headshots/headshot-07.jpeg',
                    'bio' => 'Owns capture, edit, and delivery details for weekly and campaign video.',
                    'status' => 'active',
                    'last_seen_at' => Carbon::now()->subMinutes(40),
                ],
            ],
            [
                'name' => 'Hannah Brooks',
                'email' => 'hannah.brooks@example.com',
                'roles' => ['department-requester'],
                'profile' => [
                    'job_title' => 'Kids Ministry Director',
                    'department' => 'Kids',
                    'phone' => '(555) 410-9981',
                    'city' => 'Atlanta',
                    'state' => 'Georgia',
                    'country' => 'United States',
                    'timezone' => 'America/New_York',
                    'avatar_path' => '/images/headshots/headshot-08.jpeg',
                    'bio' => 'Plans promotions, family resources, and volunteer communication for kids ministry.',
                    'status' => 'inactive',
                    'last_seen_at' => Carbon::now()->subDays(8),
                ],
            ],
        ];

        foreach ($users as $userData) {
            $user = User::query()->updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                ]
            );

            UserProfile::query()->updateOrCreate(
                ['user_id' => $user->id],
                $userData['profile']
            );

            $user->roles()->sync(
                collect($userData['roles'])
                    ->map(fn (string $slug) => $roles[$slug]->id)
                    ->all()
            );
        }
    }
}
