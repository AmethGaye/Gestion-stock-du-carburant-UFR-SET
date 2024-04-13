<?php

namespace App\Http\Requests;

Trait ActiviteRequestValidation
{

    public function rules(): array
    {
        return [
            'titre'=>'required|string',
            'description'=>'required|string',
            'lieux'=>'required',
            'adresse'=>'required|string',
            'date'=>'required|date',
            'ticket_demande'=>'required|numeric',

        ];
    }
   public function messages()
{
    return [
        'titre.required'=>'Le titre est obligatoire',
        'titre.string'=>'Le titre doit contenir une chaine de caractères',
        'description.required'=>'La description est obligatoire',
        'description.string'=>'La description doit contenir des chaines de caractères',
        'lieux.required'=>'Le lieu est obligatoire',
        'ticket_demande.required'=>'Le nombre de ticket est obligatoire',
        'ticket.numeric'=>'Le champs ticket doit contenir un nombre',
        'date.required'=>'La date est obligatoire',
        'date.date'=>'Entrer une date valide',
        'adresse.required'=>'L\'adresse est obligatoire',
        'adresse.string'=>'L\'adresse est obligatoire  doit contenir des chaines de caratères',

    ];
}
}
