<?php

use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\Company\AuthController as CompanyAuthController;
use App\Http\Controllers\DropboxController;
use App\Http\Controllers\ViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'company'], function () {
    Route::post('login', [CompanyAuthController::class, 'login']);
    Route::post('register', [CompanyAuthController::class, 'register']);
    Route::get('dropbox/file', [CompanyAuthController::class, 'getFile']);


});


// Auth
Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'user', 'middleware' => 'auth:sanctum'], function () {

    Route::get('/', function (Request $request) {
        return auth('api')->user();
    });

    Route::get('views', ViewController::class);
});
