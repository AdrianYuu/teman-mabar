<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameGenreController;
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;

// Navigation
Route::get('/', [NavigationController::class, 'indexPage'])->name('indexPage');
Route::get('/login', [NavigationController::class, 'loginPage'])->name('loginPage');
Route::get('/register', [NavigationController::class, 'registerPage'])->name('registerPage');

Route::prefix('admin')->group(function () {
    Route::get('/', [NavigationController::class, 'adminIndexPage'])->name('adminIndexPage');

    // GAME
    Route::get('/game', [NavigationController::class, 'adminItemGamePage'])->name('adminItemGamePage');

    // GAME GENRE
    Route::get('/game-genre', [GameGenreController::class, 'index'])->name('gameGenrePage');
    Route::get('/game-genre/create', [GameGenreController::class, 'create'])->name('createGameGenrePage');
    Route::post('/game-genre/create', [GameGenreController::class, 'store'])->name('storeGameGenre');
    Route::get('/game-genre/edit/{id}', [GameGenreController::class, 'edit'])->name('editGameGenrePage');
    Route::put('/game-genre/edit/{id}', [GameGenreController::class, 'update'])->name('updateGameGenre');
    Route::get('/game-genre/delete/{id}', [GameGenreController::class, 'delete'])->name('deleteGameGenrePage');
    Route::delete('/game-genre/delete/{id}', [GameGenreController::class, 'destroy'])->name('destroyGameGenre');

    // PAYMENT
    Route::get('/payment', [NavigationController::class, 'adminItemPaymentPage'])->name('adminItemPaymentPage');
});

// Auth
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');