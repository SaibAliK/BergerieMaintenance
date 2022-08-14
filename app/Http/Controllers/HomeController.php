<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
    	return redirect()->route('login');
    	//return view('welcome');
    }
    public function adminLogin()
    {
        return view("auth.admin_login");
    }
}
