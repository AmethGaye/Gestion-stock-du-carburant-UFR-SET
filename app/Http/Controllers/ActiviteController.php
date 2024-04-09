<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActiviteRequest;
use App\Models\Activite;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role == 'directeur'){
            return view('users.directeur.activites');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActiviteRequest $request)
    {
        $credentials = $request->validated();

        $user_id=auth()->user()->getAuthIdentifier();
        if ($credentials){
            Activite::create([
                'titre'=>$credentials['titre'],
                'description'=>$credentials['description'],
                'lieux'=>$credentials['lieux'],
                'date'=>$credentials['date'],
                'adresse'=>$credentials['adresse'],
                'ticket'=>$credentials['ticket'],
                'user_id'=>$user_id,
            ]);
            return redirect()->route('directeur.activites')->withSuccess('Ajout d\'une nouvelle  a réussie avec succès');
        }
        return back()->withErrors(['msg' => 'L\ajout d\'une nouvelle activité a echoué' ]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
