<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ActiviteRequestValidation;
use App\Models\Departement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ActiviteController extends Controller
{

    use ActiviteRequestValidation;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_role=auth()->user()->roles->nom;
        if($user_role == 'directeur'){
            $activities = Activite::all();
            return view('users.directeur.activites',compact('activities'));
        }

        if($user_role == 'comptable'){
            $activities = Activite::all();
            return view('users.comptable.activites',compact('activities'));
        }
    }
   
    public function search(Request $request){
        $user_role=auth()->user()->roles->nom;
        $search = $request->input('search','');
        $search = "%{$search}%";

        if( $user_role == 'directeur'){
            $activities = Activite::query()
                                 ->whereAny(['titre','description','lieux','adresse','ticket','date'],'like',$search)
                                 ->get();
            return view('users.directeur.activites',compact('activities'));
        }

        if($user_role == 'comptable'){
            $activities = Activite::query()
            ->whereAny(['titre','description','lieux','adresse','ticket','date'],'like',$search)
            ->get();
            
            return view('users.comptable.activites',compact('activities'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filtre_by_month(Request $request)
    {  
        $user_role=auth()->user()->roles->nom;
        
        if($user_role =='directeur'){
        $num_month= $request->month;

        $startOfMonth = Carbon::create(null, $num_month, 1)->startOfMonth();
        $endOfMonth = Carbon::create(null, $num_month, 1)->endOfMonth();
       
       $activities=Activite::whereBetween('created_at',[$startOfMonth ,$endOfMonth]);

        $activities =$activities->get() ;
        
            return view('users.directeur.activites',compact('activities'));
        }
       
        
       
    }
//POur le comptable
    public function filtre_activite(Request $request){

        $activities = Activite::query();

        if($request->filled('order')){
            foreach($request->order as $order){

                $activities->orderBy($order ,'asc');

            }
        }

        if ($request->filled('statut')) {
           $activities->whereIn('statut',$request->statut);
        }

        $activities = $activities->get();
          
        return view('users.comptable.activites',compact('activities'));

    }

    public function filtre_activite_by_month(Request $request){
            $num_month= $request->month;
    
            $startOfMonth = Carbon::create(null, $num_month, 1)->startOfMonth();
            $endOfMonth = Carbon::create(null, $num_month, 1)->endOfMonth();
           
            $activities=Activite::whereBetween('created_at',[$startOfMonth ,$endOfMonth]);
    
            $activities =$activities->get() ;

            return view('users.comptable.activites',compact('activities')); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),$this->rules(), $this->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $credentials = $validator->validated();
        if($credentials){
            Activite::create([
                'titre'=>$credentials['titre'],
                'description'=>$credentials['description'],
                'lieux'=>$credentials['lieux'],
                'date'=>$credentials['date'],
                'adresse'=>$credentials['adresse'],
                'ticket_demande'=>$credentials['ticket_demande'],
                'user_id'=>auth()->user()->getAuthIdentifier(),
            ]);
            return response()->json(['success' => true, 'msg' => 'Ajout d\'une nouvelle activité réussie avec succès !']);
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
    public function reset(string $id)
    {
        Activite::where('id', $id)->update(['statut' => false, 'ticket' => 0]);
        return redirect()->back()->with('success', 'Restauration réussie !');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_role=auth()->user()->roles->nom;// variable de comparaison
        if($user_role == 'directeur'){
            $validator = Validator::make($request->all(),$this->rules(), $this->messages());

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            Activite::where('id', $id)->update($request->only(['titre', 'ticket_demande', 'lieux', 'adresse', 'date',
                'description']));
            return response()->json(['success' => true, 'msg' => "Mise à jour réussie !" ]);

        }

        if($user_role == 'comptable'){

            Activite::where('id', $id)->update(['ticket' => $request->ticket, 'statut' => true]);
            return redirect()->route('comptable.activites')->withSuccess('La demande a été traitée avec succés !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = Activite::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Evenement supprimé avec succès');
    }
}
