<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypesUpsertRequest extends FormRequest
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
            "name" => "required|string|max:100",
            "color" => "required|string|max:100",
            "description" => "nullable|string"
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
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.max' => 'Il nome non può superare i :max caratteri.',
            'color.required' => 'Il campo colore è obbligatorio.',
        ];
    }
}
