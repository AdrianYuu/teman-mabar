<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameGenreRequest;
use App\Http\Requests\UpdateGameGenreRequest;
use App\Models\GameGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GameGenreController extends Controller
{
    public function index()
    {
        $gameGenres = GameGenre::paginate(9);
        
        return view('admin/game-genre/index', compact('gameGenres'));
    }

    public function create()
    {
        return view('admin/game-genre/create');
    }

    public function store(StoreGameGenreRequest $request)
    {
        $validated = $request->validated();

        GameGenre::create($validated);

        Session::flash('success', 'Game genre created successfully!');

        return redirect(route('gameGenrePage'));
    }

    public function edit($id)
    {
        $gameGenre = GameGenre::findOrFail($id);

        return view('admin/game-genre/edit', compact('gameGenre'));
    }

    public function update(UpdateGameGenreRequest $request, $id)
    {
        $validated = $request->validated();

        $gameGenre = GameGenre::findOrFail($id);

        $gameGenre->update($validated);

        Session::flash('success', 'Game genre updated successfully!');

        return redirect(route('gameGenrePage'));
    }

    public function delete($id)
    {
        $gameGenre = GameGenre::findOrFail($id);

        return view('admin/game-genre/delete', compact('gameGenre'));
    }

    public function destroy($id)
    {
        GameGenre::destroy($id);

        Session::flash('success', 'Game genre deleted successfully!');

        return redirect(route('gameGenrePage'));
    }
}
