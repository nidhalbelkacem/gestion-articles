<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuteurController;
use Illuminate\Support\Facades\Route;

// Page d'accueil : redirige vers les articles
Route::get('/', function () {
    return redirect()->route('articles.index');
});

// Routes protégées : accessibles uniquement si connecté
Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategorieController::class);
    Route::resource('auteurs', AuteurController::class);
});

// Routes d'authentification (login, register, logout, etc.)
require __DIR__.'/auth.php';