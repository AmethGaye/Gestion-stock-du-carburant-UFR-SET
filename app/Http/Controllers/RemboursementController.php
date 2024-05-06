<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Cron\MonthField;
use App\Models\Cours;
use App\Models\Stock;
use App\Models\Vacataire;
use Illuminate\Http\Request;
use App\Models\Remboursement_vac;
use App\Models\User;
use App\Notifications\ComptableNotification;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Notifications\DemandeNotification;

class RemboursementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDistances(){
        return [
        
            'Dakar'=> 74.7,
            'Diourbel'=> 112.8,
            'Louga'=> 112,8 ,
            'Saint-louis'=> 192.8,
            'Thiès'=> 0,
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
    }

    public function getTicketsPerRegion(){
        return [
            'Dakar' => [
                'avec_vehicule' => 2,
                'sans_vehicule' => 4,
            ],
            'Thiès' => [
                'avec_vehicule' => 3,
                'sans_vehicule' => 5,
            ],
            'Diourbel' => [
                'avec_vehicule' => 3,
                'sans_vehicule' => 2,
            ],
            'Louga' => [
                'avec_vehicule' => 3,
                'sans_vehicule' => 5,
            ],
            'Saint-louis' => [
                'avec_vehicule' => 3,
                'sans_vehicule' => 4,
            ],
            'Kaolack' => [
                'avec_vehicule' => 3,
                'sans_vehicule' => 5,
            ],
            'Fatick' => [
                'avec_vehicule' => 2,
                'sans_vehicule' => 4,
            ],
            'Kaffrine' => [
                'avec_vehicule' => 3,
                'sans_vehicule' => 5,
            ],
            'Matam' => [
                'avec_vehicule' => 2,
                'sans_vehicule' => 4,
            ],
            'Tambacounda' => [
                'avec_vehicule' => 3,
                'sans_vehicule' => 5,
            ],
            'Kolda' => [
                'avec_vehicule' => 2,
                'sans_vehicule' => 4,
            ],
            'Sedhiou' => [
                'avec_vehicule' => 3,
                'sans_vehicule' => 5,
            ],
            'Ziguinchor' => [
                'avec_vehicule' =>4,
                'sans_vehicule' => 3,
            ],
            'Kedougou' => [
                'avec_vehicule' => 5,
                'sans_vehicule' => 3,
            ],
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $tableau_distance = $this->getDistances();

        $user_role=auth()->user()->roles->nom;// variable de comparaison
        if($user_role == 'directeur'){



            $liste_remboursement = Vacataire::where('status', 1)
            ->with([
                'cours' => function ($query) {
                    $query
                    ->whereHas('remboursement', function ($query) {
                        $query->where('statut', '0');
                    })
                    ->where('demande', '1');
                },
                'cours.remboursement',
                'cours.matiere.filieres',
                
                'cours.remboursement.user'
            ])->get();
 
    

         // dd($liste_remboursement);
            return view('users.directeur.demandes',compact('liste_remboursement'));
        }

        if($user_role == 'comptable'){
            $vacataires = Vacataire::whereHas('cours.remboursement' ,function($query){$query
                    ->whereIn('statut', ['1', '2']);})
                    ->where('status', '1')      
                    ->with([
                        'cours' => function($query){$query->where('demande', '1');},
                        'cours.matiere'
                        ])
                    ->paginate(5);
                  //dd($vacataires)  ;
            return view('users.comptable.remboursement', compact('vacataires','tableau_distance'));
        }
    }
   
    public function search(Request $request){
        $search = $request->input('search', '');
        $search = "%{$search}%";
        $user_role=auth()->user()->roles->nom;// variable de comparaison
        $tableau_distance = $this->getDistances();

        if($user_role == 'directeur'){



            $liste_remboursement = Vacataire::query()
                        ->whereAny(['nom','prenom','email','provenance'],'like', $search)
                        ->where('status', 1)
                        ->with([
                             'cours' => function ($query) {
                                  $query
                                 ->whereHas('remboursement', function ($query) {
                                     $query->where('statut', '0');
                                 })
                        ->where('demande', '1');
                        },
                        'cours.remboursement',
                        'cours.matiere.filieres',
                
                        'cours.remboursement.user'
                        ])->get();
 
            return view('users.directeur.demandes',compact('liste_remboursement'));
        }

        if($user_role == 'comptable'){
            $vacataires = Vacataire::query()
                   ->whereAny(['nom','prenom','provenance','origine','email','sexe'],'like',$search)
                   ->where('status', '1')      
                    ->with([
                        'cours' => function($query){$query->where('demande', '1');},
                        'cours.remboursement' => function($query){
                              $query->whereIn('statut', ['1', '2']);},
                        'cours.matiere'
                        ])
                    ->get();
                   
            return view('users.comptable.remboursement', compact('vacataires','tableau_distance'));

    }
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->getAuthIdentifier();
        $cours_id = $request->cours_id;
    
        // Si aucune ID de cours n'est fournie, retourner avec une erreur.
        if (empty($cours_id)) {
            return redirect()->back()->withErrors(['msg' => 'Pas de cours dispensé']);
        }
        $tickets_par_region = $this->getTicketsPerRegion();
       
        $directeur = User::whereHas('roles', function($query) {
            $query->where('nom', 'directeur');
        })->first();
    
        foreach ($cours_id as $id) {
            $cours = Cours::findOrFail($id); 
            $vacataire = $cours->vacataire;
            $region = $vacataire->provenance;
            $situation = $vacataire->situation;
            $nombre_ticket=0;
             if(isset($tickets_par_region[$region])){
                
                if($situation){
                    $nombre_ticket = $tickets_par_region[$region]['avec_vehicule'];
                }else{
                    $nombre_ticket = $tickets_par_region[$region]['sans_vehicule'];
                }

             }
           
            $cours->update(['demande' => 1]);
    
            $remboursement_vac = Remboursement_vac::create([
                'nombre_heure' => $cours->duree,
                'nombre_tickets' => $nombre_ticket,
                'user_id' => $user_id,
                'cours_id' => $cours->id,
                'statut' => '0',
            ]);
    
            // Envoyer une notification pour chaque cours si le directeur existe.
            if ($directeur) {
                $directeur->notify(new DemandeNotification($remboursement_vac));
            }
        }
    
        return redirect()->back()->withSuccess('La demande est transmise avec succès');
    }
    
/**
     * filtrage des donne par mois .
     */

     public function filtre_by_month(Request $request){
        $num_month = $request->month;
    
        
        $startOfMonth = Carbon::create(null, $num_month, 1)->startOfMonth();
        $endOfMonth = Carbon::create(null, $num_month, 1)->endOfMonth();
    
        $liste_remboursement = Vacataire::where('status', 1)
            ->whereHas('cours.remboursement', function($query) use ($startOfMonth, $endOfMonth){
              //du premier du mois jusqu au fin du mois
                $query->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->where('statut',);
            })
            ->with(['cours' => function($query) {
                $query->where('demande','1') ;
            }, 'cours.matiere', 'cours.filiere', 'cours.remboursement.user'])
            ->get();
   
        return view('users.directeur.demandes', compact('liste_remboursement'));
    }



    public function filtre_by_month_comptable(Request $request){
        $tableau_distance = $this->getDistances();
        $num_month = $request->month;
        $startOfMonth = Carbon::create(null, $num_month, 1)->startOfMonth();
        $endOfMonth = Carbon::create(null, $num_month, 1)->endOfMonth();
    
        $vacataires = Vacataire::where('status', '1')
            ->whereHas('cours', function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('updated_at', [$startOfMonth, $endOfMonth]);
            })
            ->with([
                'cours' => function($query) {
                    $query->where('demande', '1');
                },
                'cours.remboursement' => function($query) {
                    $query->whereIn('statut', ['1', '2']);
                },
                'cours.matiere'
            ])
            ->get();
    
        return view('users.comptable.remboursement', compact('vacataires','tableau_distance'));
    }
    
    

    /**
     * Le directeur .
     */
    public function filtre_demande(Request $request)
{
    $query = Vacataire::where('status', 1)
        ->with([
            'cours' => function ($query) use ($request) {
                $query->where('demande', '1')
                    ->whereHas('remboursement', function ($query) {
                        $query->where('statut', '0');
                    });
            },
            'cours.remboursement',
            'cours.matiere',
            'cours.filiere',
            'cours.remboursement.user'
        ]);

    if ($request->filled('situation')) {
        $query->whereIn('situation', $request->situation);
    }

    if ($request->filled('demande')) {
        $query->whereHas('cours', function ($query) use ($request) { 
            $query->whereIn('demande', $request->demande);
        });
    }

    if ($request->filled('order')) {
        foreach ($request->order as $order) {
            $query->orderBy($order, 'asc');
        }
    }

    $liste_remboursement = $query->get();
    
    return view('users.directeur.demandes', compact('liste_remboursement'));
}


   /**
     * Le comptable .
     */
    public function filtre(Request $request) {
        $tableau_distance = $this->getDistances();
        $vacataires = Vacataire::where('status', '1')      
                        ->with([
                            'cours' => function($query) {
                                $query->where('demande', '1');
                            },
                            'cours.matiere'
                        ])
                        ->whereHas('cours.remboursement', function ($query) use ($request) {
                            if ($request->filled('statut')) {
                                $query->whereIn('statut', $request->statut);
                            } else {
                                $query->whereIn('statut', ['1', '2']);
                            }
                        });
    
        
        if ($request->filled('order')) {
            foreach ($request->order as $order) {
                $vacataires->orderBy($order , 'asc');
            }
        }
    
        if ($request->filled('situation')) {
            $vacataires->whereIn('situation', $request->situation);
        }
    
        $vacataires = $vacataires->get();
        
    
        return view('users.comptable.remboursement', compact('vacataires','tableau_distance'));
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
        $id_cours = $request->id_cours;

        $comptable = User::whereHas('roles', function($query) {
            $query->where('nom', 'comptable');
        })->first();

        foreach ($id_cours as $id_cour) {
            
            Remboursement_vac::where('cours_id', $id_cour)->update(['statut' => '1']);

            
            $remboursement = Remboursement_vac::where('cours_id',$id_cour)->first();
            // Notifier le comptable
            if($comptable){

                $comptable->notify(new ComptableNotification($remboursement));
        
            }
        }

    return redirect()->back()->withSuccess('La demande été validée avec succès !');
    }


    public function r_update(Request $request, string $id){
        $stock = Stock::latest()->first();
        if($request->tickets < $stock->nombre_ticket){
            Remboursement_vac::where('id', $id)->update(['statut' => '2', 'nombre_tickets' => $request->input('tickets')]);
            $price = $stock->prix_unitaire;
            $nombre_tickets = $stock->nombre_ticket - $request->input('tickets');
            $new_volume = $nombre_tickets * 10;
            $sorties = $stock->sorties + $request->input('tickets');
            $stock->update([
                'volume' => $new_volume, 
                'prix_total' => $price * $new_volume, 
                'nombre_ticket' => $nombre_tickets,  
                'sorties' => $sorties
            ]);
            $stock->save();
            return redirect()->back()->with('success', 'sceance de cours remboursé avec succés');
        }else{
            return redirect()->back()->withFail('Le stock est insuffisant');
        }
    }

    public function _update(Request $request){

    }



    /**
     * Reset the specified resource from storage.
     */
    public function reset(string $id)
    {
        $user_role = auth()->user()->roles->nom;// variable de comparaison
        if($user_role == 'comptable'){
            $remboursement = Remboursement_vac::find($id);
            $remboursement->statut = '1';

            $stock = Stock::latest()->first();
            $price = $stock->prix_unitaire;
            $nombre_tickets = $stock->nombre_ticket + $remboursement->nombre_tickets;
            $new_volume = $nombre_tickets * 10;
            $sorties = $stock->sorties - $remboursement->nombre_tickets;
            $stock->update([
                'volume' => $new_volume, 
                'prix_total' => $price * $new_volume, 
                'nombre_ticket' => $nombre_tickets,  
                'sorties' => $sorties
            ]);

            $stock->save();
            $remboursement->save();
            return redirect()->back()->with('success', 'restauration réussie !');
        }
    }
}
