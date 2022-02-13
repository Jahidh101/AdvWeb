<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{
    public function list(){
        $students = array();
        for($i=0; $i<11; $i++){
            $student = array (
                "id" => $i+1,
                "name" => "student". ($i+1),
                "dept" => "cse"
            );
            $student = (object)$student;
            $students[] = $student;
        }
        return view('student.list')->with('students', $students);
    }

    public function create(){
        return view('student.create');
    }

    public function getStudent(){
        return view('student.getStudent');
    }
}
