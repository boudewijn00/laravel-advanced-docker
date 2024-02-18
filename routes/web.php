<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    echo phpinfo();
});

Route::get('/user', [\App\Http\Controllers\UsersController::class, 'show'])
    ->middleware('auth:sanctum');

Route::get('/users', [\App\Http\Controllers\UsersController::class, 'index'])
    ->middleware('auth:sanctum');

Route::post('/user', [\App\Http\Controllers\UsersController::class, 'create'])
    ->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

require __DIR__.'/auth.php';
