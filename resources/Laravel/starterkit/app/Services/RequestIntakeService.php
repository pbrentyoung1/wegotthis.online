<?php

namespace App\Services;

use App\Enums\RequestStatus;
use App\Models\Department;
use App\Models\MinistryRequest;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\RequestAnswer;
use App\Models\RequestIdea;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class RequestIntakeService
{
    /**
     * @param  array<string, mixed>  $attributes
     */
    public function createRequest(Organization $organization, Profile $requester, array $attributes): MinistryRequest
    {
        $department = $attributes['department'] ?? null;
        $assignedManager = $attributes['assigned_manager'] ?? null;

        $this->assertSameOrganization($organization->id, $requester, 'requester_profile_id');
        $this->assertOptionalSameOrganization($organization->id, $department, 'department_id');
        $this->assertOptionalSameOrganization($organization->id, $assignedManager, 'assigned_manager_profile_id');

        return MinistryRequest::query()->create([
            ...Arr::except($attributes, ['department', 'assigned_manager']),
            'organization_id' => $organization->id,
            'department_id' => $department?->id,
            'requester_profile_id' => $requester->id,
            'assigned_manager_profile_id' => $assignedManager?->id,
            'status' => RequestStatus::Draft,
        ]);
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function saveAnswer(MinistryRequest $request, array $attributes): RequestAnswer
    {
        $this->assertRequestedOrganization($request, $attributes);

        return RequestAnswer::query()->updateOrCreate(
            [
                'request_id' => $request->id,
                'question_key' => $attributes['question_key'],
            ],
            [
                ...Arr::except($attributes, ['organization_id', 'request_id', 'question_key']),
                'organization_id' => $request->organization_id,
            ],
        );
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function saveIdea(MinistryRequest $request, array $attributes): RequestIdea
    {
        $suggestedByProfile = $attributes['suggested_by_profile'] ?? null;

        $this->assertRequestedOrganization($request, $attributes);
        $this->assertOptionalSameOrganization(
            $request->organization_id,
            $suggestedByProfile,
            'suggested_by_profile_id',
        );

        return RequestIdea::query()->updateOrCreate(
            [
                'request_id' => $request->id,
                'title' => $attributes['title'],
            ],
            [
                ...Arr::except($attributes, ['organization_id', 'request_id', 'suggested_by_profile', 'title']),
                'organization_id' => $request->organization_id,
                'suggested_by_profile_id' => $suggestedByProfile?->id,
            ],
        );
    }

    public function transition(MinistryRequest $request, RequestStatus $to, Profile $actor, ?string $decisionNotes = null): MinistryRequest
    {
        $this->assertSameOrganization($request->organization_id, $actor, 'actor_profile_id');

        $from = $request->status;
        $allowed = $this->allowedTransitions($request, $actor);

        if (! in_array($to, $allowed, true)) {
            throw ValidationException::withMessages([
                'status' => "The request cannot transition from {$from->value} to {$to->value} for this actor.",
            ]);
        }

        if ($to === RequestStatus::Submitted && blank($request->ministry_need)) {
            throw ValidationException::withMessages([
                'ministry_need' => 'A ministry need is required before submission.',
            ]);
        }

        $updates = ['status' => $to];

        if ($to === RequestStatus::Submitted) {
            $updates['submitted_at'] = now();
        }

        if (in_array($to, [RequestStatus::Accepted, RequestStatus::Deferred, RequestStatus::Rejected], true)) {
            $updates['decision_at'] = now();
            $updates['decision_by_profile_id'] = $actor->id;
            $updates['decision_notes'] = $decisionNotes;
        }

        if ($to === RequestStatus::Archived) {
            $updates['archived_at'] = now();
        }

        $request->update($updates);

        return $request->refresh();
    }

    /**
     * @return list<RequestStatus>
     */
    private function allowedTransitions(MinistryRequest $request, Profile $actor): array
    {
        $isRequester = $request->requester_profile_id === $actor->id;
        $isAdmin = $this->hasActiveRole($actor, 'organization-admin');
        $isManager = $this->hasActiveRole($actor, 'communications-manager');

        return match ($request->status) {
            RequestStatus::Draft => $isRequester || $isAdmin
                ? [RequestStatus::Submitted, RequestStatus::Archived]
                : [],
            RequestStatus::Submitted => $isManager || $isAdmin
                ? [RequestStatus::NeedsClarification, RequestStatus::InTriage, RequestStatus::Deferred, RequestStatus::Rejected, RequestStatus::Archived]
                : [],
            RequestStatus::NeedsClarification => $isAdmin
                ? [RequestStatus::Submitted, RequestStatus::InTriage, RequestStatus::Deferred, RequestStatus::Rejected, RequestStatus::Archived]
                : ($isRequester
                    ? [RequestStatus::Submitted]
                    : ($isManager ? [RequestStatus::InTriage, RequestStatus::Deferred, RequestStatus::Rejected, RequestStatus::Archived] : [])),
            RequestStatus::InTriage => $isManager || $isAdmin
                ? [RequestStatus::NeedsClarification, RequestStatus::Accepted, RequestStatus::Deferred, RequestStatus::Rejected, RequestStatus::Archived]
                : [],
            RequestStatus::Accepted => $isManager || $isAdmin
                ? [RequestStatus::Converted, RequestStatus::Deferred, RequestStatus::Archived]
                : [],
            RequestStatus::Deferred => $isManager || $isAdmin
                ? [RequestStatus::InTriage, RequestStatus::Rejected, RequestStatus::Archived]
                : [],
            RequestStatus::Rejected, RequestStatus::Converted => $isManager || $isAdmin
                ? [RequestStatus::Archived]
                : [],
            RequestStatus::Archived => [],
        };
    }

    private function hasActiveRole(Profile $profile, string $roleSlug): bool
    {
        return $profile->roleAssignments()
            ->whereNull('ended_at')
            ->whereHas('role', fn ($query) => $query->where('slug', $roleSlug))
            ->exists();
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    private function assertRequestedOrganization(MinistryRequest $request, array $attributes): void
    {
        if (isset($attributes['organization_id']) && $attributes['organization_id'] !== $request->organization_id) {
            throw ValidationException::withMessages([
                'organization_id' => 'The related record must belong to the request organization.',
            ]);
        }

        if (isset($attributes['request_id']) && $attributes['request_id'] !== $request->id) {
            throw ValidationException::withMessages([
                'request_id' => 'The related record must belong to the provided request.',
            ]);
        }
    }

    private function assertOptionalSameOrganization(int $organizationId, Department|Profile|null $related, string $field): void
    {
        if ($related !== null) {
            $this->assertSameOrganization($organizationId, $related, $field);
        }
    }

    private function assertSameOrganization(int $organizationId, Department|Profile $related, string $field): void
    {
        if ($related->organization_id !== $organizationId) {
            throw ValidationException::withMessages([
                $field => 'The related record must belong to the request organization.',
            ]);
        }
    }
}
