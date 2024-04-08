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
    //   User::create( [
    //             'nom' =>'Gaye',
    //             'prenom'=>'Mouhamad',
    //             'email' => 'mouhamad.gaye@univ-thies.sn',
    //             'role'=>'admin',
    //             'status'=>'',
    //             'date_naiss'=>'2000-11-18',
    //             'password'=>Hash::make('12345678'),
    //     ]);

        return view('auth.login');
    }

    /**
     * valider ou non l'authentification de l'utlisateur
     */
    public function store(Request $request)
    {
        //
    }
    public function login(LoginRequest  $request)
    {

     $credentials=$request->validated();
       if(Auth::attempt($credentials)){
           $request->session()->regenerate();
           // essayer de rediriger chaque type d'utilisateur a sa fenetre

           switch (Auth::user()->role){
               case 'admin' :
                   // il retourne l'utilisateur dans la pase de connnexion pour le moment
                return redirect()->route('admin.dashboard');
                   break;
               case 'assistant' || 'chef_departement':

                   // il retourne l'utilisateur dans la pase de connnexion pour le moment
                   return redirect()->route('departement.dashboard');

               case 'comptable':
                   // retourne l'utilsateur vers la page de connnexion pour le moment
                   return redirect()->intended('login');

               case 'directeur':
                   // retourne l'utilsateur vers la page de connnexion pour le moment
                   return redirect()->route('directeur.dashboard');

               default :
                   // si l'utilisateur nest pas dans la base de donnée
                    return redirect()->route('auth.login')->withErrors(['email'=>'email invalide ou mot de passe erroné']);


           }


       }

       // si l'utilisateur nest pas dans la base de donnée
        return redirect()->route('auth.login')->withErrors(['email'=>'email invalide ou mot de passe erroné']);
    }



}
