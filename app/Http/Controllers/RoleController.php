<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(5);
        return view('users.admin.roles', compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['nom' => 'required|string', 'priorite' => 'required|numeric']);
        
        if($validated){
            Role::create([
                'nom' => $validated['nom'],
                'priorite' => $validated['priorite']
            ]);
            return redirect()->route('admin.roles')->with('success', 'Role crée avec succés !'); 
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);

        return response()->json(['success' => true, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(['nom' => 'required|string', 'priorite' => 'required|numeric']);
        
        if($validated){
            Role::where('id', $id)->update($request->only('nom', 'priorite'));
            return redirect()->route('admin.roles')->with('success', 'mise à jour réussie !'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return back()->with('success', 'Role Supprimé avec succés !');
    }
}
