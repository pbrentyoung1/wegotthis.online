<?php

namespace Database\Seeders;

use App\Enums\RequestStatus;
use App\Models\Department;
use App\Models\MinistryRequest;
use App\Models\Organization;
use App\Models\Profile;
use App\Services\RequestIntakeService;
use Illuminate\Database\Seeder;

class Phase2RequestIntakeScenarioSeeder extends Seeder
{
    /**
     * Seed the Grace Community Church request intake scenario.
     */
    public function run(): void
    {
        $this->call(Phase1ScenarioSeeder::class);

        $organization = Organization::query()->where('slug', 'grace-community-church')->firstOrFail();
        $kidsMinistry = Department::query()
            ->where('organization_id', $organization->id)
            ->where('slug', 'kids-ministry')
            ->firstOrFail();
        $rachel = $this->profile($organization, 'Rachel Kim');
        $jordan = $this->profile($organization, 'Jordan Lee');
        $service = app(RequestIntakeService::class);

        $request = MinistryRequest::query()
            ->where('organization_id', $organization->id)
            ->where('title', 'VBS Promotion Support')
            ->first();

        if ($request === null) {
            $request = $service->createRequest($organization, $rachel, [
                'department' => $kidsMinistry,
                'assigned_manager' => $jordan,
                'title' => 'VBS Promotion Support',
                'ministry_need' => 'Help families understand VBS and register.',
                'why_it_matters' => 'Families need a clear invitation and registration path.',
                'audience' => 'Families with elementary-age children',
                'desired_action' => 'Register for VBS',
                'desired_tone' => 'Welcoming, joyful, and clear',
                'key_dates_json' => [
                    'event_starts_on' => '2026-07-13',
                    'registration_deadline' => '2026-07-06',
                ],
            ]);
        }

        $service->saveAnswer($request, [
            'question_key' => 'success_looks_like',
            'question_label' => 'What would success look like?',
            'answer_type' => 'text',
            'answer_value' => 'Families understand VBS and complete registration.',
            'sort_order' => 1,
        ]);

        $service->saveAnswer($request, [
            'question_key' => 'existing_assets',
            'question_label' => 'What files, examples, or links do you already have?',
            'answer_type' => 'json',
            'answer_json' => [
                'registration_url' => 'https://example.test/vbs',
                'has_logo' => true,
            ],
            'sort_order' => 2,
        ]);

        foreach ([
            ['Social posts', 'Social Post'],
            ['Service slide', 'Signage'],
            ['Outside banner', 'Signage'],
        ] as [$title, $ideaType]) {
            $service->saveIdea($request, [
                'suggested_by_profile' => $rachel,
                'title' => $title,
                'idea_type' => $ideaType,
                'source' => 'Requester',
                'triage_decision' => 'Suggested',
            ]);
        }

        if ($request->status === RequestStatus::Draft) {
            $service->transition($request, RequestStatus::Submitted, $rachel);
        }
    }

    private function profile(Organization $organization, string $displayName): Profile
    {
        return Profile::query()
            ->where('organization_id', $organization->id)
            ->where('display_name', $displayName)
            ->firstOrFail();
    }
}
