<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvertRequestToProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'project_type_id' => ['nullable', 'integer', 'exists:project_types,id'],
            'project_type' => ['nullable', 'string', 'max:255'],
            'idea_ids' => ['nullable', 'array'],
            'idea_ids.*' => ['integer', 'distinct'],
            'template_deliverable_ids' => ['nullable', 'array'],
            'template_deliverable_ids.*' => ['integer', 'distinct'],
        ];
    }
}
