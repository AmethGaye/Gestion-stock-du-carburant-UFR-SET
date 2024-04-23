<?php

namespace App\Http\Controllers;

use App\Models\Vacataire;
use Illuminate\Http\Request;
use App\Http\Requests\VacataireRequestValidation;
use App\Models\Ufr;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class VacataireController extends Controller
{
    use VacataireRequestValidation; 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacataires=Vacataire::all();
        $ufr = Ufr::all();
        return view('users.departement.vacataires',compact('vacataires', 'ufr'));
    }

    public function filtre(Request $request)
    {
        
        $vacataires=Vacataire::query();
       
        if($request->filled('order')){

            foreach($request->order as $order ){
                $vacataires->orderBy($order , 'asc');
            }
        }

        if ($request->filled('situation')) {

            $vacataires->whereIn('situation',$request->situation);
        }
        
        if ($request->filled('status')) {

            $vacataires->whereIn('status',$request->status);
        }


        $vacataires=$vacataires->get();
        return view('users.departement.vacataires',compact('vacataires'));
    }

    public function filtre_by_month(Request $request){
        $num_month=$request->month;
        $start_month=Carbon::create(null ,$num_month ,1)->startOfMonth();
        $end_month=Carbon::create(null ,$num_month ,1)->endOfMonth();

        $vacataires=Vacataire::whereBetween('created_at',[$start_month,$end_month]);
        $vacataires=$vacataires->get();
        
        return view('users.departement.vacataires',compact('vacataires'));
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
        $validator = Validator::make($request->all(),$this->rules(true), $this->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        Vacataire::where('id', $id)->update($request->only(['nom', 'prenom', 'email', 'telephone', 'provenance', 'situation', 'status','origine']));
        return response()->json(['success' => true, 'msg' => 'Mise à jours du vacataire avec succès !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vacataire = Vacataire::findOrFail($id);
        $vacataire->delete();

        return redirect()->back()->with('success', 'Evenement supprimé avec succès');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),$this->rules(), $this->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $credentials=$validator->validated();

        if ($credentials){
            Vacataire::create(
                [

                    'nom'=>$credentials['nom'],
                    'prenom'=>$credentials['prenom'],
                    'email'=>$credentials['email'],
                    'telephone'=>$credentials['telephone'],
                    'provenance'=>$credentials['provenance'],
                    'situation'=>$credentials['situation'],
                    'status'=>$credentials['status'],
                    'origine'=>$credentials['provenance'],
                    'sexe'=>$credentials['sexe'],
                    'ufr_id'=>$credentials['ufr_id'],
                ]
            );
         return response()->json(['success' => true, 'msg' => 'L\'ajout du nouveau vacataire a réussi avec succès !']);
        }
    }

}
