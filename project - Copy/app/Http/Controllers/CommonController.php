<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_type;
use App\Models\All_user;
use App\Models\Login_history;

class CommonController extends Controller
{
    public function login(){
        return view('All_user.login');
    }

    public function register(){
        $list = User_type::where('type', 'patient')->first();
        return view('All_user.register')->with('types', $list);
    }

    public function loginUser(){
        return view('All_user.login');
    }
    

    public function logout(){
        session()->flush();
        return redirect()->route('loginUser');
    }

    public function loginSubmit(Request $req){
        $req->validate(
            [
                'username'=>'required|exists:all_users,username',
                'password'=>'required',
            ],
            [
                'username.required'=>'please provide a username',
                'username.exists'=>'username does not exists',

            ]
        );
        $user = All_user::where('username', $req->username)->where('password', md5($req->password))->first();
        if ($user){
            $dateNow = date('Y-m-d H:i:s');
            $entry = new Login_history();
            $entry->username = $req->username;
            $entry->login_time = $dateNow;
            //$entry->save();

            if($user->is_verified == 0){
                return redirect()->back()->with(session()->flash('alert-danger', 'Username is not verified.'));
            }

            Session()->put('username', $user->username);
            Session()->put('userType', $user->user_types->type);
            session()->flash('alert-success', 'Welcome '.$user->username);

            if((session()->get('userType')) == 'admin'){

                return redirect()->route('admin.homepage');
            }
            if((session()->get('userType')) == 'doctor'){

                return "doctor login";
            }
            if((session()->get('userType')) == 'patient'){

                return "patient login";
            }
            if((session()->get('userType')) == 'seller'){

                return "seller login";
            }
            if((session()->get('userType')) == 'delivaryMan'){

                return "delivaryMan login";
            }
            

            //return $allUser->user_types->type;
            return $dateNow;

        }
        else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Username and password did not match.'));
        }
    }

    public function userInfo(Request $req){
        $info = All_user::where('username', $req->username)->first();
        return view('All_user.userInfo')->with('info', $info);
    }
}
