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
}
