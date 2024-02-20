<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalDiagnosleListcontroller;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\WardBedController;
use App\Models\HospitalDiag;
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
//////////////////////admn//////////////////
Route::post('register-User',[AdminController::class,'register_User']);
Route::post('Dept-store',[DepartmentController::class,'Dept_store']);
Route::get('get-all-doctor',[DoctorController::class,'get_all_doctor']);
Route::post('login',[AdminController::class,'login']);
Route::get('show-one-doctor/{id}',[DoctorController::class,'show_one_doctor']);
Route::get('delete-doctor/{id}',[DoctorController::class,'delete_doctor']);
Route::get('delete-secrtery/{id}',[AdminController::class,'delete_secrtery']);
Route::get('get-all-secr',[AdminController::class,'get_all_secr']);
Route::get('show-one-secr/{id}',[AdminController::class,'show_one_secr']);
Route::get('show_one_dept/{id}',[DepartmentController::class,'show_one_dept']);
Route::get('dept-index',[DepartmentController::class,'dept_index']);
Route::post('update-doctor/{id}',[DoctorController::class,'update_doctor']);
Route::get('numbers',[AdminController::class,'numbers']);
Route::post('update-secr/{id}',[AdminController::class,'update_secr']);
Route::post('update-depa/{id}',[DepartmentController::class,'update_depa']);
Route::get('index_lab',[HospitalDiagnosleListcontroller::class,'index_lab']);
Route::post('store_lab',[HospitalDiagnosleListcontroller::class,'store_lab']);
Route::post('update_diagnosl/{id}',[HospitalDiagnosleListcontroller::class,'update_diagnosl']);
Route::get('get_all_specialest',[AdminController::class,'get_all_specialest']);
Route::get('show_one_lap/{id}',[HospitalDiagnosleListcontroller::class,'show_one_lap']);
Route::get('show_one_specialest/{id}',[AdminController::class,'show_one_specialest']);
//////////////////////secrtera///////////////
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
Route::post('add_admission',[WardBedController::class,'add_admission']);
Route::post('update_admission/{id}',[WardBedController::class,'update_admission']);
Route::get('get_admissions',[WardBedController::class,'get_admissions']);
/////////////////////////lap/////////////////////////////
Route::get('number_diagnols',[HospitalDiagnosleListcontroller::class,'number_diagnols']);
Route::get('show_test',[HospitalDiagnosleListcontroller::class,'show_test'])->middleware('auth:sanctum');
Route::post('ubdet_test/{id}',[HospitalDiagnosleListcontroller::class,'ubdet_test']);
Route::get('get_test/{id}',[HospitalDiagnosleListcontroller::class,'get_test']);
//////////////////////doctor//////////////////////////////
Route::get('nember_patient',[DoctorController::class,'nember_patient'])->middleware('auth:sanctum');
Route::post('store_test',[HospitalDiagnosleListcontroller::class,'store_test']);
Route::get('data_doctor/{id}',[DoctorController::class,'data_doctor']);
Route::post('ubdet_diagnosle/{id}',[DoctorController::class,'ubdet_diagnosle']);
Route::post('data/{id}',[DoctorController::class,'data']);
Route::get('get_all_hestory',[DoctorController::class,'get_all_hestory'])->middleware('auth:sanctum');
Route::get('get_diagnoss/{id}',[DoctorController::class,'get_diagnoss']);
Route::post('add_diagnoss',[DoctorController::class,'add_diagnoss']);
