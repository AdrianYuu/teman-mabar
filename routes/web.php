<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ForumCommentController;
use App\Http\Controllers\ForumQuestionController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameGenreController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPriceDetailController;
use Illuminate\Support\Facades\Route;
use Kreait\Firebase\DynamicLink\NavigationInfo;

// Navigation
Route::get('/', [NavigationController::class, 'indexPage'])->name('indexPage');

Route::get('/game', [NavigationController::class, 'gameListPage'])->name('gameListPage');
Route::get('/player', [NavigationController::class, 'playerListPage'])->name('playerListPage');
Route::get('/profile', [NavigationController::class, 'profilePage'])->name('profilePage');
Route::get('/game-detail', [NavigationController::class, 'gameDetailPage'])->name('gameDetailPage');
Route::get('/player-detail/{id}', [NavigationController::class, 'playerDetailPage'])->name('playerDetailPage');

Route::get('/forum', [NavigationController::class, 'forumPage'])->name('forumPage');
Route::get('/forum-detail/{id}', [NavigationController::class, 'forumDetailPage'])->name('forumDetailPage');

// Auth
Route::middleware(['guest'])->group(function() {
    Route::get('/register', [NavigationController::class, 'registerPage'])->name('registerPage');
    Route::get('/login', [NavigationController::class, 'loginPage'])->name('loginPage');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// CUSTOMER
Route::middleware(['auth'])->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('/profile/update', [UserController::class, 'update'])->name('updateUser');
    Route::put('/profile/picture-update', [UserController::class, 'upload'])->name('upload');
    Route::post('/profile/user-price-detail/create', [UserPriceDetailController::class, 'store'])->name('storeUserPriceDetail');
    Route::put('/profile/user-price-detail/update', [UserPriceDetailController::class, 'update'])->name('updateGamePrice');
    Route::delete('/profile/user-price-detail/delete', [UserPriceDetailController::class, 'destroy'])->name('destroyUserPriceDetail');

    Route::post('/forum/store', [ForumQuestionController::class, 'store'])->name('storeForumQuestion');
    Route::post('/forum-comment/store/{id}', [ForumCommentController::class, 'store'])->name('storeForumComment');

    Route::post('/order/create/{gameId}/{gamerUserId}', [OrderController::class, 'create'])->name('storeOrder');
    Route::put('/order/edit/{id}', [OrderController::class, 'update'])->name('updateOrder');

    Route::post('/competition/create', [CompetitionController::class, 'store'])->name('storeCompetition');
    Route::post('/competition/join', [CompetitionController::class, 'join'])->name('joinCompetition');
    Route::put('/competition/update', [CompetitionController::class, 'update'])->name('updateCompetition');
    Route::get('/competition', [CompetitionController::class, 'index'])->name('competitionPage');
    Route::get('/competition/create', [CompetitionController::class, 'create'])->name('createCompetitionPage');

    Route::post('/manage-coin/top-up/create', [UserActivityController::class, 'topUpStore'])->name('storeTopUp');
});

// ORDER
Route::get('/order', [OrderController::class, 'index'])->name('orderPage');

// MANAGE COIN
Route::get('/manage-coin', [UserActivityController::class, 'manageCoinPage'])->name('manageCoinPage');

// ADMIN
Route::prefix('admin')->middleware(['admin'])->group(function () {
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
