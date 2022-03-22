<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//students
Route::get("/get/students",[CrudController::class,'getStudents']);
Route::get("/get/students/{id}",[CrudController::class,'getStudent']);
Route::post("/add/student",[CrudController::class,'addStudent']);
Route::post("/edit/student/{id}",[CrudController::class,'editStudent']);
Route::get("/delete/student/{id}",[CrudController::class,'deleteStudent']);

//departments
Route::get("/get/departments",[CrudController::class,'getDepartments']);
Route::get("/get/departments/{id}",[CrudController::class,'getDepartment']);
Route::post("/add/department",[CrudController::class,'addDepartment']);
Route::post("/edit/department/{id}",[CrudController::class,'editDepartment']);
Route::get("/delete/department/{id}",[CrudController::class,'deleteDepartment']);

//student&dept
Route::get("/department/student/details/{id}",[CrudController::class,'deptStudentDetails']);
Route::get("/departments/students/details",[CrudController::class,'deptsStudentsDetails']);
