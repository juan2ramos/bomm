<?php

namespace Bomm\Http\Controllers;

use Bomm\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController1 extends Controller
{

    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        return 'rerere';
    }
}
