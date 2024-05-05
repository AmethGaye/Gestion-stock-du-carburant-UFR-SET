<?php

namespace App\Http\Controllers;

use App\Models\Dotation_admin;
use App\Models\Dotation_depart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $debut_mois = Carbon::now()->startOfMonth();
        $fin_mois = Carbon::now()->endOfMonth();
        
        $dotation_depart = Dotation_depart::whereBetween('created_at', [$debut_mois, $fin_mois])->get();
        $total_dep = Dotation_depart::sum('nombre_tickets');
        $dotation_admin = Dotation_admin::whereBetween('created_at', [$debut_mois, $fin_mois])->get();
        $total_admin = Dotation_admin::sum('nombre_tickets');
        $current_month = Carbon::now()->translatedFormat('F');

        return view('users.comptable.historique', compact('dotation_depart', 'dotation_admin', 'total_dep', 'total_admin', 'current_month'));
    }
    public function search(Request $request ){
        $search = $request->input('search','');
        $search = "%{$search}%";
        

        $dotation_depart = Dotation_depart::query()->whereAny(['statut','nombre_tickets'],'like',$search)
                                           ->orWhereHas('departement', function($query) use ($search) {
                                             $query->where('nom', 'like', $search);})
                                            ->get();
        $total_dep = Dotation_depart::sum('nombre_tickets');
        $dotation_admin = Dotation_admin::query()->whereAny(['nom','statut','nombre_tickets','user_id'],'like',$search)->get();
        $total_admin = Dotation_admin::sum('nombre_tickets');

        return view('users.comptable.historique', compact('dotation_depart', 'dotation_admin', 'total_dep', 'total_admin'));
    }

    public function filtre_historique(Request $request)
    {
    
        $dotation_depart = Dotation_depart::query();
        $dotation_admin = Dotation_admin::query();
    
        $total_dep = Dotation_depart::sum('nombre_tickets');
        $total_admin = Dotation_admin::sum('nombre_tickets');
    
        if ($request->filled('order')) {
            foreach ($request->order as $order) {
                if ($order == 'nom') {
                    $dotation_admin->orderBy($order, 'asc');
                } else {
                    $dotation_depart->orderBy($order, 'asc');
                    $dotation_admin->orderBy($order, 'asc');
                }
            }
        }
    
        
        if ($request->filled('statut')) {
           
            $dotation_admin->where('statut', $request->statut);
            $dotation_depart->where('statut', $request->statut);
        }
    
        
        $dotation_admin = $dotation_admin->get();
        $dotation_depart = $dotation_depart->get();
    
        return view('users.comptable.historique', compact('dotation_depart', 'dotation_admin', 'total_dep', 'total_admin'));
    }

    public function filtre_historique_month(Request $request){
        $dotation_depart = Dotation_depart::query();
        $dotation_admin = Dotation_admin::query();
    
        $total_dep = Dotation_depart::sum('nombre_tickets');
        $total_admin = Dotation_admin::sum('nombre_tickets');
        $num_month=$request->month;
        $startOfMonth=Carbon::create(null , $num_month,1)->startOfMonth();
        $endOfMonth=Carbon::create(null, $num_month,1)->endOfMonth();

        $dotation_admin->whereBetween('created_at',[$startOfMonth,$endOfMonth]);
        $dotation_depart->whereBetween('created_at',[$startOfMonth,$endOfMonth]);

        $dotation_admin=$dotation_admin->get();
        $dotation_depart=$dotation_depart->get();
      
        return view('users.comptable.historique', compact('dotation_depart', 'dotation_admin', 'total_dep', 'total_admin'));

    }
}