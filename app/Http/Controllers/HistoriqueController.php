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

        $depart = Dotation_depart::all();
        $total_depart = Dotation_depart::sum('nombre_tickets');
        $admin = Dotation_admin::all();

        return view('users.comptable.historique', compact('depart', 'admin', 'total_depart'));
    }
}
