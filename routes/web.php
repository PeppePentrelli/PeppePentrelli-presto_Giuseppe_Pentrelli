<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Models\Article;

// Rotte per homepage
Route::get('/' , [PublicController::class , 'homepage'])->name('homepage');

// Rotte per Articoli
Route::get('/create/article' , [ArticleController::class, 'create'])->name('article.create');


