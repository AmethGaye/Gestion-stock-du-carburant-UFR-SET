<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Remboursement_vac;
use App\Models\User;
use App\Models\Vacataire;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        if(auth()->user()->role == 'admin'){
            $users = User::latest()->limit(4)->get();
            return view('users.admin.dashboard', compact('users'));
        }

        
        if(auth()->user()->role == 'directeur'){
            $activites = Activite::latest()->limit(4)->get();
            $remboursements = Remboursement_vac::latest()->limit(4)->get();
            // dd($remboursements);
            return view('users.directeur.dashboard', compact('remboursements', 'activites'));
        }

        if(auth()->user()->role == 'chef_departement' || auth()->user()->role == 'assistant'){
            $users = User::latest()->limit(4)->get();
            $vacataires = Vacataire::latest()->limit(5)->get();
            return view('users.departement.dashboard', compact('users', 'vacataires'));
        }

        if(auth()->user()->role == 'comptable'){
            return view('users.comptable.dashboard');
        }


    }
}
