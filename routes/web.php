<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\LogRequest;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ApplicantController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/create', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}/edit', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}/edit', [JobController::class, 'destroy'])->name('jobs.destroy');
    Route::post('/jobs/{job}/apply', [ApplicantController::class, 'store'])->name('applicant.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/applicants/{applicant}', [ApplicantController::class, 'destroy'])->name('applicant.destroy');

    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/shoppingCart', [ShoppingCartController::class, 'index'])->name('shoppingCart');
    Route::delete('/shoppingCart', [ShoppingCartController::class, 'destroy'])->name('shoppingCart.destroy');
    Route::post('/shoppingCart/{job}', [ShoppingCartController::class, 'store'])->name('shoppingCart.store');
    Route::delete('/shoppingCart/{job}', [ShoppingCartController::class, 'destroy'])->name('shoppingCart.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index')->middleware(LogRequest::class);
Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');

    Route::get('/forgotPassword', function () {
        return view('auth.forgotPassword');
    })->name('password.request');
    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.resetPassword', ['token' => $token]);
    })->name('password.reset');
    Route::post('/forgot-password', [LoginController::class, 'forgotPassword'])->name('password.email')->middleware('throttle:3,1');
    Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('password.update');
});