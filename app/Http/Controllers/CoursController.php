<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Vacataire;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacataires = Vacataire::all();
        $matieres = Matiere::all();
        $filieres = Filiere::all();
        return view('users.departement.all',compact('vacataires','matieres','filieres'));
    }

    public function approbation(){
        return view('users.departement.approbation');
    }
    public function store(Request $request){
/*
        $validated=$request->validate(
            [
                //'filiere'=>'required|string|numeric',
                'matiere_id'=>'required|string|numeric',
                'vacataire_id'=>'required|string|numeric',
                //'date'=>'required|date',
                'remarque'=>'string',
                'heure'=>'required|string|numeric',
            ],
            [
                'filiere.required' => 'Le champ filière est obligatoire.',
                'filiere.string' => 'Le champ filière doit être une chaîne de caractères.',
                'filiere.numeric' => 'Le champ filière doit être un nombre.',

                'matiere_id.required' => 'Le champ matière est obligatoire.',
                'matiere_id.numeric' => 'Le champ matière doit être un nombre.',

                'vacataire_id.required' => 'Le champ vacataire est obligatoire.',
                'vacataire_id.numeric' => 'Le champ vacataire doit être un nombre.',

                'date.required' => 'Le champ date est obligatoire.',
                'date.date' => 'Le champ date doit être une date valide.',

                'remarque.string' => 'Le champ remarque doit être une chaîne de caractères.',
                'heure.required'=>'Le champ heure est obligatoire.'
                ]
        );
        if ($validated){
            Cours::create(
                [
                   // 'filiere'=>$validated['filiere'],
                    'matiere_id'=>$validated['matiere_id'],
                    'vacataire_id'=>$validated['vacataire_id'],
                    //'date'=>$validated['date'],
                    'remarque'=>$validated['remarque'],
                    'duree'=>$validated['heure'],
                    'statut'=>false,


                ]
            );
return redirect()->route('cours.all');
        }
*/
    }


    public function approuver(string $id){

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
