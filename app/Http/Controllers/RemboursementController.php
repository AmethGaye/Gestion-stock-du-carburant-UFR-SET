<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Remboursement_vac;
use Illuminate\Http\Request;

class RemboursementController extends Controller
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
        if(auth()->user()->role == 'directeur'){
            return view('users.directeur.demandes');
        }

        if(auth()->user()->role == 'comptable'){
            return view('users.comptable.remboursement');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cours_id = $request->cours_id;
        foreach ($cours_id as $id){
            $cours = Cours::where('id', $id)->get();
            Remboursement_vac::create([

            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function _update(Request $request){

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
