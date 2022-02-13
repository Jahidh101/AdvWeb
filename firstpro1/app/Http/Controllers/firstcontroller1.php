<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstcontroller1 extends Controller
{
    public function login(){
        return view('login');
    }
}
