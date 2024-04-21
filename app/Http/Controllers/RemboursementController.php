<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cours;
use App\Models\Vacataire;
use Cron\MonthField;
use Illuminate\Http\Request;
use App\Models\Remboursement_vac;
use Illuminate\Contracts\Database\Eloquent\Builder;

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
                'cours.matiere',
                'cours.filiere',
                'cours.remboursement.user'
            ])->get();
 
    

           // dd($liste_remboursement);
            return view('users.directeur.demandes',compact('liste_remboursement'));
        }

        if(auth()->user()->role == 'comptable'){
            $vacataires = Vacataire::where('status', '1')      
                    ->with([
                        'cours' => function($query){$query->where('demande', '1');},
                        'cours.remboursement' => function($query){$query
                            ->whereIn('statut', ['1', '2']);},
                        'cours.matiere'
                        ])
                    ->get();
                    
            return view('users.comptable.remboursement', compact('vacataires'));
        }
    }

   


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id=auth()->user()->getAuthIdentifier();
        $cours_id = $request->cours_id;

        // if (empty($cours_id)) {
        //     return redirect()->back()->withErrors(['msg' => 'Pas de cours dispensé ']);
        // }
        foreach ($cours_id as $id){
            $cours = Cours::where('id', $id)->first();

            // $if_id_cours_exist=Remboursement_vac::where('cours_id', $cours->id)->exists();
            Cours::find($id)->update(['demande'=> 1]);
            Remboursement_vac::create([
                'nombre_heure'=>$cours->duree,
                'nombre_tickets'=>2,
                'user_id'=>$user_id,
                'cours_id'=>$cours->id,
                'statut'=>'0',
            ]);
        }
        return redirect()->back()->withSuccess('La demande est transmise avec success');

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
                $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
            })
            ->with(['cours.remboursement' => function($query) use ($startOfMonth, $endOfMonth){
                $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
            }, 'cours.matiere', 'cours.filiere', 'cours.remboursement.user'])
            ->get();
    
        return view('users.directeur.demandes', compact('liste_remboursement'));
    }
    public function filtre_by_month_comptable(Request $request){
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
    
        return view('users.comptable.remboursement', compact('vacataires'));
    }
    
    

    /**
     * Le directeur .
     */
    public function filtre_demande(Request $request)
    {
        $debut_mois=Carbon::now()->startOfMonth()->toDateString();
        $fin_mois=Carbon::now()->endOfMonth()->toDateString();

        $liste_remboursement = Vacataire::where('status', 1)
            ->with(['cours.remboursement'=> function($query) use ($debut_mois, $fin_mois){
                $query->whereBetween('created_at', [$debut_mois,$fin_mois]);
            }, 'cours.matiere', 'cours.filiere', 'cours.remboursement.user']);
    
        if ($request->filled('order')) {
            foreach ($request->order as $order) {
                $liste_remboursement->orderBy($order, 'asc');
            }
        }
    
        if ($request->filled('situation')) {
            $liste_remboursement->whereIn('situation', $request->situation);
        }
    
        if ($request->filled('demande')) {
            $liste_remboursement->whereHas('cours', function ($query) use ($request) { 
                $query->whereIn('demande', $request->demande);
            });
        }
    
        $liste_remboursement = $liste_remboursement->get(); 
    
        
        return view('users.directeur.demandes', compact('liste_remboursement'));
    }

    
   

   /**
     * Le comptable .
     */
    public function filtre(Request $request) {
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
        
    
        return view('users.comptable.remboursement', compact('vacataires'));
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

    public function r_update(Request $request, string $id){
        Remboursement_vac::where('id', $id)->update(['statut' => '2', 'nombre_tickets' => $request->input('tickets')]);
        return redirect()->back()->with('success', 'sceance de cours remboursé avec succés');
    }

    public function _update(Request $request){

    }



    /**
     * Reset the specified resource from storage.
     */
    public function reset(string $id)
    {
        if(auth()->user()->role == 'comptable'){
            $remboursement = Remboursement_vac::find($id);
            $remboursement->statut = '1';
            $remboursement->save();
            return redirect()->back()->with('success', 'restauration réussie !');
        }
    }
}
