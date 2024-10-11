<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WebsiteController; 
use App\Http\Controllers\MbpsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;


// Redirect to the login page for the root URL
Route::get('/', function () {
    return redirect()->route('login.form');
});

// Route for the website page
Route::get('/website', [WebsiteController::class, 'index'])->name('website.index');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Redirect to the services page after login
    Route::get('/home', function () {
        return redirect()->route('services.index');
    })->name('home');

    Route::resource('services', ServiceController::class);
    Route::resource('mbps', MbpsController::class);


    // Route for user list
    Route::get('/user-list', [AuthController::class, 'userList'])->name('user.list');

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    });
    
});


