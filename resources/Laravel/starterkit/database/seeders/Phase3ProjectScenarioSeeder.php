<?php

namespace Database\Seeders;

use App\Enums\RequestStatus;
use App\Models\DeliverableType;
use App\Models\Department;
use App\Models\MinistryRequest;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectType;
use App\Services\ProjectConversionService;
use App\Services\RequestIntakeService;
use Illuminate\Database\Seeder;

class Phase3ProjectScenarioSeeder extends Seeder
{
    /**
     * Seed converted projects and an accepted request for conversion testing.
     */
    public function run(): void
    {
        $this->call(Phase2RequestIntakeScenarioSeeder::class);

        $organization = Organization::query()->where('slug', 'grace-community-church')->firstOrFail();
        $jordan = $this->profile($organization, 'Jordan Lee');
        $rachel = $this->profile($organization, 'Rachel Kim');
        $this->seedProjectTypes($organization);

        $this->seedConvertedProject(
            organization: $organization,
            requester: $rachel,
            manager: $jordan,
            department: $this->department($organization, 'kids-ministry'),
            requestAttributes: [
                'title' => 'Back to School Weekend Promotion',
                'ministry_need' => 'Invite families to the fall kickoff and make registration easy to find.',
                'why_it_matters' => 'The kickoff helps new and returning families connect with Kids Ministry.',
                'audience' => 'Families with preschool and elementary-age children',
                'desired_action' => 'Register children and attend the kickoff',
                'desired_tone' => 'Energetic, welcoming, and clear',
                'key_dates_json' => [
                    'event_starts_on' => '2026-08-23',
                    'registration_deadline' => '2026-08-19',
                ],
            ],
            ideas: [
                ['Kickoff landing page', 'Web Page'],
                ['Parent email sequence', 'Email'],
                ['Social promotion set', 'Social Post'],
            ],
            projectTitle: 'Back to School Weekend Communications',
            projectType: 'Event',
        );

        $this->seedConvertedProject(
            organization: $organization,
            requester: $rachel,
            manager: $jordan,
            department: $this->department($organization, 'worship'),
            requestAttributes: [
                'title' => 'Christmas Eve Service Invitation',
                'ministry_need' => 'Create a coordinated invitation plan for Christmas Eve services.',
                'why_it_matters' => 'Members need simple tools to invite neighbors and friends.',
                'audience' => 'Church members and the surrounding community',
                'desired_action' => 'Attend a Christmas Eve service',
                'desired_tone' => 'Warm, hopeful, and personal',
                'key_dates_json' => [
                    'event_starts_on' => '2026-12-24',
                    'needed_by' => '2026-11-22',
                ],
            ],
            ideas: [
                ['Christmas Eve invitation card', 'Print'],
                ['Service invitation video', 'Video'],
                ['Website service information', 'Web Page'],
            ],
            projectTitle: 'Christmas Eve Invitation Project',
            projectType: 'Event',
        );

        $this->seedAcceptedRequest(
            organization: $organization,
            requester: $rachel,
            manager: $jordan,
            department: $this->department($organization, 'administration'),
            requestAttributes: [
                'title' => 'Fall Groups Launch - Ready to Convert',
                'ministry_need' => 'Help people find a fall group and take a clear next step.',
                'why_it_matters' => 'Groups are a primary path for connection and discipleship.',
                'audience' => 'Adults who attend Grace Community Church',
                'desired_action' => 'Explore and join a fall group',
                'desired_tone' => 'Inviting, practical, and encouraging',
                'key_dates_json' => [
                    'event_starts_on' => '2026-09-13',
                    'needed_by' => '2026-08-16',
                ],
            ],
            ideas: [
                ['Groups directory landing page', 'Web Page'],
                ['Launch announcement slides', 'Signage'],
                ['Groups launch email', 'Email'],
            ],
        );
    }

    private function seedProjectTypes(Organization $organization): void
    {
        $deliverableTypes = collect([
            'Branding', 'Email', 'Print', 'Sermon Slide', 'Signage',
            'Social Post', 'Video', 'Web Page',
        ])->mapWithKeys(fn (string $name) => [
            $name => DeliverableType::query()->firstOrCreate(
                ['organization_id' => $organization->id, 'slug' => str($name)->slug()],
                ['name' => $name, 'is_active' => true],
            ),
        ]);

        $this->seedProjectType($organization, 'Sermon Series', 'A recurring teaching series with a coordinated visual and service package.', [
            ['Series branding', 'Branding', 'Core visual direction and reusable series identity.', 35, true],
            ['Sermon slide', 'Sermon Slide', 'Primary teaching slide for the series.', 21, true],
            ['Intro bumper', 'Video', 'Short series introduction video.', 14, false],
            ['Social post set', 'Social Post', 'Launch and weekly social graphics.', 10, false],
            ['Lower third package', 'Video', 'Speaker and scripture lower thirds.', 7, false],
            ['Scripture slide package', 'Sermon Slide', 'Reusable scripture presentation style.', 7, false],
        ], $deliverableTypes);

        $this->seedProjectType($organization, 'Event Promotion', 'A coordinated invitation and information plan for a ministry event.', [
            ['Event landing page', 'Web Page', 'Primary event information and registration destination.', 35, true],
            ['Event branding', 'Branding', 'Event-specific visual direction.', 28, false],
            ['Announcement slides', 'Signage', 'Service and lobby announcement slides.', 21, true],
            ['Email invitation', 'Email', 'Primary invitation email.', 14, false],
            ['Social promotion set', 'Social Post', 'Social invitation and reminder graphics.', 10, false],
            ['Printed invitation', 'Print', 'Optional print invitation or handout.', 21, false],
        ], $deliverableTypes);
    }

    private function seedProjectType(Organization $organization, string $name, string $description, array $templates, $deliverableTypes): void
    {
        $projectType = ProjectType::query()->updateOrCreate(
            ['organization_id' => $organization->id, 'slug' => str($name)->slug()],
            ['name' => $name, 'description' => $description, 'is_active' => true],
        );

        $projectType->deliverableTemplates()->delete();

        foreach ($templates as $index => [$title, $type, $guidance, $offset, $required]) {
            $projectType->deliverableTemplates()->create([
                'organization_id' => $organization->id,
                'deliverable_type_id' => $deliverableTypes[$type]->id,
                'title' => $title,
                'description' => $guidance,
                'suggested_due_offset_days' => $offset,
                'sort_order' => $index,
                'is_required' => $required,
            ]);
        }
    }

    /**
     * @param  array<string, mixed>  $requestAttributes
     * @param  list<array{0: string, 1: string}>  $ideas
     */
    private function seedConvertedProject(
        Organization $organization,
        Profile $requester,
        Profile $manager,
        Department $department,
        array $requestAttributes,
        array $ideas,
        string $projectTitle,
        string $projectType,
    ): Project {
        $request = $this->seedAcceptedRequest(
            $organization,
            $requester,
            $manager,
            $department,
            $requestAttributes,
            $ideas,
        );

        $project = Project::query()->where('source_request_id', $request->id)->first();

        if ($project !== null) {
            return $project;
        }

        return app(ProjectConversionService::class)->convert($request, $manager, [
            'title' => $projectTitle,
            'project_type' => $projectType,
            'idea_ids' => $request->ideas()->pluck('id')->all(),
        ]);
    }

    /**
     * @param  array<string, mixed>  $requestAttributes
     * @param  list<array{0: string, 1: string}>  $ideas
     */
    private function seedAcceptedRequest(
        Organization $organization,
        Profile $requester,
        Profile $manager,
        Department $department,
        array $requestAttributes,
        array $ideas,
    ): MinistryRequest {
        $service = app(RequestIntakeService::class);
        $request = MinistryRequest::query()
            ->where('organization_id', $organization->id)
            ->where('title', $requestAttributes['title'])
            ->first();

        if ($request === null) {
            $request = $service->createRequest($organization, $requester, [
                ...$requestAttributes,
                'department' => $department,
                'assigned_manager' => $manager,
            ]);
        }

        if ($request->status !== RequestStatus::Converted) {
            foreach ($ideas as [$title, $ideaType]) {
                $service->saveIdea($request, [
                    'suggested_by_profile' => $requester,
                    'title' => $title,
                    'idea_type' => $ideaType,
                    'source' => 'Requester',
                    'triage_decision' => 'Suggested',
                ]);
            }
        }

        if ($request->status === RequestStatus::Draft) {
            $request = $service->transition($request, RequestStatus::Submitted, $requester);
        }

        if ($request->status === RequestStatus::Submitted) {
            $request = $service->transition($request, RequestStatus::InTriage, $manager);
        }

        if ($request->status === RequestStatus::InTriage) {
            $request = $service->transition($request, RequestStatus::Accepted, $manager, 'Ready for project planning.');
        }

        return $request->refresh();
    }

    private function profile(Organization $organization, string $displayName): Profile
    {
        return Profile::query()
            ->where('organization_id', $organization->id)
            ->where('display_name', $displayName)
            ->firstOrFail();
    }

    private function department(Organization $organization, string $slug): Department
    {
        return Department::query()
            ->where('organization_id', $organization->id)
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
