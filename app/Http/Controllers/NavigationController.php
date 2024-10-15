<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function indexPage() 
    {
        return view('index');
    }

    public function loginPage()
    {
        return view('login');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function adminIndexPage()
    {
        return view('admin/index');
    }
}
