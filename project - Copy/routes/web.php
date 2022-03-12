<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//user type add edit
Route::get('/addUserType',[AdminController::class,'addUserType'])->name('admin.addUserType');
Route::post('/addUserType',[AdminController::class,'addUserTypeSubmit'])->name('admin.addUserType.submit');
Route::get('/UserType/edit',[AdminController::class,'UserTypeEdit'])->name('admin.UserType.edit');
Route::post('/UserType/edit',[AdminController::class,'UserTypeEditSubmit'])->name('admin.UserType.edit.submit');
Route::get('/getUserType/list',[AdminController::class,'userTypeList'])->name('admin.UserType.list');

//all_user add edit
Route::get('/addUser',[AdminController::class,'addUserForm'])->name('admin.addUser.form');
Route::post('/addUser',[RegisterController::class, 'register'])->name('admin.addUser');
Route::get('/user/info/{username}',[CommonController::class,'userInfo'])->name('user.personal.info');
Route::get('/UserProfile/edit',[CommonController::class,'userProfileEdit'])->name('user.profile.edit');
Route::post('/UserProfile/edit',[CommonController::class,'userProfileEditSubmit'])->name('user.profile.edit');
Route::get('/add/profilePicture',[CommonController::class,'addProfilePicture'])->name('add.profile.picture');
Route::post('/add/profilePicture',[CommonController::class,'addProfilePictureSubmit'])->name('add.profile.picture');

//login
Route::get('/login/user', [CommonController::class,'loginUser'])->name('loginUser');
Route::post('/login/user',[CommonController::class,'loginSubmit'])->name('loginUser');
Route::get('/login/history',[AdminController::class,'allLoginHistory'])->name('admin.login.history.all');
Route::get('/logout', [CommonController::class,'logout'])->name('logout');
Route::get('/forgot/password', [CommonController::class,'forgotPassword'])->name('forgot.password');
Route::post('/forgot/password', [CommonController::class,'forgotPasswordSubmit'])->name('forgot.password');
Route::get('/reset/password', [CommonController::class,'resetPassword'])->name('reset.password');
Route::post('/reset/password', [CommonController::class,'resetPasswordSubmit'])->name('reset.password');

//redirect aftter login
Route::get('/homepage',[AdminController::class,'adminHomepage'])->name('admin.homepage');
Route::get('/homepage/doctor',[DoctorController::class,'doctorHomepage'])->name('doctor.homepage');
Route::get('/homepage/patient',[PatientController::class,'patientHomepage'])->name('patient.homepage');

//patient
Route::get('/doctor/list',[PatientController::class,'doctorList'])->name('patient.doctorList');

//chat
Route::get('/chat',[CommonController::class,'chat'])->name('chat');

Auth::routes();

//email verify
Route::get('/verify', [RegisterController::class, 'verifyUser'])->name('verify.email');
Route::get('/register', [CommonController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
