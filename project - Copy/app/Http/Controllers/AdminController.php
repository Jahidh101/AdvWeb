<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_type;
use App\Models\All_user;
use App\Models\Login_history;

class AdminController extends Controller
{
    
    public function addUserType(){
        return view('Users.Admin.addUserType');
    }

    public function addUserTypeSubmit(Request $req){
        $req->validate(
            [
                'userType'=>'required|regex:/^[a-z]+$/',
            ],
            [
                'userType.regex'=>'Usertype can only contain lower case alphabets ',
            ]
        );
        $uTypes = new User_type();
        $uTypes->type = $req->userType;
        $uTypes->save();
        return redirect()->route('admin.UserType.list');
    }

    public function userTypeList(){
        $list = User_type::all();
        return view('Users.Admin.userTypeList')->with('types', $list);
    }

    public function UserTypeEdit(Request $req){
        $list = User_type::where('id',$req->id)->first();
        return view('Users.Admin.editUserType')->with('types', $list);
    }

    public function UserTypeEditSubmit(Request $req){
        $req->validate(
            [
                'userType'=>'required|unique:user_types,type|regex:/^[a-z]+$/',
            ],
            [
                'userType.regex'=>'Usertype can only contain lower case alphabets',
            ]
        );
        $uTypes = new User_type();
        $uTypes->exists = true;
        $uTypes->id = $req->id;
        $uTypes->type = $req->userType;
        $uTypes->save();
        return redirect()->route('admin.UserType.list');
    }

    public function addUserForm(){
        $list = User_type::all();
        return view('All_user.register')->with('types', $list);
    }

    public function allLoginHistory(){
        $list = Login_history::all();
        return view('Users.Admin.allLoginHistory')->with('list', $list);
    }

    public function adminHomepage(){
        $doctorsId = User_type::where('type','doctor')->first();
        $patientId = User_type::where('type','patient')->first();
        $countUsers = All_user::where('is_verified',1)->get()->count();
        $countDoctors = All_user::where('is_verified',1)->where('user_types_id', $doctorsId->id)->count();
        $countPatients = All_user::where('is_verified',1)->where('user_types_id', $patientId->id)->count();

        $data = [
            'allVerifiedUsers' => $countUsers,
            'verifiedDoctors' => $countDoctors,
            'verifiedPatients' => $countPatients,

        ];
        return view('Users.Admin.homepage')->with('data', $data);
    }
}
