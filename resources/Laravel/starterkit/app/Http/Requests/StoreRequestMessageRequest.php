<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequestMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['required', 'string', 'max:5000'],
            'intent' => ['nullable', Rule::in(['message', 'clarification'])],
            'parent_message_id' => ['nullable', 'integer', 'exists:messages,id'],
        ];
    }
}
