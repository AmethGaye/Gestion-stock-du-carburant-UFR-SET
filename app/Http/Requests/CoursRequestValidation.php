<?php

namespace App\Http\Requests;


Trait CoursRequestValidation
{

    public function rules(): array
    {
        return [
            'filiere'=>'required|string|numeric',
            'matiere_id'=>'required|string|numeric',
            'vacataire_id'=>'required|string|numeric',
            'date'=>'required|date',
            'remarque'=>'string',
            'heure'=>'required|string|numeric',
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
            'heure.required'=>'Le champ heure est obligatoire.'
        ];
    }


}
