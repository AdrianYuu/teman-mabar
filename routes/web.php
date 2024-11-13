<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameGenreController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPriceDetailController;
use Illuminate\Support\Facades\Route;

// Navigation
Route::get('/', [NavigationController::class, 'indexPage'])->name('indexPage');
Route::get('/login', [NavigationController::class, 'loginPage'])->name('loginPage');
Route::get('/register', [NavigationController::class, 'registerPage'])->name('registerPage');
Route::get('/game', [NavigationController::class, 'gameListPage'])->name('gameListPage');
Route::get('/profile', [NavigationController::class, 'profilePage'])->name('profilePage');
Route::get('/competition', [NavigationController::class, 'competitionPage'])->name('competitionPage');
Route::get('/competition/detail', [NavigationController::class, 'competitionDetailPage'])->name('competitionDetailPage');

// Auth
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// CUSTOMER
Route::put('/profile/update', [UserController::class, 'update'])->name('updateUser');
Route::put('/profile/picture-update', [UserController::class, 'upload'])->name('upload');
Route::put('/profile/price-update', [UserController::class, 'updateGamePrice'])->name('updateGamePrice');
Route::post('/profile/user-price-detail/create', [UserPriceDetailController::class, 'store'])->name('storeUserPriceDetail');

// ADMIN
Route::prefix('admin')->group(function () {
    // INDEX
    Route::get('/', [NavigationController::class, 'adminIndexPage'])->name('adminIndexPage');

    // GAME
    Route::get('/game', [GameController::class, 'index'])->name('gamePage');
    Route::get('/game/create', [GameController::class, 'create'])->name('createGamePage');
    Route::post('/game/create', [GameController::class, 'store'])->name('storeGame');
    Route::get('/game/edit/{id}', [GameController::class, 'edit'])->name('editGamePage');
    Route::put('/game/edit/{id}', [GameController::class, 'update'])->name('updateGame');
    Route::get('/game/delete/{id}', [GameController::class, 'delete'])->name('deleteGamePage');
    Route::delete('/game/delete/{id}', [GameController::class, 'destroy'])->name('destroyGame');

    // GAME GENRE
    Route::get('/game-genre', [GameGenreController::class, 'index'])->name('gameGenrePage');
    Route::get('/game-genre/create', [GameGenreController::class, 'create'])->name('createGameGenrePage');
    Route::post('/game-genre/create', [GameGenreController::class, 'store'])->name('storeGameGenre');
    Route::get('/game-genre/edit/{id}', [GameGenreController::class, 'edit'])->name('editGameGenrePage');
    Route::put('/game-genre/edit/{id}', [GameGenreController::class, 'update'])->name('updateGameGenre');
    Route::get('/game-genre/delete/{id}', [GameGenreController::class, 'delete'])->name('deleteGameGenrePage');
    Route::delete('/game-genre/delete/{id}', [GameGenreController::class, 'destroy'])->name('destroyGameGenre');

    // PAYMENT
    Route::get('/payment', [PaymentController::class, 'index'])->name('paymentPage');
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('createPaymentPage');
    Route::post('/payment/create', [PaymentController::class, 'store'])->name('storePayment');
    Route::get('/payment/edit/{id}', [PaymentController::class, 'edit'])->name('editPaymentPage');
    Route::put('/payment/edit/{id}', [PaymentController::class, 'update'])->name('updatePayment');
    Route::get('/payment/delete/{id}', [PaymentController::class, 'delete'])->name('deletePaymentPage');
    Route::delete('/payment/delete/{id}', [PaymentController::class, 'destroy'])->name('destroyPayment');

    // USER
    Route::get('/user', [UserController::class, 'index'])->name('userPage');
});
