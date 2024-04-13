<?php

namespace App\Http\Controllers;

use App\Models\User;

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
    public function index()
    {
       $users = User::all();
        if(Auth::user()->role === 'admin'){
            return view('users.admin.users',compact('users'));
        }
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

        $validated = $validator->validated();
        if($validated){
            User::create( [
                        'nom' => $validated['nom'],
                        'prenom'=> $validated['prenom'],
                        'email' => $validated['email'],
                        'role'=> $validated['role'],
                        'telephone'=> $validated['telephone'],
                        'date_naiss'=> '2000-11-18',
                        'password'=>Hash::make($validated['password']),
                    ]);
            return response()->json(['success' => true, 'msg' => "L'utilisateur ajouté avec succés !"]);
        }
    }


    /**
     * gestion des roles
     */
    public function roles()
    {

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

        $updateData = [
            'nom' => $credentials['nom'],
            'prenom' => $credentials['prenom'],
            'email' => $credentials['email'],
            'telephone' => $credentials['telephone'],
        ];

        // Vérifie si un fichier image est présent et valide
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // On Vérifie si l'utilisateur a déjà une image de profil enregistrée dans la BD
            $user = User::find($id);
            if ($user->image) {
                // Supprime l'ancienne image de profil s'il en existe une
                Storage::disk('public')->delete($user->image);
            }
            // ON Enregistre la nouvelle image de profil
            $imagePath = $request->image->store('images', 'public');

            $updateData['image'] = $imagePath;
        }

        User::where('id', $id)->update($updateData);

        return redirect()->to(route('admin.dashboard'));
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

            return redirect()->route('setting.password')->withSuccess('Votre mot de passe a été mis à jour');
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
