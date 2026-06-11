<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MinistryRequestFormRequest extends FormRequest
{
    public function rules(): array
    {
        $organizationId = $this->user()
            ?->profiles()
            ->where('status', 'Active')
            ->orderBy('id')
            ->value('organization_id');

        return [
            'title' => ['required', 'string', 'max:255'],
            'department_id' => ['nullable', 'integer'],
            'ministry_need' => ['nullable', 'required_if:intent,submit', 'string', 'max:5000'],
            'why_it_matters' => ['nullable', 'string', 'max:5000'],
            'audience' => ['nullable', 'string', 'max:5000'],
            'desired_action' => ['nullable', 'string', 'max:5000'],
            'desired_tone' => ['nullable', 'string', 'max:2000'],
            'event_date' => ['nullable', 'date'],
            'action_deadline' => ['nullable', 'date'],
            'needed_by' => ['nullable', 'date'],
            'known_constraints' => ['nullable', 'string', 'max:5000'],
            'success_looks_like' => ['nullable', 'string', 'max:5000'],
            'key_message' => ['nullable', 'string', 'max:5000'],
            'asset_links' => ['nullable', 'array', 'max:20'],
            'asset_links.*.label' => ['nullable', 'string', 'max:255'],
            'asset_links.*.url' => ['nullable', 'required_with:asset_links.*.label', 'url:http,https', 'max:2048'],
            'reviewer_profile_ids' => ['nullable', 'array', 'max:20'],
            'reviewer_profile_ids.*' => [
                'integer',
                'distinct',
                Rule::exists('profiles', 'id')->where(fn ($query) => $query
                    ->where('organization_id', $organizationId)
                    ->where('status', 'Active')),
            ],
            'sensitivities' => ['nullable', 'string', 'max:5000'],
            'intent' => ['required', 'in:draft,submit'],
        ];
    }
}
