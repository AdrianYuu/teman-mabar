<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Game;
use App\Models\Order;
use App\Models\User;
use App\Models\UserPriceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function create(Request $request, $game_id, $gamer_user_id)
    {
        $currentUser = Auth::user();
        $game = Game::findOrFail($game_id);
        $userPriceDetail = UserPriceDetail::where('user_id', $gamer_user_id)->where('game_id', $game_id)->first();

        if($game->price_type == "Match"){
            $totalPrice = $userPriceDetail->price * $request->total_match;
        } else {
            $totalPrice = $userPriceDetail->price;
        }

        if($currentUser->coin < $totalPrice){
            return redirect()->route('gameDetailPage', ['name' => $game->name])
                            ->withErrors(['coin' => 'You do not have enough coins to complete this order.']);
        }

        $user = User::findOrFail($currentUser->id);
        $user->update([
            'balance' => $user->balance - $totalPrice
        ]);

        Order::create([
            'game_id' => $game_id,
            'gamer_user_id' => $gamer_user_id,
            'customer_user_id' => $currentUser->id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_match' => $request->total_match
        ]);

        return redirect()->route('indexPage');
    }
}
