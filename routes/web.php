<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/students',[StudentController::class,'index']);
Route::post('/students',[StudentController::class,'store']);
Route::get('/showStudents',[StudentController::class,'show']);
Route::get('/edit_student/{id}',[StudentController::class,'edit']);
Route::put('/updateStudent/{id}',[StudentController::class, 'update']);
Route::delete('/delete_student/{id}',[StudentController::class, 'destroy']);

