<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Http\Requests\ActiviteRequestValidation;
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
        $activities=Activite::all();

        if(auth()->user()->role == 'directeur'){
            return view('users.directeur.activites',compact('activities'));
        }

        if(auth()->user()->role == 'comptable'){
            return view('users.comptable.activites',compact('activities'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            $user_id=auth()->user()->getAuthIdentifier();
            Activite::create([
                'titre'=>$credentials['titre'],
                'description'=>$credentials['description'],
                'lieux'=>$credentials['lieux'],
                'date'=>$credentials['date'],
                'adresse'=>$credentials['adresse'],
                'ticket'=>$credentials['ticket'],
                'user_id'=>$user_id,
            ]);
            return response()->json(['success' => true, 'msg' => 'Ajout d\'une nouvelle  a réussie avec succès']);
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

        $user = Activite::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Evenement supprimé avec succès');
    }
}
