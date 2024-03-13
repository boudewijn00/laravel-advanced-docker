<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Modules\Brand\Http\Controllers\BrandsController;
use Modules\Supplier\Http\Controllers\SuppliersController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UsersController::class, 'show']);
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/suppliers', [SuppliersController::class, 'index']);
    Route::get('/suppliers/{id}', [SuppliersController::class, 'show']);
    Route::post('/suppliers', [SuppliersController::class, 'create']);
    Route::put('/suppliers/{id}', [SuppliersController::class, 'update']);
    Route::delete('/suppliers/{id}', [SuppliersController::class, 'destroy']);
    Route::post('/brands', [BrandsController::class, 'create']);
});


