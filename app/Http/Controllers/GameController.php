<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Models\Game;
use App\Models\GameGenre;
use App\Services\FirebaseStorageService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::paginate(8);
        
        return view('admin/game/index', compact('games'));
    }

    public function create()
    {
        $gameGenres = GameGenre::all();
        
        return view('admin/game/create', compact('gameGenres'));
    }

    public function store(StoreGameRequest $request)
    {
        $validated = $request->validated();

        $file = $request->file('game_picture');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $fileUrl = FirebaseStorageService::uploadImage($file->getRealPath(), $fileName);

        Game::create([
            'genre_id' => $validated['genre_id'],
            'name' => $validated['name'],
            'game_picture_url' => $fileUrl
        ]);

        return redirect(route('gamePage'))->with('success', 'Game created successfully!');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function destroy()
    {
        
    }
}
