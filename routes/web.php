<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Models\Article;

// Rotte per homepage
Route::get('/' , [PublicController::class , 'homepage'])->name('homepage');

// Rotte per Articoli
Route::get('/create/article' , [ArticleController::class, 'create'])->name('article.create');
Route::get('/show/article/{article}' , [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/index' , [ArticleController::class, 'index'])->name('article.index');
Route::get('/category/{category}' , [ArticleController::class, 'byCategory'])->name('byCategory');





