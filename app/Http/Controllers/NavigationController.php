<?php

namespace App\Http\Controllers;

use App\Models\ForumQuestion;
use App\Models\Game;
use App\Models\GameGenre;
use App\Models\User;
use App\Models\UserPriceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NavigationController extends Controller
{
    public function indexPage() 
    {
        $genres = GameGenre::all()->sortBy('name')->take(12);
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
    
    public function gameListPage(Request $request)
    {
        $selectedGenre = $request->query('genre', null);
        $selectedGenreId = GameGenre::where('name', 'LIKE', $selectedGenre)->pluck('id');

        $genres = GameGenre::all();
        if(!$selectedGenre)
            $games = Game::all();
        else
            $games = Game::where('genre_id', 'LIKE', $selectedGenreId)->get();

        return view('game', compact('genres', 'games', 'selectedGenre'));
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

    public function competitionPage()
    {
        return view('competition/index');
    }

    public function competitionDetailPage()
    {
        return view('competition/detail');
    }

    public function gameDetailPage(Request $request)
    {
        $game = Game::where('name', $request->name)->first();
        return view('game-detail/index', compact('game'));
    }

    public function playerListPage()
    {
        $users = User::all();
        return view('player', compact('users'));
    }

    public function playerDetailPage($id)
    {
        $user = User::findOrFail($id);
        return view('player-detail/index', compact('user'));
    }

    public function forumPage()
    {
        $forumQuestions = ForumQuestion::all();
        Carbon::setLocale('id');

        return view('forum/index', compact('forumQuestions'));
    }
}
