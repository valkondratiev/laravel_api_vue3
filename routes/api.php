<?php

use App\Http\Controllers\AccountController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/test', [AccountController::class, 'test']);
});

Route::prefix('account')->group(function () {

    Route::post('/signup', [AccountController::class, 'signup']);
    Route::post('/signin', [AccountController::class, 'signin']);

});
