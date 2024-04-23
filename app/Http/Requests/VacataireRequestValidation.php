<?php

namespace App\Http\Requests;

Trait VacataireRequestValidation
{

   
    public function rules($edit = false): array
    {
        $rule = ($edit) ? 'required|email' : 'required|email|unique:vacataires';

        return [
            'nom' => 'required|string|alpha|max:255',
            'prenom' => 'required|string|alpha|max:255',
            'sexe' => 'required|string',
            'telephone' => 'required|string|digits:9|numeric',
            'email'=> $rule,
            'provenance'=>'required|string',
            'status'=>'required|string',
            'situation'=>'required|string',
            'ufr_id'=>'required|string',
        ];


    }

    public function messages()
    {

        return [
            'email.required' => 'L\'adresse email est obligatoire pour inscrire un vacataire.',
            'email.email' => 'L\'adresse email doit être une adresse email valide.',
            'email.unique' => 'Cette adresse email existe déjà.',
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit comporter des chaînes de caractères.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.string' => 'Le prénom doit comporter des chaînes de caractères.',
            'nom.alpha' => 'Erreur de saisie. Le nom doit contenir uniquement des lettres.',
            'prenom.alpha' => 'Erreur de saisie. Le prénom doit contenir uniquement des lettres.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.digits' => 'Le numéro de téléphone n\'est pas valide.Il doit contenir 9 chiffres',
            'telephone.numeric' => 'Erreur de saisie. Veuillez entrer uniquement des chiffres.',
            'provenance.string'=>'Le champs doit contenir des chaines de caracteres',
            'provenance.required'=>'Le champs provenance est obligatoire',
            'situation.required'=>'Le champs situation est obligatoire',
            'situation.string'=>'Le champs doit contenir des chaines de carateres',

        ];
    }
}
