<?php

namespace App\Http\Controllers;

use App\Models\Dotation_admin;
use Illuminate\Http\Request;

class DotationAdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('users.comptable.administration');
    }

    public function store(Request $request){
        $validated = $request->validate(
            [
                'nom' => 'required|string',
                'email' => 'required|email|unique:users',
                'ticket' => 'required|integer',
            ],
            [
                'nom.required' => 'Le nom est obligatoire.',
                'nom.string' => 'Le nom doit comporter des chaînes de caractères.',
                'email.required' => 'L\'adresse email est obligatoire.',
                'email.email' => 'L\'adresse email doit être une adresse email valide.',
                'email.unique' => 'Cette adresse email existe déjà.',
                'ticket.required' => 'Le nombre de tickets est obligatoire',
                'ticket.numeric' => 'Le nombre de ticket doit être un entier positif'
            ]
        );

        if($validated){
            Dotation_admin::create([
                'nom' => $validated['nom'],
                'email' => $validated['email'],
                'nombre_tickets' =>$validated['ticket'],
                'statut' => 1,
                'user_id' => auth()->user()->getAuthIdentifier(),
            ]);
            return redirect()->back()->with('success', 'l\'opération est réussie avec succès !');
        }
    }
}
