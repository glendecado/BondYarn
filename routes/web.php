<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route for the homepage, redirecting based on authentication status

// Route for login, accessible only by guests (unauthenticated users)
Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login')->middleware('guest');



Route::get('/', function () {
    return Inertia::render('Public/Bondyard');
})->name('dashboard')->middleware('auth');


// Route for handling login POST requests
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route for handling registration
Route::post('/register', [AuthController::class, 'register']);

// Route for logging out, only accessible to authenticated users
Route::post('/logout', [AuthController::class, 'logout']);
