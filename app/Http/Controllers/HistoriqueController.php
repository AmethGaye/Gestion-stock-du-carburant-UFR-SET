<?php

namespace App\Http\Controllers;

use App\Models\Dotation_admin;
use App\Models\Dotation_depart;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $dotation_depart = Dotation_depart::all();
        $total_dep = Dotation_depart::sum('nombre_tickets');
        $dotation_admin = Dotation_admin::all();
        $total_admin = Dotation_admin::sum('nombre_tickets');

        return view('users.comptable.historique', compact('dotation_depart', 'dotation_admin', 'total_dep', 'total_admin'));
    }

  public function  filtre_historique(Request $request){
    dd($request->all());

    }
}
