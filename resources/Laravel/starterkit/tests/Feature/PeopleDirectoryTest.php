<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\Profile;
use App\Models\User;
use Database\Seeders\Phase1ScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PeopleDirectoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_directory_shows_people_from_the_current_organization_only(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);
        $user = User::query()->where('email', 'jordan@example.test')->firstOrFail();
        $user->markEmailAsVerified();

        $this->actingAs($user)
            ->get(route('people.index'))
            ->assertOk()
            ->assertSee('Rachel Kim')
            ->assertSee('Chris Morgan')
            ->assertSee('Demo Admin');
    }

    public function test_demo_admin_sees_the_grace_community_church_directory(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);
        $user = User::query()->where('email', 'demo@user.com')->firstOrFail();

        $this->actingAs($user)
            ->get(route('people.index'))
            ->assertOk()
            ->assertSee('Jordan Lee')
            ->assertSee('Rachel Kim')
            ->assertSee('Marcus Bell')
            ->assertSee('Elena Torres');
    }

    public function test_directory_can_filter_by_department_and_person_type(): void
    {
        $this->seed(Phase1ScenarioSeeder::class);
        $user = User::query()->where('email', 'jordan@example.test')->firstOrFail();
        $user->markEmailAsVerified();

        $this->actingAs($user)
            ->get(route('people.index', ['department' => 'kids-ministry']))
            ->assertOk()
            ->assertSee('Rachel Kim')
            ->assertSee('Avery Brooks')
            ->assertDontSee('Marcus Bell');

        $this->actingAs($user)
            ->get(route('people.index', ['person_type' => 'Vendor Contact']))
            ->assertOk()
            ->assertSee('Chris Morgan')
            ->assertDontSee('Rachel Kim');
    }

    public function test_user_without_an_active_organization_profile_cannot_view_directory(): void
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $this->actingAs($user)
            ->get(route('people.index'))
            ->assertForbidden();
    }

    public function test_inactive_profile_cannot_be_used_to_view_directory(): void
    {
        $organization = Organization::query()->create([
            'name' => 'Inactive Example',
            'slug' => 'inactive-example',
            'status' => 'Active',
        ]);
        $user = User::factory()->create(['email_verified_at' => now()]);
        Profile::query()->create([
            'organization_id' => $organization->id,
            'user_id' => $user->id,
            'display_name' => $user->name,
            'person_type' => 'Staff',
            'status' => 'Inactive',
        ]);

        $this->actingAs($user)
            ->get(route('people.index'))
            ->assertForbidden();
    }
}
