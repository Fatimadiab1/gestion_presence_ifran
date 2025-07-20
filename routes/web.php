<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsEtudiant;
use App\Http\Middleware\IsProfesseur;
use App\Http\Middleware\IsParent;
use App\Http\Middleware\IsCoordinateur;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


Route::resource('/admin/users', UserController::class)->names('admin.users')->middleware(['auth', IsAdmin::class]);


Route::get('admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');




Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(IsAdmin::class)->name('admin.dashboard');

    Route::get('/etudiant/dashboard', function () {
        return view('etudiant.dashboard');
    })->middleware(IsEtudiant::class)->name('etudiant.dashboard');

    Route::get('/professeur/dashboard', function () {
        return view('professeur.dashboard');
    })->middleware(IsProfesseur::class)->name('professeur.dashboard');

    Route::get('/parent/dashboard', function () {
        return view('parent.dashboard');
    })->middleware(IsParent::class)->name('parent.dashboard');

    Route::get('/coordinateur/dashboard', function () {
        return view('coordinateur.dashboard');
    })->middleware(IsCoordinateur::class)->name('coordinateur.dashboard');
});

require __DIR__.'/auth.php';
