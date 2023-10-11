<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsAddRequest extends FormRequest
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
            "thumbnail" => "required|image|max:10240",
            "tools_used" => "required",
            "repository_link" => "required|string",
            "url" => "required|string",
            "type_id" => "nullable|exists:types,id" // "exists" verifica che l'id esiste nella tabella indicata
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
            'thumbnail.required' => 'Il campo immagine è obbligatorio.',
            'thumbnail.image' => 'Il file deve essere un\'immagine.',
            'thumbnail.max' => 'L\'immagine non può superare 10 MB.',
            'tools_used.required' => 'Seleziona almeno uno strumento.',
            'repository_link.required' => 'Il campo link del repository è obbligatorio.',
            'url.required' => 'Il campo URL è obbligatorio.'
        ];
    }
}
