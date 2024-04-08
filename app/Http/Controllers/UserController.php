<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users = User::all();
        if(Auth::user()->role === 'admin'){
            return view('users.admin.users',compact('users'));
        }
    }


    /**
     * ajouter un nouvel utilisateur
     */
    public function store(UserRequest $request)
    {

        $credentials=$request->validated();
        if ($credentials){
            User::create( [
                'nom' =>$credentials['nom'],
                'prenom'=>$credentials['prenom'],
                'email' => $credentials['email'],
                'role'=>$credentials['role'],
                'telephone'=>$credentials['telephone'],
                'status'=>'0',
                'date_naiss'=>'2000-11-18',
                'password'=>Hash::make($credentials['password']),
            ]);
            return redirect()->route('admin.users')->withSuccess('Ajout d\'un nouveau utiisateur a réussie avec succès');
        }
        return back()->withErrors(['msg' => 'Impossible de créer l\'utilisateur.']);


    }

    /**
     * gestion des roles
     */
    public function roles()
    {

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit_compte()
    {
        $user=Auth::user();

        return view('users.setting.compte',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_compte(Request $request)
    {
        $id = Auth::user()->getAuthIdentifier();
        $credentials = $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'nom' => 'required|string|alpha|max:255',
            'prenom' => 'required|string|alpha|max:255',
            'telephone' => 'required|string|digits:9|numeric',
        ]);

        if ($credentials) {
            User::where('id', $id)->update([
                'nom' => $credentials['nom'],
                'prenom' => $credentials['prenom'],
                'email' => $credentials['email'],
                'telephone' => $credentials['telephone'],
            ]);
            return redirect()->to(route('admin.dashboard')) ;
        }
        return back()->withErrors('erreur de mise a jour');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit_password()
    {
        return view('users.setting.change_mdp');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_password(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
