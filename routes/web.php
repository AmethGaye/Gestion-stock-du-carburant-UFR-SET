<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('users.directeur.activites');
});


/*
    les Routes pour l'authentification
*/


// connexion d'un utlisateur
Route::get('/register', [RegisterController::class, 'create'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'store']);

// connexion d'un utlisateur
Route::get('/login', [LoginController::class, 'create'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login']);

// deconnexion d'un utlisateur
Route::post('/logout', [LogoutController::class, 'destroy'])->name('auth.logout')->middleware('auth');

// oubli de mot de passe
Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.email')->middleware('guest');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'update'])->name('password.update');


