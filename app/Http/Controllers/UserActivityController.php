<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopUpRequest;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserActivityController extends Controller
{
    public function manageCoinPage()
    {
        $payments = Payment::all();
        return view('manage-coin', compact('payments'));
    }

    public function topUpStore(StoreTopUpRequest $request)
    {
        $request->validated();

        UserActivity::create([
            'user_id' => Auth::user()->id,
            'payment_id' => $request->payment_id,
            'amount' => $request->coin_amount,
            'type' => 'Top-up'
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'coin' => $user->coin + $request->coin_amount
        ]);

        return back();
    }
}
