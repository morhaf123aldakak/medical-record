<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\WardBedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register-User',[AdminController::class,'register_User']);
Route::post('Dept-store',[DepartmentController::class,'Dept_store']);
Route::get('get-all-doctor',[DoctorController::class,'get_all_doctor']);
Route::post('login',[AdminController::class,'login']);
Route::get('show-one-doctor/{id}',[DoctorController::class,'show_one_doctor']);
Route::get('delete-doctor/{id}',[DoctorController::class,'delete_doctor']);
Route::get('delete-secrtery/{id}',[AdminController::class,'delete_secrtery']);
Route::get('get-all-secr',[AdminController::class,'get_all_secr']);
Route::get('show-one-secr/{id}',[AdminController::class,'show_one_secr']);
Route::get('dept-index',[DepartmentController::class,'dept_index']);
Route::post('update-doctor/{id}',[DoctorController::class,'update_doctor']);
Route::get('numbers',[AdminController::class,'numbers']);
Route::post('update-secr/{id}',[AdminController::class,'update_secr']);
Route::post('update-depa/{id}',[DepartmentController::class,'update_depa']);

//////////////////////patient///////////////
Route::post('update_patient/{id}',[PatientController::class,'update_patient']);
Route::post('delete_patient/{id}',[PatientController::class,'delete_patient']);
Route::get('show_one_patient/{id}',[PatientController::class,'show_one_patient']);
Route::post('add_patient',[PatientController::class,'add_patient']);
Route::get('get_all_patient',[PatientController::class,'get_all_patient']);
Route::post('ward_store',[WardBedController::class,'ward_store']);
Route::get('ward_index',[WardBedController::class,'ward_index']);
Route::get('bed_index',[WardBedController::class,'bed_index']);
Route::post('update_ward/{id}',[WardBedController::class,'update_ward']);
Route::post('update_bed/{id}',[WardBedController::class,'update_bed']);
Route::get('delete_bed/{id}',[WardBedController::class,'delete_bed']);
Route::get('numbers_patient_ward_admn',[WardBedController::class,'numbers_patient_ward_admn']);
