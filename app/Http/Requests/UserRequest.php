<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nom' => 'required|string|alpha|max:255',
            'prenom' => 'required|string|alpha|max:255',
            'sexe' => 'required|string',
            'telephone' => 'required|string|digits:9|numeric',
            'role' => 'required|string',
            'filiere' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'L\'adresse email est obligatoire pour inscrire un utilisateur.',
            'email.email' => 'L\'adresse email doit être une adresse email valide.',
            'email.unique' => 'Cette adresse email existe déjà.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit comporter des chaînes de caractères.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.string' => 'Le prénom doit comporter des chaînes de caractères.',
            'nom.alpha' => 'Erreur de saisie. Le nom doit contenir uniquement des lettres.',
            'prenom.alpha' => 'Erreur de saisie. Le prénom doit contenir uniquement des lettres.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.digits' => 'Le numéro de téléphone n\'est pas valide.',
            'telephone.numeric' => 'Erreur de saisie. Veuillez entrer uniquement des chiffres.',

        ];
    }
}
