<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\Dotation_admin;

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

        

        $stock = Stock::latest()->first();
        if($request->ticket < $stock->nombre_ticket){
            Dotation_admin::create([
                'nom' => $validated['nom'],
                'email' => $validated['email'],
                'nombre_tickets' =>$validated['ticket'],
                'statut' => 1,
                'user_id' => auth()->user()->getAuthIdentifier(),
            ]);
            $price = $stock->prix_unitaire;
            $nombre_tickets = $stock->nombre_ticket - $request->ticket;
            $new_volume = $nombre_tickets * 10;
            $sorties = $stock->sorties + $request->ticket;
            $stock->update([
                'volume' => $new_volume, 
                'prix_total' => $price * $new_volume, 
                'nombre_ticket' => $nombre_tickets,  
                'sorties' => $sorties
            ]);
            $stock->save();
            return redirect()->back()->withSuccess( 'l\'opération est réussie avec succès !');
        }else{
            return redirect()->back()->withFail('Le stock est insuffisant'); 
        }
    }
}
