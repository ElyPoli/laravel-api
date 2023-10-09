<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsUpsertRequest extends FormRequest
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
            "title" => "required|string|max:200",
            "description" => "nullable|string",
            "tools_used" => "required|string",
            "repository_link" => "required|string",
            "url" => "required|string"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio.',
            'title.max' => 'Il titolo non può superare i :max caratteri.',
            'tools_used.required' => 'Il campo strumenti utilizzati è obbligatorio.',
            'repository_link.required' => 'Il campo link del repository è obbligatorio.',
            'url.required' => 'Il campo URL è obbligatorio.',
        ];
    }
}
