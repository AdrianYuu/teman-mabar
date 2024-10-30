<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function index()
    {
        $users = User::all();

        return view('admin/user/index', compact('users'));
    }
}
