<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursRequestValidation;
use App\Models\Cours;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Remboursement_vac;
use App\Models\Vacataire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CoursController extends Controller
{
    use CoursRequestValidation;
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $vacataires = Vacataire::where('status','=',1)->get();
        $matieres = Matiere::all();
        $filieres = Filiere::with('matiere')->get();
        //dd($filieres);
        $vacataires_sceances = Vacataire::with(['cours.matiere','cours.filiere'])->get();
       //dd($vacataires_sceances);

        return view('users.departement.all',compact('vacataires','matieres','filieres','vacataires_sceances'));
    }

    public function approbation(){
        $filieres = Filiere::all();
        $matieres = Matiere::all();
        $vacataires = Vacataire::all();

        $sceance_cours=Cours::with(['vacataire','filiere','matiere'])->get();
       // dd($sceance_cours);
        return view('users.departement.approbation',compact('filieres','matieres','vacataires','sceance_cours'));
    }


    public function store(Request $request){

        $validator = Validator::make($request->all(),$this->rules(), $this->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $validated = $validator->validated();
        if ($validated){
            Cours::create([
                   'filiere_id'=>$validated['filiere_id'],
                    'matiere_id'=>$validated['matiere_id'],
                    'vacataire_id'=>$validated['vacataire_id'],
                    'date'=>$validated['date'],
                    'remarque'=>$validated['remarque'],
                    'duree'=>$validated['duree'],
                    'statut'=>false,
            ]);
            return response()->json(['success' => true, 'msg' => 'Ajout d\'un nouveau cours réussie avec succès !']);
        }
          return back() ;
    }


    public function approuver(string $id){
        Cours::where('id', $id)->update(['statut' => true]);
        return redirect()->route('cours.approbation');
    }
    public function restaurer(string $id){

        $if_id_cours_exist = Remboursement_vac::where('cours_id', $id)->exists();

        $if_id_cours_statut_zero_exist = Remboursement_vac::where('cours_id', $id)->where('statut', '0')->exists();

           if (!$if_id_cours_exist || $if_id_cours_statut_zero_exist) {
            Remboursement_vac::where('cours_id', $id)->delete();

            Cours::where('id', $id)->update(['statut' => false,'demande'=>0]);


            return redirect()->route('cours.approbation');
        } else {
             // sinon on lui retourne la page avec un message d'erreur
            return redirect()->back()->withErrors(['msg'=>'Le cours ne peut pas être restauré car il est déjà approuvé par le directeur ou payé.']);
        }
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
        $validator = Validator::make($request->all(),$this->rules(), $this->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        Cours::where('id', $id)->update($request->only(['filiere_id', 'matiere_id', 'vacataire_id', 'date', 'remarque', 'duree']));
        return response()->json(['success' => true, 'msg' => 'Mise à jour du cours réussie avec succés !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Cours::findOrFail($id);
        $user->delete();
        return redirect()->route('cours.all')->withSuccess('La séance de cours a été  supprimé avec succès');
    }
}
