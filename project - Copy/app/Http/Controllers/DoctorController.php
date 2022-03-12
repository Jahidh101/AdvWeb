<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctorHomepage(){
        return view('Users.Doctor.homepage');
    }
}
