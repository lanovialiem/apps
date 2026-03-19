<?php

use App\Http\Controllers\AuthManualController;
use App\Http\Controllers\CategoryCodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicalCheckupsController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\ProjectEmployeeController;
use App\Http\Controllers\ProjectListController;
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

Route::get('employees/report', [EmployeeController::class, 'report_'])->name('employees.report');

Route::resource('employees', EmployeeController::class);

Route::resource('category', CategoryController::class);

Route::resource('category_code', CategoryCodeController::class);

Route::resource('project', ProjectListController::class);

Route::resource('penawaran', PenawaranController::class);

Route::resource('project_employee', ProjectEmployeeController::class);

Route::resource('medical_checkups', MedicalCheckupsController::class);

// Route::get('medical_checkups/delete/{id}', [MedicalCheckupsController::class, 'deleteMedical'])
//     ->name('medical.delete');


//Route untuk login dan logout
Route::get('/login', [AuthManualController::class, 'index'])->name('login');
Route::post('/login', [AuthManualController::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [AuthManualController::class, 'logout'])->name('logout');
