<?php

namespace App\Http\Controllers;

use App\Models\Ufr;

use App\Models\Role;
use App\Models\User;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequestValidation;

class UserController extends Controller
{
    use UserRequestValidation;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_role=auth()->user()->roles->nom;// variable de comparaison
        if($user_role === 'admin'){
            $users = User::paginate(5);
            $ufr = Ufr::all();
            $departements = Departement::all();
            $roles = Role::all();
            return view('users.admin.users',compact('users', 'ufr', 'departements', 'roles'));
        }
    }


    public function search(Request $request){
            $search=$request->input('search','');
            $search="%{$search}%";
           // dd($search);
            $users=User::whereAny(['nom','prenom','date_naiss','telephone','sexe'],'like',$search)
                         ->orWhereHas('roles',function ($query) use ($search){ $query->where('nom','like',$search);})
                         ->orWhereHas('departement', function ($query) use ($search){ $query->where('nom','like',$search);})
                         ->orWhereHas('ufr', function ($query) use ($search){ $query->where('nom','like',$search);})
                         ->paginate(5);
            $ufr = Ufr::all();
            $departements = Departement::all();
            $roles = Role::all();
            return view('users.admin.users',compact('users', 'ufr', 'departements', 'roles'));
    }

    /**
     * ajouter un nouvel utilisateur
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(),$this->rules(), $this->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }


        if($request->filled('departement_id')){
            User::create( [
                'nom' => $request->nom,
                'prenom'=> $request->prenom,
                'email' => $request->email,
                'role_id'=> $request->role_id,
                'telephone'=> $request->telephone,
                'sexe'=> $request->sexe,
                'ufr_id' => $request->ufr_id,
                'date_naiss'=> $request->date_naiss,
                'password'=>Hash::make($request->password),
                'departement_id' => $request->departement_id
            ]);
        }else{
            User::create( [
                'nom' => $request->nom,
                'prenom'=> $request->prenom,
                'email' => $request->email,
            'role_id'=> $request->role_id,
                'telephone'=> $request->telephone,
                'sexe'=> $request->sexe,
                'ufr_id' => $request->ufr_id,
                'date_naiss'=> $request->date_naiss,
                'password'=>Hash::make($request->password),
            ]);
        }
        return response()->json(['success' => true, 'msg' => "L'utilisateur ajouté avec succés !"]);
    }
  public function disable($id){
   
    $user=User::find($id);
    if($user->status==1){
        User::where('id',$id)->update(['status'=>0]);
        return redirect()->back();
    }
    if($user->status ==0){
        User::where('id',$id)->update(['status'=>1]);
        return redirect()->back();
    }

  }

    public function update(Request $request, string $id){
        $validator = Validator::make($request->all(),$this->rules(true), $this->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if($request->filled('departement_id')){
            User::where('id', $id)->update( [
                'nom' => $request->nom,
                'prenom'=> $request->prenom,
                'email' => $request->email,
                'role_id'=> $request->role_id,
                'telephone'=> $request->telephone,
                'sexe'=> $request->sexe,
                'ufr_id' => $request->ufr_id,
                'date_naiss'=> $request->date_naiss,
                'password'=>Hash::make($request->password),
                'departement_id' => $request->departement_id
            ]);
        }else{
            User::where('id', $id)->update( [
                'nom' => $request->nom,
                'prenom'=> $request->prenom,
                'email' => $request->email,
            'role_id'=> $request->role_id,
                'telephone'=> $request->telephone,
                'sexe'=> $request->sexe,
                'ufr_id' => $request->ufr_id,
                'date_naiss'=> $request->date_naiss,
                'password'=>Hash::make($request->password),
            ]);
        }

        return response()->json(['success' => true, 'msg' => 'Mise à jour de l\'utilisteur réussie avec succès !']);
    }

    public function filtre(Request $request)
    {
        $query = User::query();
        
        if ($request->filled('ufr_id')) {
            $query->whereIn('ufr_id', $request->ufr_id);
        }
        if ($request->filled('status')) {
            $query->whereIn('status', $request->status);
        }
        if ($request->filled('role')) { 
             $query->whereHas('roles', function ($query) use ($request) {
                        $query->whereIn('nom', $request->role);
        });
        }
        //dd($query->get());
        if ($request->filled('order')) {
            foreach ($request->order as $order) {
                $query->orderBy($order, 'asc');
            }
        }
    
        $users = $query->paginate(7);

        //dd($users);
        $ufr = Ufr::all();
        $roles = Role::all();
        $departements = Departement::all();
        return view('users.admin.users',compact('users', 'ufr', 'departements','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_compte()
    {
        $user=Auth::user();

        return view('users.setting.compte',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_compte(Request $request)
    {
        $id = Auth::user()->getAuthIdentifier();

        // Validation sans imposer le champ image si elle n'est pas présente
        $regles = [
            'email' => 'required|email|unique:users,email,' . $id,
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|digits:9',
        ];

        if ($request->hasFile('image')) {
            $regles['image'] = 'image|mimes:jpeg,png,jpg,gif';
        }

        $credentials = $request->validate($regles);


        $user = User::find($id);

        $updateData = [
            'nom' => $credentials['nom'],
            'prenom' => $credentials['prenom'],
            'email' => $credentials['email'],
            'telephone' => $credentials['telephone'],
        ];

        // On Vérifie si un fichier image est présent et valide
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Supprimer l'ancienne image de profil s'il en existe une dans le BD
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            //ON enregistre la nouvelle image de profil avec un nom unique
            $imagePath = $request->image->store('images', 'public');

            $updateData['image'] = $imagePath;
        }


        $user->update($updateData);

        return redirect()->back()->withSuccess('Votre profile a été mis à jour avec succès !');;
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit_password()
    {
        $id=auth()->user()->getAuthIdentifier();
        return view('users.setting.change_mdp',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_password(Request $request ,$id)
    {
        //dd(User::find($id));

        $validated=$request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'old-password'=>['required','string']
            ]
        );
        //dd(Hash::check($validated['old-password'], \auth()->user()->password));

        if(!Hash::check($validated['old-password'], \auth()->user()->password)){

           return back()->withErrors(['msg'=>'La mise à jour  de votre mot de passe a échoué']);

        }

        $validated['password']=Hash::make($validated['password']);//encyter le  password
        $data=['password' => $validated['password']];

        // update le mot de passe
            User::find($id)->update($data);

            return redirect()->back()->withSuccess('Votre mot de passe a été mis à jour');
       }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $userId = $request->input('id');
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès');
    }

}
