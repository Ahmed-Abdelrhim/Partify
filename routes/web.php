<?php

use App\Http\Controllers\ApiDev\TagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\SearchableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayPlayingController;
use App\Http\Controllers\GeoLocationController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('play', [PlayPlayingController::class, 'play']);

// Job-listing
Route::get('jobs', [JobController::class, 'index']);


// listing
Route::get('bird', [ListingController::class, 'create']);


// Tags
Route::get('tags', [TagController::class, 'index']);
Route::get('assign-tags', [TagController::class, 'assignTags']);

// Searchable
Route::get('search', SearchableController::class)->name('search');

//
Route::get('get-address-from-ip',[GeoLocationController::class, 'index']);


// Articles
Route::get('article/create',[ArticleController::class, 'create']);
Route::post('article/store',[ArticleController::class, 'store'])->name('articles.store');
Route::get('play-with-articles',[ArticleController::class, 'playWithArticles']);

Route::get('show-articles',[ArticleController::class, 'showArticles']);

Route::get('view-article/{id}',[ArticleController::class, 'viewArticles'])->name('view.article');



