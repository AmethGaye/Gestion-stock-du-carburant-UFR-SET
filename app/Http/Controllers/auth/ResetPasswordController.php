<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * renvoie la vue de changement de mot de passe.
     */
    public function create( $token)
    {
        return view('auth.reset-password',compact('token'));
    }

    /**
     * mettre a jour le mot de passe dans base de donnee
     */
    public function update(ResetPasswordRequest $request)
    {
       $update_password=DB::table('password_reset_tokens')
           ->where([
               'email'=>$request->email,
               'token'=>$request->token,
           ])->first();

       if (!$update_password){

           return redirect()->to(route('password.reset'))->withErrors('invalide ');
       }
       User::where('email',$request->email)
           ->update(['password'=>Hash::make($request->password)]);
       DB::table('password_reset_tokens')->where(['email'=>$request->email])->delete();
       return redirect()->to(route('auth.login'))
           ->with('success','Mot de passe reinitialisé');
    }

}
