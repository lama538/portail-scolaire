<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\AffectationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🌐 Page d’accueil publique
Route::get('/', function () {
    return view('welcome');
});

// 🧠 Dashboard authentifié
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 👤 Gestion du profil utilisateur (fourni avec Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 📚 Routes des ressources (modules protégés par auth)
   Route::resource('eleves', EleveController::class)->parameters([
    'eleves' => 'eleve',
]);

    Route::resource('enseignants', EnseignantController::class);
    Route::resource('classes', ClasseController::class);
    Route::resource('notes', NoteController::class);
    Route::resource('bulletins', BulletinController::class);
    Route::resource('periodes', PeriodeController::class);
    Route::resource('annees', AnneeScolaireController::class);
});


Route::resource('niveaux', NiveauController::class)->middleware('auth'); 
// ajoute ou adapte middleware selon ta sécurisation
Route::resource('matieres', MatiereController::class)->middleware('auth');


Route::resource('affectations', AffectationController::class);

// TODO: vérification Eleve






// 🔐 Authentification Breeze
require __DIR__.'/auth.php';
