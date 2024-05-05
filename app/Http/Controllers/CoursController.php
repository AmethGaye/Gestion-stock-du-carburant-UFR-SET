<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursRequestValidation;
use App\Models\Cours;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Remboursement_vac;
use App\Models\Vacataire;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Query\Builder;
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
        $id_user = auth()->user()->getAuthIdentifier();
        $ufr_id = auth()->user()->ufr->id;
        $departement_id = auth()->user()->departement->id;
    
        // Récupération des vacataires de l'UFR avec le status actif
        $vacataires = Vacataire::where('status', '=', 1)
            ->where('ufr_id', $ufr_id)
            ->get();
    
        // Récupération des filières du département avec les matières associées
        $filieres = Filiere::where('departement_id', $departement_id)
            ->with('matieres')
            ->get();
    
        // Récupération des séances de cours des vacataires du département spécifique
        $vacataires_sceances = Vacataire::where('ufr_id', $ufr_id)
            ->whereHas('cours.matiere.filieres', function ($query) use ($departement_id) {
                $query->where('departement_id', $departement_id); // S'assure que les matières sont dans le bon département
            })
            ->with([
                'cours' => function ($query) {
                    $query->where('demande', '0'); // Filtrer les cours selon la demande
                },
                'cours.matiere','cours.matiere.filieres'
            ])
            ->latest()
            ->get();
    
        //dd($vacataires_sceances);
    
        return view('users.departement.all', compact('vacataires', 'filieres', 'vacataires_sceances'));
    }
    


    public function filtre(Request $request){

        $vacataires_sceances = Vacataire::with(['cours.matiere']);

        

        if ($request->filled('situation')) {

            $vacataires_sceances->whereIn('situation',$request->situation);
        }
        
        if ($request->filled('status')) {

            $vacataires_sceances->whereIn('status',$request->status);
        }
        
        if($request->filled('order')){

            foreach($request->order as $order ){

                $vacataires_sceances->orderBy($order , 'asc');
            }
        }

        
        $vacataires = Vacataire::where('status','=',1)->get();
        $matieres = Matiere::with('filieres')->get();
        $filieres = Filiere::all();
        $vacataires_sceances = $vacataires_sceances->get();

        return view('users.departement.all',compact('vacataires','matieres', 'filieres', 'vacataires_sceances'));
    }

    public function filtre_by_month(Request $request){
        $num_month = $request->month;
        $startOfMonth = Carbon::create(null, $num_month, 1)->startOfMonth();
        $endOfMonth = Carbon::create(null, $num_month, 1)->endOfMonth();
    
        $vacataires_sceances = Vacataire::whereHas('cours', function($query) use ($startOfMonth, $endOfMonth) {
            $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        })->with([
            'cours',
            'cours.matiere',
            'cours.filiere'
        ])->get();
        $vacataires = Vacataire::where('status','=',1)->get();
        $filieres = Filiere::with('matieres')->get();
    
        return view('users.departement.all', compact('vacataires', 'filieres', 'vacataires_sceances'));
    }
    
    public function approbation(){
        $departement_id=auth()->user()->departement->id;
        $filieres = Filiere::where('departement_id',$departement_id)->get();
        $matieres = Matiere::all();
        $vacataires = Vacataire::all();
        $id_user=auth()->user()->getAuthIdentifier();
        $sceance_cours=Cours::with(['vacataire','matiere'])->latest()->get();
       //dd($sceance_cours);
        return view('users.departement.approbation',compact('filieres','matieres','vacataires','sceance_cours'));
    }

    public function approbation_search(Request $request){
        $search=$request->input('search','');
        $search="%{$search}%";
        $departement=auth()->user()->departement->id;

        $filieres = Filiere::all();
        $matieres = Matiere::all();
        $vacataires = Vacataire::all();
        $id_user=auth()->user()->getAuthIdentifier();
        $sceance_cours=Cours::query()->whereAny(['duree','statut','demande','remarque'],'like',$search)
                                      ->orWhereHas('vacataire', function ($query) use ($search){$query->whereAny(['nom','prenom','provenance','origine','telephone','email'],'like',$search);})
                                      ->orWhereHas('matiere', function ($query) use ($search){$query->whereAny(['nom','volume_horaire','semestre'],'like',$search);})
                                      ->orWhereHas('matiere.filieres', function ($query) use ($search,$departement){$query->whereAny(['nom'],'like',$search)->where('departement_id',$departement);})
                                      ->with(['vacataire','matiere'])->get();
       //dd($sceance_cours);
        return view('users.departement.approbation',compact('filieres','matieres','vacataires','sceance_cours'));
    }
   public function ap_filtre(Request $request){

    $filieres = Filiere::all();
    $matieres = Matiere::all();
    $vacataires = Vacataire::all();

    $sceance_cours=Cours::with(['vacataire','filiere','matiere']);

    if($request->filled('order')){
        foreach ( $request->order as  $order) {
            $sceance_cours->whereHas('vacataire' , function ($query) use ($order){
                $query->orderBy($order, 'asc');
            });
        }
    }

    if($request->filled('situation')){
      $situation = $request->situation;
        $sceance_cours->whereHas('vacataire', function($query) use ($situation){
            $query->whereIn('situation',$situation);
        });

    }

    if($request->filled('demande')){

        $sceance_cours->whereIn('demande',$request->demande);
    }
    $sceance_cours=$sceance_cours->get();
   // dd($sceance_cours);

    return view('users.departement.approbation',compact('filieres','matieres','vacataires','sceance_cours'));
   }

   public function ap_filtre_month(Request $request){
    $filieres = Filiere::all();
    $matieres = Matiere::all();
    $vacataires = Vacataire::all();
   $sceance_cours=Cours::with(['vacataire','filiere','matiere']);
   
   $num_month=$request->month;
   $startOfMonth = Carbon::create(null,$num_month,1)->startOfMonth();
   $endOfMonth = Carbon::create(null,$num_month,1)->endOfMonth();

   if($request->filled('month')){
    $sceance_cours->whereBetween('created_at',[$startOfMonth,$endOfMonth]);
   }
   
   $sceance_cours=$sceance_cours->get();
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
                    'matiere_id'=>$validated['matiere_id'],
                    'vacataire_id'=>$validated['vacataire_id'],
                    'date'=>$validated['date'],
                    'remarque'=>$validated['remarque'] || 'pas de remarque',
                    'duree'=>$validated['duree'],
                    'statut'=>false,
            ]);
            return response()->json(['success' => true, 'msg' => 'Ajout d\'un nouveau cours réussie avec succès !']);
        }
          return back() ;
    }


    public function approuver(string $id){
        Cours::where('id', $id)->update(['statut' => true]);
        return redirect()->back()->with('success', "l'approbation est reussie avec succès !");
    }
    public function restaurer(string $id){

        $if_id_cours_exist = Remboursement_vac::where('cours_id', $id)->exists();

        $if_id_cours_statut_zero_exist = Remboursement_vac::where('cours_id', $id)->where('statut', '0')->exists();

           if (!$if_id_cours_exist || $if_id_cours_statut_zero_exist) {
            Remboursement_vac::where('cours_id', $id)->delete();

            Cours::where('id', $id)->update(['statut' => false,'demande'=>0]);


            return redirect()->back()->with('success', "l'approbation à été restaurée !");
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

        Cours::where('id', $id)->update($request->only(['matiere_id', 'vacataire_id', 'date', 'remarque', 'duree']));
        return response()->json(['success' => true, 'msg' => 'Mise à jour du cours réussie avec succés !']);
    }

    public function matieres(string $id){
        $filiere = Filiere::where('id', $id)->with('matieres')->get();
        return response()->json(['success' => true, 'filiere' => json_encode($filiere[0])]);
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

    public function search(Request $request){
         $search = $request->input('search', '');
         $search = "%{$search}%";
         $departement=auth()->user()->departement->id;
         
        $id_user=auth()->user()->getAuthIdentifier();
        $vacataires = Vacataire::where('status','=',1)
                                ->where('ufr_id', auth()->user()->ufr->id)
                                 ->get();
              $filieres = Filiere::with('matieres')->get();
              
              $vacataires_sceances = Vacataire::whereAny(['nom','prenom','email','provenance'],'like', $search)
                                                ->orWhereHas('cours', function ($query) use ($search){ $query->whereAny(['remarque','statut','demande','duree','date'],'like',$search);})
                                                ->orWhereHas('cours.matiere', function ($query) use ($search){$query->whereAny(['nom','volume_horaire','semestre'],'like',$search);})
                                                ->orWhereHas('cours.matiere.filieres',function ($query) use ($search,$departement){ $query->where('nom','like',$search)->where('departement_id',$departement);})
                                                ->where('ufr_id', auth()->user()->ufr->id)
                                                ->with([
                                                       'cours' => function($query){
                                                        $query->where('demande', '0');
                                                        },
                                                'cours.matiere',
                                                ])->get();
              
            
      
        return view('users.departement.all',compact('vacataires','filieres','vacataires_sceances'));
        
    }
}
