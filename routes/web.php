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
use App\Http\Controllers\DotationAdminsController;
use App\Http\Controllers\DotationDepartsController;
use App\Http\Controllers\HistoriqueController;
use App\Models\Dotation_depart;
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
Route::post('/admin/users/{id}', [UserController::class, 'update'])->name('admin.update');
Route::get('/admin/roles', [UserController::class, 'roles'])->name('admin.roles');


Route::post('/admin/users/', [UserController::class, 'store'])->name('add.user');
Route::delete('/admin/users', [UserController::class, 'destroy'])->name('delete.user');




/*
    Réglages
*/

Route::get('/setting/compte', [UserController::class, 'edit_compte'])->name('setting.compte');
Route::post('/setting/compte', [UserController::class, 'update_compte']);

Route::get('/setting/change-password', [UserController::class, 'edit_password'])->name('setting.password');
Route::post('/setting/change-password/{id}', [UserController::class, 'update_password'])->name('update.password');




/*
    les Routes du Directeur
*/

Route::get('/directeur/dashboard', [DashboardController::class, 'index'])->name('directeur.dashboard');

Route::get('/directeur/activites', [ActiviteController::class, 'index'])->name('directeur.activites');
Route::post('/directeur/activites', [ActiviteController::class, 'store'])->name('directeur.activites');
Route::post('/directeur/activites/update/{id}', [ActiviteController::class, 'update'])->name('d.activites.update');
Route::delete('/directeur/activites/delete/{id}', [ActiviteController::class, 'destroy'])->name('d.activites.delete');


Route::get('/directeur/demandes', [RemboursementController::class, 'index'])->name('directeur.demandes');
Route::post('/directeur/demandes/{id}', [RemboursementController::class, 'update'])->name('approuver');



/*
    les Routes du Département
*/
Route::get('/departement/dashboard', [DashboardController::class, 'index'])->name('departement.dashboard');

Route::get('/departement/vacataires', [VacataireController::class, 'index'])->name('departement.vacataires');
Route::post('/departement/vacataires', [VacataireController::class, 'store']);
Route::post('/departement/vacataires/update/{id}', [VacataireController::class, 'update'])->name('dp.vacataires.update');
Route::delete('/departement/vacataires/delete/{id}', [VacataireController::class, 'destroy'])->name('dp.vacataires.delete');

Route::post('/departement/cours', [CoursController::class, 'store'])->name('cours.store');
Route::get('/departement/cours/all', [CoursController::class, 'index'])->name('cours.all');
Route::post('/departement/cours/all/update/{id}', [CoursController::class, 'update'])->name('cours.update');
Route::delete('/departement/cours/all/{id}', [CoursController::class, 'destroy'])->name('cours.delete');
Route::get('/departement/cours/approbation', [CoursController::class, 'approbation'])->name('cours.approbation');
Route::post('/departement/cours/approbation/{id}', [CoursController::class, 'approuver'])->name('approuver');
Route::post('/departement/cours/restauration/{id}', [CoursController::class, 'restaurer'])->name('restaurer');

Route::post('/departement/cours/update/{id}', [CoursController::class, 'update'])->name('dp.cours.update');
Route::post('/departement/cours/delete/{id}', [CoursController::class, 'delete'])->name('dp.cours.delete');

Route::post('departement/demande_remboursement', [RemboursementController::class, 'store'])->name('dep.remboursement');

/*
    les Routes du Comptable
*/

Route::get('/comptable/dashboard', [DashboardController::class, 'index'])->name('comptable.dashboard');

Route::get('comptable/remboursements', [RemboursementController::class, 'index'])->name('comptable.remboursements');
Route::post('comptable/remboursements/{id}', [RemboursementController::class, 'update'])->name('c.remboursements.update');
Route::post('comptable/remboursement_multiple', [RemboursementController::class, '_update'])->name('c.remboursements._update');

Route::get('comptable/activites', [ActiviteController::class, 'index'])->name('comptable.activites');
Route::post('comptable/activites/{id}', [ActiviteController::class, 'update'])->name('c.activites.update');
Route::put('comptable/activites/reset/{id}', [ActiviteController::class, 'reset'])->name('c.activites.reset');


Route::get('comptable/dotation/administration', [DotationAdminsController::class, 'create'])->name('dotation.admin');
Route::post('comptable/dotation/administration', [DotationAdminsController::class, 'store']);
Route::get('comptable/dotation/departement', [DotationDepartsController::class, 'create'])->name('dotation.depart');
Route::post('comptable/dotation/departement', [DotationDepartsController::class, 'store']);
Route::get('comptable/dotation/historique', [HistoriqueController::class, 'index'])->name('dotation.historique');








