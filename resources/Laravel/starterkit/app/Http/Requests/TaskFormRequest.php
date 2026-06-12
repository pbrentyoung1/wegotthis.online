<?php

namespace App\Http\Requests;

use App\Enums\TaskStatus;
use App\Enums\TaskType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'task_type' => ['nullable', Rule::enum(TaskType::class)],
            'description' => ['nullable', 'string', 'max:20000'],
            'assigned_to_profile_id' => [
                'nullable',
                'integer',
                Rule::exists('profiles', 'id')->where('organization_id', $this->route('project')->organization_id),
            ],
            'status' => ['required', Rule::enum(TaskStatus::class)],
            'priority' => ['nullable', 'string', 'in:Normal,High,Urgent'],
            'due_date' => ['nullable', 'date'],
            'time_budget_minutes' => ['nullable', 'integer', 'min:1', 'max:100000'],
            'blocker_type' => [
                Rule::requiredIf($this->input('status') === TaskStatus::Blocked->value),
                'nullable',
                'string',
                'in:Over Capacity,Waiting on Department,Waiting on Approval,Vendor Needed,Missing Information,Missing Asset,Budget,Technical,Scheduling,Scope Decision',
            ],
            'blocker_reason' => [
                Rule::requiredIf($this->input('status') === TaskStatus::Blocked->value),
                'nullable',
                'string',
                'max:2000',
            ],
        ];
    }
}
