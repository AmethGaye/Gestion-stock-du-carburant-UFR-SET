<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Remboursement_vac;
use App\Models\Vacataire;
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


            $liste_remboursement = Vacataire::with(['cours.remboursements','cours.matiere','cours.filiere','cours.remboursements.user'])->get();

            return view('users.directeur.demandes',compact('liste_remboursement'));
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
        $user_id=auth()->user()->getAuthIdentifier();
        $cours_id = $request->cours_id;

        if (empty($cours_id)) {
            return redirect()->back()->withErrors(['msg' => 'Pas de cours dispensé ']);
        }
        foreach ($cours_id as $id){
            $cours = Cours::where('id', $id)->first();

            $if_id_cours_exist=Remboursement_vac::where('cours_id', $cours->id)->exists();
            if(!$if_id_cours_exist && $cours->statut ){

                Remboursement_vac::create([
                    'nombre_heure'=>$cours->duree,
                    'nombre_tickets'=>2,
                    'user_id'=>$user_id,
                    'cours_id'=>$cours->id,
                    'statut'=>'0',
                ]);
            }

        }
        return redirect()->back()->withSuccess('La demande est transmise avec success');

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
    public function update(Request $request)
    {
       $id_cours= $request->id_cours;
       foreach ($id_cours as $id_cour){
           Remboursement_vac::where('cours_id',$id_cour)->update(['statut'=>'1']);
       }
       return redirect()->back();
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
