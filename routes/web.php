<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Landing page route (after login redirect)
Route::get('/landing', function () {
    return view('landing_page');
})->name('landing');

//  Route::get("/test", function () {
//      return view('test');
//  })->name('test');