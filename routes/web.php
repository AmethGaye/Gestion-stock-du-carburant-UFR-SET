<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;

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
    return view('welcome');
});


/*
    les Routes pour l'authentification
*/

// inscription d'un utlisateur
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

// connexion d'un utlisateur
Route::get('/login', [RegisterController::class, 'create']);
Route::post('/login', [RegisterController::class, 'store']);

