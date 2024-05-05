<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function store(Request $request){
        
        if($request->tickets > 0){
            if(Stock::all()->count() >= 1){
                $stock = Stock::latest()->get()->first();
                $new_volume = $stock->volume + $request->tickets * 10;
                $price = $stock->prix_unitaire;
                $nombre_tickets = $stock->nombre_ticket + $request->tickets;
    
                Stock::create([
                    'volume' => $new_volume,
                    'prix_unitaire' => $price, 
                    'prix_total' => $price * $new_volume, 
                    'nombre_ticket' => $nombre_tickets, 
                    'tickets_apres_entrees' => $nombre_tickets, 
                    'entrees' => $request->tickets, 
                    'sorties' => 0
                ]);
            }else{
                Stock::create([
                    'volume' => $request->tickets * 10,
                    'prix_unitaire' => 300, 
                    'prix_total' => 300 * $request->tickets * 10, 
                    'nombre_ticket' => $request->tickets, 
                    'tickets_apres_entrees' => $request->tickets,
                    'entrees' => $request->tickets, 
                    'sorties' => 0
                ]);
            }
    
            return back()->with('success', 'Le stock est renouvelé avec succés !');
        }else{

            return back();
        }
        
        // $stock = Stock::latest()->get()->first();
        // $new_volume = $stock->volume + $request->tickets * 10;
        // $price = $stock->prix_unitaire;
        // $nombre_tickets = $stock->nombre_ticket + $request->tickets;

        // Stock::create([
        //     'volume' => $new_volume,
        //     'prix_unitaire' => $price, 
        //     'prix_total' => $price * $new_volume, 
        //     'nombre_ticket' => $nombre_tickets, 
        //     'entrees' => $request->tickets, 
        //     'sorties' => 0
        // ]);
        //     return back()->with('success', 'Le stock est renouvelé avec succés !');

    }

    public function reset(){
        $last = Stock::latest()->first();        
        $last->delete();

        return back()->with('success', 'Renouvellement annulé !');
    }
}
