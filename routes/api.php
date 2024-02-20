<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [\App\Http\Controllers\UsersController::class, 'show']);
    Route::get('/users', [\App\Http\Controllers\UsersController::class, 'index']);

    Route::post('/logout', function (Request $request) {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Tokens Revoked',
        ]);
    });
});

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->name('register');

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'token' => $request->user()->createToken('abc')->plainTextToken,
        ]);
    }

    return response()->json([
        'message' => 'The provided credentials do not match our records.',
    ], 401);
})->name('login');


