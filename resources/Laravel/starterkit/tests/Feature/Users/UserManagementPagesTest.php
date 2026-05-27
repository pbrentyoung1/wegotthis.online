<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

test('contacts page is displayed with directory data', function () {
    $member = User::factory()->withProfile([
        'job_title' => 'Creative Lead',
        'department' => 'Creative',
        'status' => 'active',
    ])->create([
        'name' => 'Zoe Member',
    ]);

    $authUser = User::factory()->create([
        'name' => 'Aaron Admin',
    ]);

    $role = Role::factory()->create([
        'name' => 'Creative Lead',
        'slug' => 'creative-lead',
    ]);

    $member->roles()->attach($role);

    $this->actingAs($authUser)
        ->get(route('users.contacts.index'))
        ->assertInertia(fn (Assert $page) => $page
            ->component('admin/users/contacts/index')
            ->has('contacts.data', 2)
            ->where('contacts.data.0.name', 'Aaron Admin')
            ->where('contacts.data.1.name', 'Zoe Member')
        );
});

test('profile page is displayed for a user', function () {
    $authUser = User::factory()->create();
    $member = User::factory()->withProfile([
        'job_title' => 'Content Editor',
        'department' => 'Communications',
        'status' => 'active',
    ])->create();

    $role = Role::factory()->create([
        'name' => 'Content Editor',
        'slug' => 'content-editor',
    ]);
    $permission = Permission::factory()->create([
        'name' => 'Edit Deliverables',
        'slug' => 'edit-deliverables',
        'group_name' => 'Projects',
    ]);

    $role->permissions()->attach($permission);
    $member->roles()->attach($role);

    $this->actingAs($authUser)
        ->get(route('users.profile.show', $member))
        ->assertInertia(fn (Assert $page) => $page
            ->component('admin/users/profile/show')
            ->where('profileUser.name', $member->name)
            ->has('permissionGroups', 1)
        );
});

test('roles page is displayed', function () {
    $authUser = User::factory()->create();
    $member = User::factory()->create();
    $role = Role::factory()->create([
        'name' => 'System Administrator',
        'slug' => 'system-administrator',
    ]);

    $member->roles()->attach($role);

    $this->actingAs($authUser)
        ->get(route('users.roles.index'))
        ->assertInertia(fn (Assert $page) => $page
            ->component('admin/users/roles/index')
            ->has('roles', 1)
            ->where('roles.0.slug', 'system-administrator')
        );
});

test('permissions page is displayed', function () {
    $authUser = User::factory()->create();
    $role = Role::factory()->create([
        'name' => 'Communications Director',
        'slug' => 'communications-director',
    ]);
    $permission = Permission::factory()->create([
        'name' => 'Approve Deliverables',
        'slug' => 'approve-deliverables',
        'group_name' => 'Approvals',
    ]);

    $role->permissions()->attach($permission);

    $this->actingAs($authUser)
        ->get(route('users.permissions.index'))
        ->assertInertia(fn (Assert $page) => $page
            ->component('admin/users/permissions/index')
            ->has('permissions.data', 1)
            ->where('permissions.data.0.slug', 'approve-deliverables')
        );
});
