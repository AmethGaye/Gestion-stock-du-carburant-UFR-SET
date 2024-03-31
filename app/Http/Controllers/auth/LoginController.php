<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   
    /**
     * renvoie le formulaire de connexion
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * valider ou non l'authentification de l'utlisateur
     */
    public function store(Request $request)
    {
        //
    }

   
}
