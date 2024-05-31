<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionController2;
use App\Http\Controllers\SessionController3;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/department', DepartmentController::class);
Route::resource('/doctor', DoctorController::class);
Route::resource('/patient', PatientController::class);
Route::resource('/appointment', AppointmentController::class);
Route::post('appointment/approve/{id}', [ApproveController::class, 'approve']);

Route::get('/session', [SessionController::class, 'index']);
Route::get('/nextsession', [SessionController2::class, 'index'])->name('nextsession');
Route::get('/nextsession2', [SessionController3::class, 'index'])->name('nextsession2');
