<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MinistryRequestFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'department_id' => ['nullable', 'integer'],
            'ministry_need' => ['nullable', 'required_if:intent,submit', 'string', 'max:5000'],
            'why_it_matters' => ['nullable', 'string', 'max:5000'],
            'audience' => ['nullable', 'string', 'max:5000'],
            'desired_action' => ['nullable', 'string', 'max:5000'],
            'desired_tone' => ['nullable', 'string', 'max:2000'],
            'event_date' => ['nullable', 'date'],
            'needed_by' => ['nullable', 'date'],
            'known_constraints' => ['nullable', 'string', 'max:5000'],
            'intent' => ['required', 'in:draft,submit'],
        ];
    }
}
