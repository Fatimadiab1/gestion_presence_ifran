<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

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
});

Route::middleware(['auth', CheckRole::class . ':admin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware(['auth', CheckRole::class . ':etudiant'])->get('/etudiant/dashboard', function () {
    return view('etudiant.dashboard');
})->name('etudiant.dashboard');

Route::middleware(['auth', CheckRole::class . ':professeur'])->get('/professeur/dashboard', function () {
    return view('professeur.dashboard');
})->name('professeur.dashboard');

Route::middleware(['auth', CheckRole::class . ':parent'])->get('/parent/dashboard', function () {
    return view('parent.dashboard');
})->name('parent.dashboard');

Route::middleware(['auth', CheckRole::class . ':coordinateur'])->get('/coordinateur/dashboard', function () {
    return view('coordinateur.dashboard');
})->name('coordinateur.dashboard');


require __DIR__.'/auth.php';
