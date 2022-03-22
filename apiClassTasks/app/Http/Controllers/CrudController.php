<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;

class CrudController extends Controller
{
    //
    public function getStudents(){
        $students = Student::all();
        return response()->json($students);
    }

    public function getStudent(Request $req){
        $student = Student::where('id', $req->id)->first();
        return response()->json($student);
    }

    public function addStudent(Request $req){
        $st = new Student();
        $st->name = $req->name;
        $st->email = $req->email;
        $st->phone = $req->phone;
        $st->dept_id = $req->dept_id;
        if($st->save()){
            return response()->json(["msg"=> "Successfully added"]);
        }
        return response()->json(["msg"=> "Adding Failed"]);
    }   

    public function editStudent(Request $req){
        $st= new Student();
        $st->exists = true;
        $st->id = $req->id;
        $st->name = $req->name;
        $st->email = $req->email;
        $st->phone = $req->phone;
        $st->dept_id = $req->dept_id;
        if($st->save()){
            return response()->json(["msg"=> "Successfully edited"]);
        }
        return response()->json(["msg"=> "Editing Failed"]);
    }

    public function deleteStudent(Request $req){
        $student = Student::where('id', $req->id)->delete();
        if($student){
            return response()->json(["msg"=> "Successfully deleted"]);
        }
        return response()->json(["msg"=> "Delete failed"]);
    }

    public function getDepartments(){
        $departments = Department::all();
        return response()->json($departments);
    }

    public function getDepartment(Request $req){
        $department = Department::where('id', $req->id)->first();
        return response()->json($department);
    }

    public function addDepartment(Request $req){
        $dept = new Department();
        $dept->name = $req->name;
        if($dept->save()){
            return response()->json(["msg"=> "Dept Successfully added"]);
        }
        return response()->json(["msg"=> "Dept Adding Failed"]);
    }   

    public function editDepartment(Request $req){
        $st= new Department();
        $st->exists = true;
        $st->id = $req->id;
        $st->name = $req->name;
        if($st->save()){
            return response()->json(["msg"=> "Dept Successfully edited"]);
        }
        return response()->json(["msg"=> "Dept Editing Failed"]);
    }

    public function deleteDepartment(Request $req){
        $department = Department::where('id', $req->id)->delete();
        if($department){
            return response()->json(["msg"=> " Dept Successfully deleted"]);
        }
        return response()->json(["msg"=> " Dept Delete failed"]);
    }

    public function deptStudentDetails(Request $req){
        $department = Department::where('id', $req->id)->first();
        $details = [
            'id' => $department->id,
            'name' => $department->name,
            'students' => $department->students,
        ];
        return response()->json($details);
    }

    public function deptsStudentsDetails(Request $req){
        $departments = Department::all();
        $details =array();
        foreach($departments as $department){
            $detail = [
                'id' => $department->id,
                'name' => $department->name,
                'students' => $department->students,
            ];
            $details[] = array($detail);
        }
        return response()->json($details);
    }
}
