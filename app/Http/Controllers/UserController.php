<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->role === 'admin'){
            return view('users.admin.users');
        }
    }


    /**
     * ajouter un nouvel utilisateur
     */
    public function store(Request $request)
    {
        //
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
        return view('users.setting.compte');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_compte(Request $request)
    {
        //
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
