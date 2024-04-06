<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        if(auth()->user()->role == 'admin'){
            return view('users.admin.dashboard');
        }

        
        if(auth()->user()->role == 'directeur'){
            return view('users.directeur.dashboard');
        }

        if(auth()->user()->role == 'chef_departement' || auth()->user()->role == 'assistant'){
            return view('users.departement.dashboard');
        }

        if(auth()->user()->role == 'comptable'){
            return view('users.comptable.dashboard');
        }


    }
}
