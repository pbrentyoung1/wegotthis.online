<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeliverableFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'deliverable_type_id' => [
                'nullable',
                'integer',
                Rule::exists('deliverable_types', 'id')
                    ->where('organization_id', $this->route('project')->organization_id),
            ],
            'description' => ['nullable', 'string', 'max:20000'],
            'purpose' => ['nullable', 'string', 'max:20000'],
            'audience' => ['nullable', 'string', 'max:1000'],
            'desired_action' => ['nullable', 'string', 'max:1000'],
            'owner_profile_id' => ['nullable', 'integer', 'exists:profiles,id'],
            'internal_reviewer_profile_id' => ['nullable', 'integer', 'exists:profiles,id'],
            'stakeholder_reviewer_profile_id' => ['nullable', 'integer', 'exists:profiles,id'],
            'due_date' => ['nullable', 'date'],
            'publish_date' => ['nullable', 'date'],
            'attention_state' => ['nullable', 'string', 'in:On Track,Needs Attention,At Risk,On Hold'],
        ];
    }
}
