<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\All_user;

class PatientController extends Controller
{
    public function patientHomepage(){
        return view('Users.Patient.homepage');
    }

    public function doctorList(){
        $info = All_user::where('user_types_id', 2)->where('is_verified', 1)->get();
        //return $info;
        return view('Users.Patient.doctorList')->with('infoAll', $info);
    }
}
