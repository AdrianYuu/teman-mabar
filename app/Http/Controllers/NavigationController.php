<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameGenre;
use App\Models\User;
use App\Models\UserPriceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{
    public function indexPage() 
    {
        $genres = GameGenre::all()->sortBy('name')->take(8);
        $games = Game::all();
        return view('index', compact('genres', 'games'));
    }

    public function loginPage()
    {
        return view('login');
    }

    public function registerPage()
    {
        return view('register');
    }
    
    public function gameListPage()
    {
        return view('game-list');
    }

    public function profilePage()
    {
        $userGames = UserPriceDetail::where('user_id', Auth::user()->id)->get();
        $gameIds = $userGames->pluck('game_id');
        $games = Game::whereNotIn('id', $gameIds)->get();
        $authUser = User::findOrFail(Auth::user()->id);

        return view('profile', compact('userGames', 'games', 'authUser'));
    }

    public function adminIndexPage()
    {
        return view('admin/index');
    }

    public function competitionPage(Request $request)
    {
        return view('competition/index');
    }

    public function competitionDetailPage()
    {
        return view('competition/detail');
    }
}
