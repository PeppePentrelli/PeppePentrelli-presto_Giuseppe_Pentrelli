<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorContoller;
use App\Models\Article;

// Rotte per homepage
Route::get('/' , [PublicController::class , 'homepage'])->name('homepage');

// Rotte per Articoli
Route::get('/create/article' , [ArticleController::class, 'create'])->name('article.create');
Route::get('/show/article/{article}' , [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/index' , [ArticleController::class, 'index'])->name('article.index');
Route::get('/category/{category}' , [ArticleController::class, 'byCategory'])->name('byCategory');

// Rotte per revisori
Route::get('revisor/index' , [RevisorContoller::class , 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}' , [RevisorContoller::class , 'accept'])->name('accept');
Route::patch('/reject/{article}' , [RevisorContoller::class , 'reject'])->name('reject');

// Rotte per diventare Revisore
Route::get('/revisor/request' , [RevisorContoller::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}' , [RevisorContoller::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');

// Rotte per ricerca di articoli
Route::get('/search/article/' , [PublicController::class, 'searchArticles'])->name('article.search');

// Rotta per cambiare lingua
Route::post('/lingua/{lang}' , [PublicController::class, 'setLenguage'])->name('setLocale');




