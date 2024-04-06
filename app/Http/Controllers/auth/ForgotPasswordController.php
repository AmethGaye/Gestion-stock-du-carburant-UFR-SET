<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ForgotPasswordRequest $request)
    {
        $token = Str::random(64);

        // Vérifier si un token existe déjà pour cet email
        $existingToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if ($existingToken) {
            // Mettre à jour le token existant
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]);
        } else {
            // Insérer un nouveau token
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        }

        // Envoyer l'email avec le token
        Mail::send('emails.forgot-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Réinitialiser votre mot de passe');
        });

        return redirect()->to(route('password.email'))
            ->with('success', 'Nous vous avons envoyé un email pour la réinitialisation de votre mot de passe.');
    }


}
