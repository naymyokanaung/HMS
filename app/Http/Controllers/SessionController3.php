<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController3 extends Controller
{
    //
    public function index()
    {
        echo "Session Page3";
        dd(Session::get('status'));
    }
}
