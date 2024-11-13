<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPriceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPriceDetailController extends Controller
{
    public function store(Request $request)
    {
        // $user = Auth::user();
        // $gameID = $request->game_id;

        // $user->userPriceDetails->attach($gameID, [
        //     'price' => $request->price
        // ]);

        // $user = User::findOrFail(Auth::user()->id);

        // $user->userPriceDetails()->attach($request->game_id, [
        //     'price' => $request->game_price
        // ]);

        $userPriceDetail = new UserPriceDetail([
            'user_id' => Auth::user()->id,
            'game_id' => $request->game_id,
            'price' => $request->price
        ]);
    
        // Save the record into the pivot table
        $userPriceDetail->save();

        return back();
    }
}
