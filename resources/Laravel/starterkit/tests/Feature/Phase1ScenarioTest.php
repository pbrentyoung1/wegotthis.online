<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\ProfileRoleAssignment;
use App\Models\User;
use Database\Seeders\Phase1ScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class Phase1ScenarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_scenario_seeder_is_idempotent(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);
        $this->seed(Phase1ScenarioSeeder::class);

        $grace = $this->graceOrganization();

        $this->assertSame(1, Organization::query()->where('slug', 'grace-community-church')->count());

        foreach (['communications', 'kids-ministry', 'worship', 'production', 'administration'] as $slug) {
            $this->assertSame(
                1,
                Department::query()
                    ->where('organization_id', $grace->id)
                    ->where('slug', $slug)
                    ->count(),
            );
        }

        foreach (['jordan@example.test', 'rachel@example.test', 'marcus@example.test', 'elena@example.test', 'chris@example.test', 'avery@example.test'] as $email) {
            $this->assertSame(1, User::query()->where('email', $email)->count());
        }

        $this->assertSame(7, Profile::query()->where('organization_id', $grace->id)->count());
        $this->assertSame(5, ProfileRoleAssignment::query()->where('organization_id', $grace->id)->whereNull('ended_at')->count());
    }

    public function test_staff_profiles_are_login_backed_and_connected_to_departments(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $this->assertLoginBackedStaffProfile('Jordan Lee', 'Communications');
        $this->assertLoginBackedStaffProfile('Rachel Kim', 'Kids Ministry');
        $this->assertLoginBackedStaffProfile('Marcus Bell', 'Production');
        $this->assertLoginBackedStaffProfile('Elena Torres', 'Administration');

        $this->assertSame('/images/users/user-1.jpg', $this->profile('Demo Admin')->avatar_url);
        $this->assertSame('/images/users/user-2.jpg', $this->profile('Jordan Lee')->avatar_url);
        $this->assertSame('/images/users/user-3.jpg', $this->profile('Rachel Kim')->avatar_url);
        $this->assertSame('/images/users/user-4.jpg', $this->profile('Marcus Bell')->avatar_url);
        $this->assertSame('/images/users/user-5.jpg', $this->profile('Elena Torres')->avatar_url);
    }

    public function test_demo_accounts_are_verified_and_use_the_documented_local_password(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        foreach (['demo@user.com', 'jordan@example.test', 'rachel@example.test', 'marcus@example.test', 'elena@example.test', 'chris@example.test', 'avery@example.test'] as $email) {
            $user = User::query()->where('email', $email)->firstOrFail();

            $this->assertNotNull($user->email_verified_at);
            $this->assertTrue(Hash::check('password', $user->password));
        }
    }

    public function test_demo_contacts_have_logins_without_changing_person_type(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $chris = $this->profile('Chris Morgan');
        $avery = $this->profile('Avery Brooks');

        $this->assertNotNull($chris->user_id);
        $this->assertSame('Vendor Contact', $chris->person_type);
        $this->assertNull($chris->department_id);
        $this->assertSame('chris@example.test', $chris->user->email);

        $this->assertNotNull($avery->user_id);
        $this->assertSame('External Reviewer', $avery->person_type);
        $this->assertSame('Kids Ministry', $avery->department->name);
        $this->assertSame('avery@example.test', $avery->user->email);
    }

    public function test_department_leader_is_a_role_assignment_not_person_type(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $rachel = $this->profile('Rachel Kim');

        $this->assertSame('Staff', $rachel->person_type);
        $this->assertNotSame('Department Leader', $rachel->person_type);
        $this->assertTrue($this->profileHasRole($rachel, 'Department Leader'));
    }

    public function test_role_expectations_match_scenario(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $this->assertTrue($this->profileHasRole($this->profile('Demo Admin'), 'Organization Admin'));
        $this->assertTrue($this->profileHasRole($this->profile('Jordan Lee'), 'Communications Manager'));
        $this->assertTrue($this->profileHasRole($this->profile('Rachel Kim'), 'Department Leader'));
        $this->assertTrue($this->profileHasRole($this->profile('Marcus Bell'), 'Contributor'));
        $this->assertTrue($this->profileHasRole($this->profile('Elena Torres'), 'Contributor'));
        $this->assertFalse($this->profile('Chris Morgan')->roleAssignments()->whereNull('ended_at')->exists());
        $this->assertFalse($this->profile('Avery Brooks')->roleAssignments()->whereNull('ended_at')->exists());
    }

    public function test_scenario_supports_vbs_identity_anchors_without_unapproved_later_scope_tables(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $this->assertTrue($this->profileHasRole($this->profile('Jordan Lee'), 'Communications Manager'));
        $this->assertSame('Communications Admin', $this->profile('Elena Torres')->title);
        $this->assertSame('Kids Ministry', $this->profile('Rachel Kim')->department->name);
        $this->assertTrue($this->profileHasRole($this->profile('Marcus Bell'), 'Contributor'));
        $this->assertSame('Vendor Contact', $this->profile('Chris Morgan')->person_type);
        $this->assertSame('External Reviewer', $this->profile('Avery Brooks')->person_type);

        foreach (['campaigns', 'work_participants', 'assets', 'asset_links', 'review_rounds', 'change_requests', 'calendar_items', 'dashboard_widgets', 'skills', 'profile_skills'] as $table) {
            $this->assertFalse(Schema::hasTable($table), "Unexpected later-scope table exists: {$table}");
        }
    }

    public function test_department_lead_relationship_supports_profile_anchor(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);

        $kidsMinistry = Department::query()->where('slug', 'kids-ministry')->firstOrFail();
        $temporaryLead = Profile::query()->create([
            'organization_id' => $this->graceOrganization()->id,
            'department_id' => $kidsMinistry->id,
            'display_name' => 'Temporary Kids Lead',
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);

        $kidsMinistry->update(['lead_profile_id' => $temporaryLead->id]);

        $this->assertTrue($kidsMinistry->refresh()->leadProfile->is($temporaryLead));

        $temporaryLead->delete();

        $this->assertNull($kidsMinistry->refresh()->lead_profile_id);
    }

    private function graceOrganization(): Organization
    {
        return Organization::query()->where('slug', 'grace-community-church')->firstOrFail();
    }

    private function profile(string $displayName): Profile
    {
        return Profile::query()
            ->where('organization_id', $this->graceOrganization()->id)
            ->where('display_name', $displayName)
            ->firstOrFail();
    }

    private function assertLoginBackedStaffProfile(string $displayName, string $departmentName): void
    {
        $profile = $this->profile($displayName);

        $this->assertNotNull($profile->user_id);
        $this->assertSame('Staff', $profile->person_type);
        $this->assertSame($departmentName, $profile->department->name);
    }

    private function profileHasRole(Profile $profile, string $roleName): bool
    {
        return $profile->roleAssignments()
            ->whereNull('ended_at')
            ->whereHas('role', fn ($query) => $query->where('name', $roleName))
            ->exists();
    }
}
