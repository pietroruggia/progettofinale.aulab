<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

use function Laravel\Prompts\search;

Route::get('/', [FrontController::class , 'home'])->name('welcome');
Route::get('/categoria/{category}', [FrontController::class , 'categoryShow'])->name('categoryShow');
Route::get('/prodotti', [FrontController::class, 'prodottiShow'])->name('prodottiShow');
Route::get('/dettaglio/{article}' , [FrontController::class, 'categoryDet'])->name('categoryDet');
Route::get('/revisor/index',[RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::get('/search/article', [FrontController::class, 'searchArticles'])->name('article.search');

Route::post('/lingua/{lang}',[FrontController::class, 'setLanguage'])->name('setLocale');

Route::middleware(['auth'])->group(function(){
Route::get('/article/create', [ArticleController::class , 'create_article'])->name('article.create');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::get('/revisor/request', [RevisorController::class , 'becomeRevisor'])->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class , 'makeRevisor'])->name('make.revisor');
Route::get('/search/article', [FrontController::class, 'searchArticles'])->name('article.search');
});
