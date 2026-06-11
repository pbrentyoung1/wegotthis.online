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
            'project_type' => ['required', 'in:Standard,Administrative,Event,Other'],
            'idea_ids' => ['nullable', 'array'],
            'idea_ids.*' => ['integer', 'distinct'],
        ];
    }
}
