<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;

// Navigation
Route::get('/', [NavigationController::class, 'indexPage'])->name('indexPage');
Route::get('/login', [NavigationController::class, 'loginPage'])->name('loginPage');
Route::get('/register', [NavigationController::class, 'registerPage'])->name('registerPage');

// Auth
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');