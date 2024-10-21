<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameGenre;

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

    public function adminIndexPage()
    {
        return view('admin/index');
    }
}
