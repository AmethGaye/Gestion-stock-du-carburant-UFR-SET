<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Dotation_depart;

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

        $stock = Stock::latest()->first();
        if($request->ticket < $stock->nombre_ticket){
            Dotation_depart::create([
                'nombre_tickets' => $validated['ticket'],
                'departement_id' => $validated['departement'],
                'statut' => 1,
                'user_id' => auth()->user()->getAuthIdentifier()
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
            return redirect()->back()->withSuccess('Dotation du département réussie !');
        }else{
            return redirect()->back()->withFail('Le stock est insuffisant'); 
        }
    }
}
