<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// login endpoint for issuing tokens
Route::post('/login', [\App\Http\Controllers\Api\UserController::class, 'login']);

// logout endpoint for revoking tokens
Route::middleware('auth:sanctum')->post('/logout', [\App\Http\Controllers\Api\UserController::class, 'logout']);
