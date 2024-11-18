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
    public function index()
    {
        $orders = Order::all();
        return view('order', compact('orders'));
    }

    public function create(StoreOrderRequest $request, $gameId, $gamerUserId)
    {
        $request->validated();

        $currentUser = Auth::user();
        $game = Game::findOrFail($gameId);
        $userPriceDetail = UserPriceDetail::where('user_id', $gamerUserId)->where('game_id', $gameId)->first();

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
            'coin' => $user->coin - $totalPrice
        ]);

        Order::create([
            'game_id' => $gameId,
            'gamer_user_id' => $gamerUserId,
            'customer_user_id' => $currentUser->id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_match' => $request->total_match,
            'status' => 'Not finished'
        ]);

        return back();
    }

    public function update($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'Finished'
        ]);

        return back();
    }
}
