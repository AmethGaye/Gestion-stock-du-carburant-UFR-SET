<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\auth\ForgotPasswordController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect()->route('auth.login');
});


/*
    les Routes pour l'authentification
*/




// connexion d'un utlisateur
Route::get('/login', [LoginController::class, 'create'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login']);

// deconnexion d'un utlisateur
Route::post('/logout', [LogoutController::class, 'logout'])->name('auth.logout')->middleware('auth');

// oubli de mot de passe
Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.email') ;//->middleware('guest');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store']) ;//->middleware('guest');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'update'])->name('password.update');


/*
    les Routes de l'administrateur
*/

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/admin/roles', [UserController::class, 'roles'])->name('admin.roles');

Route::get('/admin/setting/compte', [UserController::class, 'edit_compte'])->name('setting.compte');
Route::post('/admin/setting/compte', [UserController::class, 'update_compte']);

Route::get('/admin/setting/change-password', [UserController::class, 'edit_password'])->name('setting.password');
Route::post('/admin/setting/change-password', [UserController::class, 'update_password']);

Route::post('/admin/users/register', [UserController::class, 'store']);


/*
    les Routes du directeur
*/



