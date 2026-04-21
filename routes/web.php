<?php

use App\Http\Controllers\AuthManualController;
use App\Http\Controllers\CategoryCodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicalCheckupsController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectEmployeeController;
use App\Http\Controllers\ProjectListController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');




    Route::get('employees/report', [EmployeeController::class, 'report_'])->name('employees.report');

    Route::resource('employees', EmployeeController::class)->middleware('permission:view employee|create employee|edit employee|delete employee');

    Route::resource('category', CategoryController::class)->middleware('permission:view category|create category|edit category|delete category');

    Route::resource('category_code', CategoryCodeController::class)->middleware('permission:view category_code|create category_code|edit category_code|delete category_code');

    Route::resource('project', ProjectListController::class);

    Route::resource('penawaran', PenawaranController::class)->middleware('permission:view offer|create offer|edit offer|delete offer');

    Route::resource('project_employee', ProjectEmployeeController::class);

    Route::resource('medical_checkups', MedicalCheckupsController::class)->middleware('permission:view medical checkup|create medical checkup|edit medical checkup|delete medical checkup');

    Route::resource('warehouse', WarehouseController::class)->middleware('permission:view warehouse|create warehouse|edit warehouse|delete warehouse');

    // Route::get('/warehouse/{id}/products', [StockMovementController::class, 'getProductsByWarehouse']);

    Route::resource('stock_movement', StockMovementController::class)->middleware('permission:view stock movement|create stock movement|edit stock movement|delete stock movement');

    Route::resource('stock', StockController::class)->middleware('permission:view stock|create stock|edit stock|delete stock');

    Route::resource('product', ProductController::class)->middleware('permission:view product|create product|edit product|delete product');

    Route::resource('permissions', PermissionController::class);//->middleware('permission:view permission|create permission|edit permission|delete permission');

    Route::resource('roles', RoleController::class);//->middleware('permission:view role|create role|edit role|delete role');

    Route::resource('users', UserController::class);//->middleware('permission:view user|create user|edit user|delete user');
});





// Route::get('medical_checkups/delete/{id}', [MedicalCheckupsController::class, 'deleteMedical'])
//     ->name('medical.delete');


//Route untuk login dan logout
Route::get('/login', [AuthManualController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthManualController::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [AuthManualController::class, 'logout'])->name('logout');
Route::post('/register', [AuthManualController::class, 'registerProses'])->name('registerProses');
