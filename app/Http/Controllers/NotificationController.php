<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Notifications\DemandeNotification;

class NotificationController extends Controller
{
    public function markAsRead($id)
    { 

        $role = auth()->user()->roles->nom;
        //dd($role);
        auth()->user()->notifications()->find($id)->markAsRead();
        if($role == 'chef_departement')
        {
            return redirect()->route('cours.all');
        }
        if($role == 'directeur')
        {
            return redirect()->route('directeur.demandes');
        }
        if($role == 'comptable')
        {
            return redirect()->route('comptable.remboursements');
        }
        
    }
    public function markAsRead_activite($id){

        auth()->user()->notifications()->find($id)->markAsRead();
        return redirect()->route('comptable.activites');
    }
}
