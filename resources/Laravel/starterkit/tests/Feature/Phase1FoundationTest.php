<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\Profile;
use App\Models\ProfileRoleAssignment;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\Phase1FoundationSeeder;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Phase1FoundationTest extends TestCase
{
    use RefreshDatabase;

    public function test_phase_1_seed_data_is_idempotent(): void
    {
        $this->seed(Phase1FoundationSeeder::class);
        $this->seed(Phase1FoundationSeeder::class);

        $this->assertSame(1, Organization::query()->where('slug', 'forworship-creative-demo')->count());
        $this->assertSame(5, Role::query()->where('is_system', true)->count());
        $this->assertSame(18, Permission::query()->count());
        $this->assertSame(1, User::query()->where('email', 'demo@user.com')->count());
        $this->assertSame(1, Profile::query()->whereNotNull('user_id')->count());
        $this->assertSame(1, ProfileRoleAssignment::query()->whereNull('ended_at')->count());
    }

    public function test_profile_uniqueness_allows_contacts_but_prevents_duplicate_login_profile_per_organization(): void
    {
        $organization = Organization::query()->create([
            'name' => 'Test Church',
            'slug' => 'test-church',
        ]);

        Profile::query()->create([
            'organization_id' => $organization->id,
            'display_name' => 'Vendor Contact One',
            'person_type' => 'Vendor Contact',
            'status' => 'Active',
        ]);

        Profile::query()->create([
            'organization_id' => $organization->id,
            'display_name' => 'Vendor Contact Two',
            'person_type' => 'Vendor Contact',
            'status' => 'Active',
        ]);

        $user = User::factory()->create();

        Profile::query()->create([
            'organization_id' => $organization->id,
            'user_id' => $user->id,
            'display_name' => $user->name,
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);

        $this->expectException(QueryException::class);

        Profile::query()->create([
            'organization_id' => $organization->id,
            'user_id' => $user->id,
            'display_name' => "{$user->name} Duplicate",
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);
    }

    public function test_department_and_profile_circular_foreign_keys_use_set_null_behavior(): void
    {
        $organization = Organization::query()->create([
            'name' => 'Test Church',
            'slug' => 'test-church',
        ]);

        $department = Department::query()->create([
            'organization_id' => $organization->id,
            'name' => 'Kids Ministry',
            'slug' => 'kids-ministry',
            'status' => 'Active',
        ]);

        $profile = Profile::query()->create([
            'organization_id' => $organization->id,
            'department_id' => $department->id,
            'display_name' => 'Kids Pastor',
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);

        $department->update(['lead_profile_id' => $profile->id]);
        $profile->delete();

        $this->assertNull($department->refresh()->lead_profile_id);
    }

    public function test_role_permissions_and_active_assignments_enforce_phase_1_constraints(): void
    {
        $organization = Organization::query()->create([
            'name' => 'Test Church',
            'slug' => 'test-church',
        ]);

        $profile = Profile::query()->create([
            'organization_id' => $organization->id,
            'display_name' => 'Communications Manager',
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);

        $role = Role::query()->create([
            'name' => 'Communications Manager',
            'slug' => 'communications-manager',
            'scope_type' => 'Organization',
            'is_system' => true,
        ]);

        $permission = Permission::query()->create([
            'key' => 'requests.triage',
            'name' => 'Triage requests',
        ]);

        $role->permissions()->attach($permission);

        $this->assertTrue($role->permissions()->where('key', 'requests.triage')->exists());

        ProfileRoleAssignment::query()->create([
            'organization_id' => $organization->id,
            'profile_id' => $profile->id,
            'role_id' => $role->id,
            'scope_type' => 'Organization',
            'assigned_at' => now(),
        ]);

        $this->expectException(QueryException::class);

        ProfileRoleAssignment::query()->create([
            'organization_id' => $organization->id,
            'profile_id' => $profile->id,
            'role_id' => $role->id,
            'scope_type' => 'Organization',
            'assigned_at' => now(),
        ]);
    }

    public function test_organization_deletion_is_restricted_while_profiles_exist(): void
    {
        $organization = Organization::query()->create([
            'name' => 'Test Church',
            'slug' => 'test-church',
        ]);

        Profile::query()->create([
            'organization_id' => $organization->id,
            'display_name' => 'Communications Director',
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);

        $this->expectException(QueryException::class);

        $organization->delete();
    }

    public function test_organization_deletion_is_restricted_while_departments_exist(): void
    {
        $organization = Organization::query()->create([
            'name' => 'Test Church',
            'slug' => 'test-church',
        ]);

        Department::query()->create([
            'organization_id' => $organization->id,
            'name' => 'Kids Ministry',
            'slug' => 'kids-ministry',
            'status' => 'Active',
        ]);

        $this->expectException(QueryException::class);

        $organization->delete();
    }

    public function test_profile_deletion_is_restricted_while_role_assignments_exist(): void
    {
        [$profile] = $this->createAssignedProfileRole();

        $this->expectException(QueryException::class);

        $profile->delete();
    }

    public function test_role_deletion_is_restricted_while_profile_role_assignments_exist(): void
    {
        [, $role] = $this->createAssignedProfileRole();

        $this->expectException(QueryException::class);

        $role->delete();
    }

    public function test_permission_deletion_is_restricted_while_assigned_to_role(): void
    {
        $role = Role::query()->create([
            'name' => 'Communications Manager',
            'slug' => 'communications-manager',
            'scope_type' => 'Organization',
            'is_system' => true,
        ]);

        $permission = Permission::query()->create([
            'key' => 'requests.triage',
            'name' => 'Triage requests',
        ]);

        $role->permissions()->attach($permission);

        $this->expectException(QueryException::class);

        $permission->delete();
    }

    public function test_role_deletion_cascades_role_permissions_without_profile_assignments(): void
    {
        $role = Role::query()->create([
            'name' => 'Communications Manager',
            'slug' => 'communications-manager',
            'scope_type' => 'Organization',
            'is_system' => true,
        ]);

        $permission = Permission::query()->create([
            'key' => 'requests.triage',
            'name' => 'Triage requests',
        ]);

        $role->permissions()->attach($permission);

        $this->assertDatabaseHas('role_permissions', [
            'role_id' => $role->id,
            'permission_id' => $permission->id,
        ]);

        $role->delete();

        $this->assertDatabaseMissing('role_permissions', [
            'role_id' => $role->id,
            'permission_id' => $permission->id,
        ]);
    }

    /**
     * @return array{0: Profile, 1: Role, 2: ProfileRoleAssignment}
     */
    private function createAssignedProfileRole(): array
    {
        $organization = Organization::query()->create([
            'name' => 'Test Church',
            'slug' => 'test-church',
        ]);

        $profile = Profile::query()->create([
            'organization_id' => $organization->id,
            'display_name' => 'Communications Manager',
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);

        $role = Role::query()->create([
            'name' => 'Communications Manager',
            'slug' => 'communications-manager',
            'scope_type' => 'Organization',
            'is_system' => true,
        ]);

        $assignment = ProfileRoleAssignment::query()->create([
            'organization_id' => $organization->id,
            'profile_id' => $profile->id,
            'role_id' => $role->id,
            'scope_type' => 'Organization',
            'assigned_at' => now(),
        ]);

        return [$profile, $role, $assignment];
    }
}
