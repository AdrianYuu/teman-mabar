<?php

use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;

// Navigation
Route::get('/', [NavigationController::class, 'indexPage'])->name('indexPage');
Route::get('/login', [NavigationController::class, 'loginPage'])->name('loginPage');