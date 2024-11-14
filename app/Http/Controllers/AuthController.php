<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated = collect($validated)->only(['name', 'email', 'password'])->toArray();

        User::create($validated);
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect(route('indexPage'));
        }

        return redirect(route('registerPage'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect(route('indexPage'));
        }

        return redirect(route('loginPage'))->withErrors(['invalidCredentials' => "Email atau kata sandi yang Anda masukkan salah!!"]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
