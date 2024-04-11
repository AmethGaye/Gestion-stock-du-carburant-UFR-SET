<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacataireRequest;
use App\Models\Vacataire;
use Illuminate\Http\Request;

class VacataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacataires=Vacataire::all();
        return view('users.departement.vacataires',compact('vacataires'));
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
        $vacataire = Vacataire::findOrFail($id);
        $vacataire->delete();

        return redirect()->back()->with('success', 'Evenement supprimé avec succès');
    }

    public function store(VacataireRequest $request){
        $credentials=$request->validated();

        if ($credentials){
            Vacataire::create(
                [

                    'nom'=>$credentials['nom'],
                    'prenom'=>$credentials['prenom'],
                    'email'=>$credentials['email'],
                    'telephone'=>$credentials['telephone'],
                    'provenance'=>$credentials['provenance'],
                    'situation'=>$credentials['situation'],
                    'status'=>$credentials['status'],
                    'origine'=>$credentials['provenance'],
                ]
            );
         return redirect()->route('departement.vacataires')->withSuccess('L\'ajout du nouveau vacataire a réussi avec success');
        }
        return redirect()->route('departement.vacataires')->withErrors(['msg'=>'L\'ajout du nouveau vacataire a réussi avec success']);
    }
}
