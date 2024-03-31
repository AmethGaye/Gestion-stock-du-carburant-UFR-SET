<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /**
     * renvoie la vue de changement de mot de passe.
     */
    public function create()
    {
        return view('auth.reset-password');
    }

    /**
     * mettre a jour le mot de passe dans base de donnee
     */
    public function update(Request $request, string $id)
    {
        //
    }

}
