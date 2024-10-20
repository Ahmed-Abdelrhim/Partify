<?php

use App\Http\Controllers\ApiDev\TagController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayPlayingController;

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
