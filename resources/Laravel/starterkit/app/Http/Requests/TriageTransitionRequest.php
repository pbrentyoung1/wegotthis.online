<?php

namespace App\Http\Requests;

use App\Enums\RequestStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TriageTransitionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required', Rule::enum(RequestStatus::class)],
            'notes' => [
                Rule::requiredIf(fn () => in_array($this->string('status')->toString(), [
                    RequestStatus::NeedsClarification->value,
                    RequestStatus::Deferred->value,
                    RequestStatus::Rejected->value,
                ], true)),
                'nullable',
                'string',
                'max:5000',
            ],
            'triage_summary' => ['nullable', 'string', 'max:5000'],
        ];
    }
}
