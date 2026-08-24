<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuteurController;

Route::redirect('/', '/articles');

Route::resource('articles', ArticleController::class);
Route::resource('categories', CategorieController::class);
Route::resource('auteurs', AuteurController::class);