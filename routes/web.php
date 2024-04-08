<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VacataireController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\RemboursementController;
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
Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.email')->middleware('guest');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'update'])->name('password.update');


/*
    les Routes de l'administrateur
*/

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/admin/roles', [UserController::class, 'roles'])->name('admin.roles');


Route::post('/admin/users/register', [UserController::class, 'store'])->name('add.user');



/*
    Réglages
*/

Route::get('/setting/compte', [UserController::class, 'edit_compte'])->name('setting.compte');
Route::post('/setting/compte', [UserController::class, 'update_compte']);

Route::get('/setting/change-password', [UserController::class, 'edit_password'])->name('setting.password');
Route::post('/setting/change-password', [UserController::class, 'update_password']);




/*
    les Routes du Directeur
*/

Route::get('/directeur/dashboard', [DashboardController::class, 'index'])->name('directeur.dashboard');

Route::get('/directeur/activites', [ActiviteController::class, 'index'])->name('directeur.activites');
Route::post('/directeur/activites/update/{id}', [ActiviteController::class, 'update'])->name('activite.update');
Route::post('/directeur/activites/delete/{id}', [ActiviteController::class, 'destroy'])->name('activite.delete');

Route::get('/directeur/demandes', [RemboursementController::class, 'index'])->name('directeur.demandes');
Route::post('/directeur/demandes/{id}', [RemboursementController::class, 'update'])->name('approuver');



/*
    les Routes du Département
*/
Route::get('/departement/dashboard', [DashboardController::class, 'index'])->name('departement.dashboard');

Route::get('/departement/vacataires', [VacataireController::class, 'index'])->name('departement.vacataires');
Route::post('/departement/vacataires/update/{id}', [VacataireController::class, 'update'])->name('vacataire.update');
Route::post('/departement/vacataires/delete/{id}', [VacataireController::class, 'destroy'])->name('vacataire.delete');

Route::get('/departement/cours/all', [CoursController::class, 'index'])->name('cours.all');
Route::get('/departement/cours/approbation', [CoursController::class, 'approbation'])->name('cours.approbation');
Route::post('/departement/cours/approbation/{id}', [CoursController::class, 'approuver'])->name('approuver');

Route::post('/departement/cours/update/{id}', [CoursController::class, 'update'])->name('cours.update');
Route::post('/departement/cours/delete/{id}', [CoursController::class, 'delete'])->name('cours.delete');






