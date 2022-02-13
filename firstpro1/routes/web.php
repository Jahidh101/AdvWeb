<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\firstcontroller1;
use App\Http\Controllers\studentController;

/*
|------------------------------ --------------------------------------------
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

Route::get('/login', [firstcontroller1::class, 'login']);

Route::get('/create', [studentController::class, 'create']);
Route::get('/list', [studentController::class, 'list']);
Route::get('/getStudent', [studentController::class, 'getStudent']);

