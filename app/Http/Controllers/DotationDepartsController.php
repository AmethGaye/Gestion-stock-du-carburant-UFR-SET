<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Dotation_depart;
use Illuminate\Http\Request;

class DotationDepartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $departements = Departement::all();
        return view('users.comptable.departement', compact('departements'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'departement' => 'required',
            'ticket'=>'required|numeric',
        ], [
            'ticket.required'=>'Le nombre de ticket est obligatoire', 
            'departement.required' => 'veillez sélectionner un département',
         ]);

        if($validated){
            Dotation_depart::create([
                'nombre_tickets' => $validated['ticket'],
                'departement_id' => $validated['departement'],
                'statut' => 1,
                'user_id' => auth()->user()->getAuthIdentifier()
            ]);
            return redirect()->back()->with('success', 'Dotation du département réussie !');
        }
    }
}
