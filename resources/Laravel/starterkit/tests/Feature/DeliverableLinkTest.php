<?php

namespace Tests\Feature;

use App\Models\Deliverable;
use App\Models\DeliverableLink;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\Project;
use Database\Seeders\Phase3ProjectScenarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeliverableLinkTest extends TestCase
{
    use RefreshDatabase;

    public function test_manager_can_add_a_link_to_a_deliverable(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->post(route('deliverables.links.store', [$project, $deliverable]), [
                'url' => 'https://docs.google.com/presentation/d/abc123',
                'label' => 'Slide deck draft',
            ])
            ->assertRedirect(route('deliverables.show', [$project, $deliverable]));

        $this->assertDatabaseHas('deliverable_links', [
            'deliverable_id' => $deliverable->id,
            'url' => 'https://docs.google.com/presentation/d/abc123',
            'label' => 'Slide deck draft',
            'added_by_profile_id' => $jordan->id,
        ]);
    }

    public function test_label_is_optional(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->post(route('deliverables.links.store', [$project, $deliverable]), [
                'url' => 'https://www.figma.com/file/xyz',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('deliverable_links', [
            'deliverable_id' => $deliverable->id,
            'label' => null,
        ]);
    }

    public function test_url_is_required_and_must_be_valid(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $this->actingAs($jordan->user)
            ->post(route('deliverables.links.store', [$project, $deliverable]), ['url' => ''])
            ->assertSessionHasErrors('url');

        $this->actingAs($jordan->user)
            ->post(route('deliverables.links.store', [$project, $deliverable]), ['url' => 'not-a-url'])
            ->assertSessionHasErrors('url');
    }

    public function test_links_are_shown_on_the_deliverable_show_page(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $deliverable->links()->create([
            'organization_id' => $project->organization_id,
            'url' => 'https://canva.com/design/abc',
            'label' => 'Canva design',
            'added_by_profile_id' => $jordan->id,
        ]);

        $this->actingAs($jordan->user)
            ->get(route('deliverables.show', [$project, $deliverable]))
            ->assertOk()
            ->assertSee('Canva design')
            ->assertSee('https://canva.com/design/abc');
    }

    public function test_display_label_falls_back_to_hostname_when_no_label(): void
    {
        $link = new DeliverableLink(['url' => 'https://www.figma.com/file/xyz', 'label' => null]);
        $this->assertSame('figma.com', $link->displayLabel());

        $labeled = new DeliverableLink(['url' => 'https://example.com', 'label' => 'My design']);
        $this->assertSame('My design', $labeled->displayLabel());
    }

    public function test_manager_can_remove_a_link(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable, $jordan] = $this->scenario();

        $link = $deliverable->links()->create([
            'organization_id' => $project->organization_id,
            'url' => 'https://example.com/asset',
            'added_by_profile_id' => $jordan->id,
        ]);

        $this->actingAs($jordan->user)
            ->delete(route('deliverables.links.destroy', [$project, $deliverable, $link]))
            ->assertRedirect(route('deliverables.show', [$project, $deliverable]));

        $this->assertDatabaseMissing('deliverable_links', ['id' => $link->id]);
    }

    public function test_non_manager_cannot_add_or_remove_links(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        [$project, $deliverable] = $this->scenario();

        // Rachel is a Stakeholder — has projects.view but not projects.manage
        $rachel = Profile::query()->where('display_name', 'Rachel Kim')->where('status', 'Active')->firstOrFail();

        $link = $deliverable->links()->create([
            'organization_id' => $project->organization_id,
            'url' => 'https://example.com/asset',
        ]);

        $this->actingAs($rachel->user)
            ->post(route('deliverables.links.store', [$project, $deliverable]), ['url' => 'https://example.com'])
            ->assertForbidden();

        $this->actingAs($rachel->user)
            ->delete(route('deliverables.links.destroy', [$project, $deliverable, $link]))
            ->assertForbidden();
    }

    public function test_link_cannot_be_added_to_a_deliverable_from_another_project(): void
    {
        $this->seed(Phase3ProjectScenarioSeeder::class);
        $jordan = Profile::query()->where('display_name', 'Jordan Lee')->where('status', 'Active')->firstOrFail();
        $org = Organization::query()->where('slug', 'grace-community-church')->firstOrFail();

        $projects = Project::query()->where('organization_id', $org->id)->orderBy('id')->get();
        $projectA = $projects->first();
        $projectB = $projects->last();
        $deliverableFromB = $projectB->deliverables()->firstOrFail();

        // Try to post to projectA's link route but with a deliverable from projectB
        $this->actingAs($jordan->user)
            ->post(route('deliverables.links.store', [$projectA, $deliverableFromB]), [
                'url' => 'https://example.com',
            ])
            ->assertNotFound();
    }

    // Helpers

    /** @return array{Project, Deliverable, Profile} */
    private function scenario(): array
    {
        $org = Organization::query()->where('slug', 'grace-community-church')->firstOrFail();
        $jordan = Profile::query()->where('display_name', 'Jordan Lee')->where('status', 'Active')->firstOrFail();
        $project = Project::query()->where('organization_id', $org->id)->latest('id')->firstOrFail();
        $deliverable = $project->deliverables()->firstOrFail();

        return [$project, $deliverable, $jordan];
    }
}
