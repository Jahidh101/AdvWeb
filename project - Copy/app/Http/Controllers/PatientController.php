<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\All_user;
use App\Models\Chat;


class PatientController extends Controller
{
    public function patientHomepage(){
        return view('Users.Patient.homepage');
    }

    public function doctorList(){
        $unreadChat = Chat::where('receiver',session()->get('username'))->where('is_read', 0)->distinct('sender')->pluck('sender');
        $readChat = Chat::where('receiver',session()->get('username'))->where('is_read', 1)->distinct('sender')->pluck('sender');
        //return $readChat->count();
        $info = All_user::where('user_types_id', 2)->where('is_verified', 1)->get();
        //return $info;
        return view('Users.Patient.doctorList')->with('infoAll', $info)->with('unreadChat', $unreadChat)->with('readChat', $readChat);
    }

   
}
