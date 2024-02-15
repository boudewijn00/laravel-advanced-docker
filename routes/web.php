<?php

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
    ->middleware('auth');

Route::get('/users', [\App\Http\Controllers\UsersController::class, 'index'])
    ->middleware('auth');

Route::post('/users', [\App\Http\Controllers\UsersController::class, 'create'])
    ->middleware('auth');

require __DIR__.'/auth.php';
