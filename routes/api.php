<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Pet\GetUserPetsController;
use App\Http\Controllers\Pet\PetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', LoginController::class)->name('login');
Route::post('/register', RegisterController::class)->name('register');


/*
 *********************************************************
 *** Authenticated Access Routes
 *********************************************************
 */
Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('pets', PetController::class);
    Route::get('/user/{user}/pets', GetUserPetsController::class)->name('user.pets');
});
