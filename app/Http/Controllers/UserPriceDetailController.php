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
        UserPriceDetail::create([
            'user_id' => Auth::user()->id,
            'game_id' => $request->game_id,
            'price' => $request->price
        ]);

        return back();
    }

    public function update(Request $request)
    {
        UserPriceDetail::where('user_id', 'LIKE', Auth::user()->id)
            ->where('game_id', 'LIKE', $request->update_id)
            ->update([
                'price' => $request->price
            ]);

        return back();
    }

    public function destroy(Request $request)
    {
        UserPriceDetail::where('user_id', Auth::user()->id)->where('game_id', $request->delete_id)->delete();

        return back();
    }
}
