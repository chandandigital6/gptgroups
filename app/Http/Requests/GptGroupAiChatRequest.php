<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GptGroupAiChatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message' => [
                'required',
                'string',
                'max:5000',
            ],

            'conversation_id' => [
                'nullable',
                'uuid',
            ],

            'language' => [
                'nullable',
                'string',
                'in:en,ar,hi',
            ],

            'page_url' => [
                'nullable',
                'url',
                'max:2000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'message.required' =>
                'Please enter a message.',
            'message.max' =>
                'The message is too long.',
            'conversation_id.uuid' =>
                'The conversation ID is invalid.',
        ];
    }
}