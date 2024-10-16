<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameGenreRequest;
use App\Http\Requests\UpdateGameRequest;
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

        if($request->hasFile('game_picture')){
            $file = $request->file('game_picture');
            $fileUrl = FirebaseStorageService::uploadImage($file);
        }

        Game::create([
            'genre_id' => $validated['genre_id'],
            'name' => $validated['name'],
            'game_picture_url' => $fileUrl
        ]);

        return redirect(route('gamePage'))->with('success', 'Game created successfully!');
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        $gameGenres = GameGenre::where('id', '<>', $game->genre_id);

        return view('admin/game/edit', compact(['game', 'gameGenres']));
    }

    public function update(UpdateGameRequest $request, $id)
    {
        $validated = $request->validated();

        $game = Game::findOrFail($id);

        $game->update([
            'genre_id' => $validated['genre_id'],
            'name' => $validated['name'],
        ]);

        if($request->hasFile('game_picture')){
            $file = $request->file('game_picture');
            $fileUrl = FirebaseStorageService::uploadImage($file);

            $game->update([
                'game_picture_url' => $fileUrl,
            ]);
        }

        return redirect(route('gamePage'))->with('success', 'Game updated successfully!');
    }

    public function delete($id)
    {
        $game = Game::findOrFail($id);

        return view('admin/game/delete', compact('game'));
    }

    public function destroy($id)
    {
        Game::destroy($id);
        
        return redirect(route('gamePage'))->with('success', 'Game deleted successfully!');
    }
}
