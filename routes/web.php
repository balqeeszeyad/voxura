<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// public home/welcome
Route::get('/', function () {
    return view('welcome');
});

// authentication
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// protected dashboard example
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
});
