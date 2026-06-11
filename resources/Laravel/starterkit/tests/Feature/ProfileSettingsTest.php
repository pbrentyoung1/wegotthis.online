<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_settings_page_displays_the_users_workspace_profile(): void
    {
        [$user, $profile] = $this->profileUser();

        $this->actingAs($user)
            ->get(route('profile.edit'))
            ->assertOk()
            ->assertSee($profile->display_name)
            ->assertSee($profile->organization->name)
            ->assertSee($profile->department->name);
    }

    public function test_user_can_update_account_and_workspace_profile(): void
    {
        [$user, $profile] = $this->profileUser();

        $this->actingAs($user)
            ->patch(route('profile.update'), [
                'name' => 'Jordan Updated',
                'email' => 'jordan.updated@example.test',
                'display_name' => 'Jordan U.',
                'title' => 'Creative Director',
                'phone' => '555-0100',
                'bio' => 'Keeps communication work moving.',
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('profile.edit'));

        $this->assertSame('Jordan Updated', $user->fresh()->name);
        $this->assertSame('jordan.updated@example.test', $user->fresh()->email);
        $this->assertNull($user->fresh()->email_verified_at);
        $this->assertSame('Jordan U.', $profile->fresh()->display_name);
        $this->assertSame('Creative Director', $profile->fresh()->title);
        $this->assertSame('555-0100', $profile->fresh()->phone);
    }

    public function test_profile_update_does_not_change_organization_department_or_person_type(): void
    {
        [$user, $profile] = $this->profileUser();

        $this->actingAs($user)->patch(route('profile.update'), [
            'name' => $user->name,
            'email' => $user->email,
            'display_name' => $profile->display_name,
            'title' => $profile->title,
            'phone' => $profile->phone,
            'bio' => $profile->bio,
            'organization_id' => 999,
            'department_id' => 999,
            'person_type' => 'Organization Admin',
        ])->assertSessionHasNoErrors();

        $profile->refresh();

        $this->assertSame('Staff', $profile->person_type);
        $this->assertSame('communications', $profile->department->slug);
        $this->assertSame('grace-community-church', $profile->organization->slug);
    }

    private function profileUser(): array
    {
        $organization = Organization::query()->create([
            'name' => 'Grace Community Church',
            'slug' => 'grace-community-church',
            'status' => 'Active',
        ]);
        $department = Department::query()->create([
            'organization_id' => $organization->id,
            'name' => 'Communications',
            'slug' => 'communications',
            'status' => 'Active',
        ]);
        $user = User::factory()->create([
            'name' => 'Jordan Lee',
            'email_verified_at' => now(),
        ]);
        $profile = Profile::query()->create([
            'organization_id' => $organization->id,
            'user_id' => $user->id,
            'department_id' => $department->id,
            'display_name' => 'Jordan Lee',
            'title' => 'Communications Manager',
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);

        return [$user, $profile];
    }
}
