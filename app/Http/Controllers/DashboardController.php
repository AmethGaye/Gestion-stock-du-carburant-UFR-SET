<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Cours;
use App\Models\Remboursement_vac;
use App\Models\Ufr;
use App\Models\User;
use App\Models\Vacataire;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $ufr=Ufr::find(1);
        if(auth()->user()->role == 'admin'){
            $total_users=User::all()->count();

            $users_ufr_set=User::whereHas('ufr',function($query)use ($ufr){
                $query->where('nom',$ufr->nom);
            })->count();

            $user_active = User::where('status',1)->count();
            $users_added_in_month=User::whereBetween('created_at',[$startOfMonth,$endOfMonth])->count();

            $users_ufr_set_on_month = User::whereHas('ufr', function($query) use ($ufr, $startOfMonth, $endOfMonth) {
                $query->where('nom', $ufr->nom)
                      ->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
            })->count();
            
            $percent_added_on_month=($users_added_in_month/ $total_users)*100;
            $percent_added_on_month = number_format($percent_added_on_month, 2, '.', '');//formatter le resultat et afficher que 2 chifre apres la virguell
            $percent_users_active=($user_active/$total_users)*100;
            $percent_users_active=number_format($percent_users_active, 2, '.', '');
            $percent_user_ufrset=($users_ufr_set_on_month/$users_ufr_set)*100;
            $percent_user_ufrset=number_format($percent_user_ufrset, 2, '.', '');

            $users = User::latest()->limit(4)->get();
            return view('users.admin.dashboard', compact('users','total_users','users_ufr_set','user_active','percent_added_on_month','percent_users_active','percent_user_ufrset'));
        }

        
        if(auth()->user()->role == 'directeur'){
            $total_demande = Cours::where('demande',1)->count();
            $demande_on_month = Cours::where('demande',1)->whereBetween('updated_at',[$startOfMonth,$endOfMonth])->count();
            $cours_non_approuve = Cours::where('statut',1)->where('demande',0)->count();
            $total_activite = Activite::all()->count();
            
            $total_activite_non_approuve= Activite::where('statut',0)->count();
            $act_non_approuver=Activite::whereBetween('created_at',[$startOfMonth,$endOfMonth])->where('statut',0)->count();
            if($total_demande !=0){
                $percent_demande_on_month =($demande_on_month/$total_demande)*100;
                $percent_demande_on_month=number_format($percent_demande_on_month, 2, '.', '');
                $percent_demande_non_approuve = ($cours_non_approuve/$total_demande)*100;
                $percent_demande_non_approuve=number_format($percent_demande_non_approuve, 2, '.', '');

            }else{
                $percent_demande_on_month=0;
                $percent_demande_non_approuve=0;
            }
            if($total_activite !=0){
                $activite_on_month = Activite::whereBetween('created_at',[$startOfMonth,$endOfMonth])->count();
                $percent_activite_on_month = ($activite_on_month/$total_activite )*100;
                $percent_activite_on_month=number_format($percent_activite_on_month, 2, '.', '');
            }else{
                $percent_activite_on_month=0; 
            }
            if($total_activite_non_approuve !=0){
                
            $percent_activite_non_appr_on_month=($act_non_approuver/$total_activite_non_approuve)*100;
            $percent_activite_non_appr_on_month=number_format($percent_activite_non_appr_on_month, 2, '.', '');
            }else{

                $percent_activite_non_appr_on_month=0;
            }
           
            $activites = Activite::latest()->limit(4)->get();
            $remboursements = Remboursement_vac::latest()->limit(4)->get();
            // dd($remboursements);
            return view('users.directeur.dashboard',
             compact('remboursements', 'activites','total_demande','percent_demande_on_month','cours_non_approuve','percent_demande_non_approuve','total_activite','percent_activite_on_month','total_activite_non_approuve','percent_activite_non_appr_on_month'));
        }

        if(auth()->user()->role == 'chef_departement' || auth()->user()->role == 'assistant'){
            $id_user=auth()->user()->departement->id;
            $total_vacataires=Vacataire::all()->count();
            $vacataires_add_on_month=Vacataire::whereBetween('created_at',[$startOfMonth, $endOfMonth])->count();
            $percent_vacataires_add_on_month= ($vacataires_add_on_month/$total_vacataires)*100;
            $percent_vacataires_add_on_month=number_format($percent_vacataires_add_on_month, 2, '.', '');
            $vacataires_active=Vacataire::where('status',1)->count();
            if($total_vacataires !=0){
               
            $percent_vac_active=( $vacataires_active/$total_vacataires)*100;
            $percent_vac_active=number_format($percent_vac_active, 2, '.', '');
            }else{
                $percent_vac_active =0;
            }

            //Pour les cours
            $sceance_cours_non_approuve=Cours::whereHas('matiere.filieres',function ($query) use ($id_user){
                                  $query->where('departement_id',$id_user);
                              })->with('matiere','vacataire')->where('statut',0)->count();
            $total_demandes = Cours::whereHas('matiere.filieres',function ($query) use ($id_user){
                $query->where('departement_id',$id_user);
            })->with('matiere','vacataire')->where('demande',1)->count();

            $total_cours_added = Cours::whereHas('matiere.filieres',function ($query) use ($id_user){
                $$query->where('departement_id',$id_user);
            })->with('matiere','vacataire')->count();
             
            if($total_cours_added != 0){

                $percent_cours_non_approuve = ($sceance_cours_non_approuve/$total_cours_added*100);
                $percent_cours_non_approuve = number_format($percent_cours_non_approuve , 2, '.', '');
                
            $percent_cours_envoye = ($total_demandes/ $total_cours_added*100);
            $percent_cours_envoye = number_format($percent_cours_envoye , 2, '.', '');
            }else{
                $percent_cours_non_approuve=0;
                $percent_cours_envoye=0;
            }
            
            
            $users = User::latest()->limit(4)->get();
            $vacataires = Vacataire::latest()->limit(5)->get();

            return view('users.departement.dashboard', 
            compact('users', 'vacataires','total_vacataires','percent_vacataires_add_on_month','vacataires_active','percent_vac_active','sceance_cours_non_approuve','total_demandes','percent_cours_non_approuve','percent_cours_envoye'));
        }

        if(auth()->user()->role == 'comptable'){
            return view('users.comptable.dashboard');
        }


    }
}
