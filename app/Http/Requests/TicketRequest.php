<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'submitter_name' => 'required|min:3|string',
            'submitter_email' => ['required', 'email:filter'],
            'title' => ['required', 'min:5', 'string'],
            'content' => ['nullable', 'sometimes', 'min:5']
        ];
    }
}