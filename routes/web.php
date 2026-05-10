<?php

use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ChirpController::class, 'index']);
// Route::post("/chirps", [ChirpController::class, 'store'])->middleware('auth');
Route::post('/chirps', [ChirpController::class, 'store']);
Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);

// below is same as line 8,9,10,11 but it is more concise and easier to maintain as it uses resourceful routing. The except method is used to exclude the routes that are already defined above.
// Route::resource('/chirps', ChirpController::class)->except(['index', 'store', 'edit', 'update', 'destroy']);

// Register routes
Route::view('/register', 'auth.register')->middleware('guest')->name('register');
Route::post('/register', Register::class, )->middleware('guest');

// Logout route
Route::post('/logout', Logout::class)->middleware('auth');