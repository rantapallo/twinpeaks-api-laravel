<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharController;
use App\Http\Controllers\UserController;

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

// Public routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/characters', [CharController::class, 'index']);
Route::get('/characters/{charid}', [CharController::class, 'show']);
Route::get('/characters/search/{name}', [CharController::class, 'search']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/characters', [CharController::class, 'store']);
    Route::put('/characters/{charid}', [CharController::class, 'update']);
    Route::delete('/characters/{charid}', [CharController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);
});
