<?php

namespace App\Http\Requests;


Trait CoursRequestValidation
{

    public function rules(): array
    {
        return [
            'filiere_id'=>'required|string|numeric',
            'matiere_id'=>'required|string|numeric',
            'vacataire_id'=>'required|string|numeric',
            'date'=>'required|date',
            'remarque'=>'string',
            'duree'=>'required|string|numeric',
        ];
    }

    public function messages()
    {
        return [
            'filiere_id.required' => 'Le champ filière est obligatoire.',
            'filiere_id.string' => 'Le champ filière doit être une chaîne de caractères.',
            'filiere_id.numeric' => 'Le champ filière doit être un nombre.',

            'matiere_id.required' => 'Le champ matière est obligatoire.',
            'matiere_id.numeric' => 'Le champ matière doit être un nombre.',

            'vacataire_id.required' => 'Le champ vacataire est obligatoire.',
            'vacataire_id.numeric' => 'Le champ vacataire doit être un nombre.',

            'date.required' => 'Le champ date est obligatoire.',
            'date.date' => 'Le champ date doit être une date valide.',

            'remarque.string' => 'Le champ remarque doit être une chaîne de caractères.',
            'duree.required'=>'Le champ heure est obligatoire.'
        ];
    }


}
