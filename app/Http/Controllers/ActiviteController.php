<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stock;
use http\Env\Response;
use App\Models\Activite;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ActiviteRequestValidation;

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
        $tableau_distance = [
        
            'Dakar'=> 74.7,
            'Diourbel'=> 112.8,
            'Louga'=> 112,8 ,
            'Saint-louis'=> 192.8,
            'Thies'=> 0.0,
            'Matam'=> 473.2,
            'Tambacounda'=> 453.0,
            'Kolda'=> 676.2,
            'Sedhiou'=> 367.7,
            'Ziguinchor'=> 429.2,
            'Fatick'=> 115.8,
            'Kaffrine'=> 239.1,
            'Kaolack'=> 171.3,
            'Kedougou'=> 686.5,
    
    
           ];
        $user_role=auth()->user()->roles->nom;
        if($user_role == 'directeur'){
            $activities = Activite::all();
            return view('users.directeur.activites',compact('activities','tableau_distance'));
        }

        if($user_role == 'comptable'){
            $activities = Activite::all();
            return view('users.comptable.activites',compact('activities','tableau_distance'));
        }
    }
   
    public function search(Request $request){
        $tableau_distance = [
        
            'Dakar'=> 74.7,
            'Diourbel'=> 112.8,
            'Louga'=> 112,8 ,
            'Saint-louis'=> 192.8,
            'Thies'=> 0.0,
            'Matam'=> 473.2,
            'Tambacounda'=> 453.0,
            'Kolda'=> 676.2,
            'Sedhiou'=> 367.7,
            'Ziguinchor'=> 429.2,
            'Fatick'=> 115.8,
            'Kaffrine'=> 239.1,
            'Kaolack'=> 171.3,
            'Kedougou'=> 686.5,
    
    
           ];
        $user_role=auth()->user()->roles->nom;
        $search = $request->input('search','');
        $search = "%{$search}%";

        if( $user_role == 'directeur'){
            $activities = Activite::query()
                                 ->whereAny(['titre','description','lieux','adresse','ticket','date'],'like',$search)
                                 ->get();
            return view('users.directeur.activites',compact('activities','tableau_distance'));
        }

        if($user_role == 'comptable'){
            $activities = Activite::query()
            ->whereAny(['titre','description','lieux','adresse','ticket','date'],'like',$search)
            ->get();
            
            return view('users.comptable.activites',compact('activities','tableau_distance'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filtre_by_month(Request $request)
    {  
        $tableau_distance = [
        
            'Dakar'=> 74.7,
            'Diourbel'=> 112.8,
            'Louga'=> 112,8 ,
            'Saint-louis'=> 192.8,
            'Thies'=> 0.0,
            'Matam'=> 473.2,
            'Tambacounda'=> 453.0,
            'Kolda'=> 676.2,
            'Sedhiou'=> 367.7,
            'Ziguinchor'=> 429.2,
            'Fatick'=> 115.8,
            'Kaffrine'=> 239.1,
            'Kaolack'=> 171.3,
            'Kedougou'=> 686.5,
    
    
           ];
        $user_role=auth()->user()->roles->nom;
        
        if($user_role =='directeur'){
        $num_month= $request->month;

        $startOfMonth = Carbon::create(null, $num_month, 1)->startOfMonth();
        $endOfMonth = Carbon::create(null, $num_month, 1)->endOfMonth();
       
       $activities=Activite::whereBetween('created_at',[$startOfMonth ,$endOfMonth]);

        $activities =$activities->get() ;
        
            return view('users.directeur.activites',compact('activities','tableau_distance'));
        }
       
        
       
    }
//POur le comptable
    public function filtre_activite(Request $request){
        $tableau_distance = [
        
            'Dakar'=> 74.7,
            'Diourbel'=> 112.8,
            'Louga'=> 112,8 ,
            'Saint-louis'=> 192.8,
            'Thies'=> 0.0,
            'Matam'=> 473.2,
            'Tambacounda'=> 453.0,
            'Kolda'=> 676.2,
            'Sedhiou'=> 367.7,
            'Ziguinchor'=> 429.2,
            'Fatick'=> 115.8,
            'Kaffrine'=> 239.1,
            'Kaolack'=> 171.3,
            'Kedougou'=> 686.5,
    
    
           ];

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
          
        return view('users.comptable.activites',compact('activities','tableau_distance'));

    }

    public function filtre_activite_by_month(Request $request){
        $tableau_distance = [
        
            'Dakar'=> 74.7,
            'Diourbel'=> 112.8,
            'Louga'=> 112,8 ,
            'Saint-louis'=> 192.8,
            'Thies'=> 0.0,
            'Matam'=> 473.2,
            'Tambacounda'=> 453.0,
            'Kolda'=> 676.2,
            'Sedhiou'=> 367.7,
            'Ziguinchor'=> 429.2,
            'Fatick'=> 115.8,
            'Kaffrine'=> 239.1,
            'Kaolack'=> 171.3,
            'Kedougou'=> 686.5,
    
    
           ];
            $num_month= $request->month;
    
            $startOfMonth = Carbon::create(null, $num_month, 1)->startOfMonth();
            $endOfMonth = Carbon::create(null, $num_month, 1)->endOfMonth();
           
            $activities=Activite::whereBetween('created_at',[$startOfMonth ,$endOfMonth]);
    
            $activities =$activities->get() ;

            return view('users.comptable.activites',compact('activities','tableau_distance')); 

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
        $activite = Activite::find($id);
        $stock = Stock::latest()->first();
        $price = $stock->prix_unitaire;
        $nombre_tickets = $stock->nombre_ticket + $activite->ticket;
        $new_volume = $nombre_tickets * 10;
        $sorties = $stock->sorties - $activite->ticket;
        $stock->update([
            'volume' => $new_volume, 
            'prix_total' => $price * $new_volume, 
            'nombre_ticket' => $nombre_tickets,  
            'sorties' => $sorties
        ]);
        $activite->statut = false;
        $activite->ticket = 0;
        $activite->save();
        $stock->save();
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

            $stock = Stock::latest()->first();
            if($request->ticket < $stock->nombre_ticket){
                Activite::where('id', $id)->update(['ticket' => $request->ticket, 'statut' => true]);
                $price = $stock->prix_unitaire;
                $nombre_tickets = $stock->nombre_ticket - $request->ticket;
                $new_volume = $nombre_tickets * 10;
                $sorties = $stock->sorties + $request->ticket;
                $stock->update([
                    'volume' => $new_volume, 
                    'prix_total' => $price * $new_volume, 
                    'nombre_ticket' => $nombre_tickets,  
                    'sorties' => $sorties
                ]);
                $stock->save();
                return redirect()->back()->withSuccess('La demande a été traitée avec succés !');
            }else{
                return redirect()->back()->withFail('Le stock est insuffisant'); 
            }
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
