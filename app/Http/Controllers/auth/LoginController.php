<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * renvoie le formulaire de connexion
     */
    public function create()
    {

        /*  User::create( [
               'nom' =>'BA',
               'prenom'=>'Mamadou',
                'email' => 'mamadou.ba2@univ-thies.sn',
                'role'=>'admin',
                'status'=>true,
                'telephone'=>'774350647',
                'date_naiss'=>'2001-08-12',
                'password'=>Hash::make('12345678'),
                'ufr_id'=>1,
                'sexe'=>'M',
        ]);
        */

        return view('auth.login');
    }

    
    public function login(LoginRequest  $request)
    {

     $credentials=$request->validated();
       if(Auth::attempt($credentials)){
           $request->session()->regenerate();
           // essayer de rediriger chaque type d'utilisateur a sa fenetre

           $user_role=auth()->user()->roles->nom;// variable de comparaison
           switch ($user_role){
               case 'admin' :
                    return redirect()->route('admin.dashboard');
                    
                case 'directeur':
                    return redirect()->route('directeur.dashboard');
                    
               case 'comptable':
                    return redirect()->route('comptable.dashboard');
                    
                case 'assistant' || 'chef_departement':
                    return redirect()->route('departement.dashboard');
                    
               default :
                    return redirect()->route('auth.login')->withErrors(['email'=>'email invalide ou mot de passe erroné']);
                    

           }


       }

       // si l'utilisateur nest pas dans la base de donnée
        return redirect()->route('auth.login')->withErrors(['email'=>'email invalide ou mot de passe erroné']);
    }



}
