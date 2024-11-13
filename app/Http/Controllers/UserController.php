<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPriceDetail;
use App\Services\FirebaseStorageService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $input = $request->only([
            'name',
            'gender',
            'date_of_birth',
            'biography'
        ]);
        
        $input['date_of_birth'] = str_replace('/', '-', $input['date_of_birth']);
        $date = DateTime::createFromFormat('m-d-Y', $input['date_of_birth']);
        if ($date) {
            $input['date_of_birth'] = $date->format('Y-m-d');
        }

        User::findOrFail(Auth::user()->id)->update($input);

        return back();
    }
    
    public function updateGamePrice(Request $request)
    {
        UserPriceDetail::where('user_id', 'LIKE', Auth::user()->id)
            ->where('game_id', 'LIKE', $request->id)
            ->update([
                'price' => $request->price
            ]);

        return back();
    }

    public function upload(Request $request)
    {
        if($request->hasFile('profile_picture')){
            $file = $request->file('profile_picture');
            $fileUrl = FirebaseStorageService::uploadImage($file, Auth::user()->id, 'profile');
        }

        User::findOrFail(Auth::user()->id)->update([
            'profile_picture_url' => $fileUrl
        ]);

        return back();
    }

    public function index()
    {
        $users = User::all();

        return view('admin/user/index', compact('users'));
    }
}
