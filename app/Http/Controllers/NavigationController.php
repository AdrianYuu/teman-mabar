<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameGenre;
use Illuminate\Http\Request;

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
        return view('profile');
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
