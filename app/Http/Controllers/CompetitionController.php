<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetitionRequest;
use App\Models\Competition;
use App\Models\CompetitionMember;
use App\Models\CompetitionTeam;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = Competition::all();
        return view('competition/index', compact('competitions'));
    }

    public function create()
    {
        $games = Game::all();
        return view('competition/create', compact('games'));
    }

    public function store(StoreCompetitionRequest $request)
    {
        $request->validated();

        Competition::create([
            'organizer_user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'coin_prize' => $request->coin_prize,
            'coin_registration' => $request->coin_register,
            'maximum_team' => $request->team_count,
            'registration_start_time' => $request->register_start_date,
            'registration_end_time' => $request->register_finish_date,
            'competition_start_time' => $request->competition_start_date,
            'competition_end_time' => $request->competition_finish_date,
            'whatsapp_link_group' => $request->whatsapp,
            'game_id' => $request->game_id,
            'type' => $request->type,
            'status' => 'Belum Selesai'
        ]);

        return redirect()->route('competitionPage');
    }

    public function join(Request $request)
    {
        $competition = Competition::findOrFail($request->competition_id);

        if(Auth::user()->coin < $competition->coin_registration){
            return redirect()->route('competitionPage')
                            ->withErrors(['coin' => 'You do not have enough coins to join this competition.']);
        }

         CompetitionMember::create([
            'competition_id' => $request->competition_id,
            'player_id' => Auth::user()->id,
            'team_name' => ('Team ' . Auth::user()->name)
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'coin' => $user->coin - $competition->coin_registration
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $competition = Competition::findOrFail($request->competition_id);
        $competition->update([
            'status' => 'Selesai'
        ]);

        return back();
    }
}
