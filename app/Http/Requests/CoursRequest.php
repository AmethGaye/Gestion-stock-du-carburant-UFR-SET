<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursRequest extends FormRequest
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
            //
        ];
    }
    public function messages()
    {
        return [
            'filiere.required' => 'Le champ filière est obligatoire.',
            'filiere.string' => 'Le champ filière doit être une chaîne de caractères.',
            'filiere.numeric' => 'Le champ filière doit être un nombre.',

            'matiere_id.required' => 'Le champ matière est obligatoire.',
            'matiere_id.numeric' => 'Le champ matière doit être un nombre.',

            'vacataire_id.required' => 'Le champ vacataire est obligatoire.',
            'vacataire_id.numeric' => 'Le champ vacataire doit être un nombre.',

            'date.required' => 'Le champ date est obligatoire.',
            'date.date' => 'Le champ date doit être une date valide.',

            'remarque.string' => 'Le champ remarque doit être une chaîne de caractères.',
        ];
    }

}
