<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveRequestController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\LeaveRequest;

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
    return view('/admin/dashboard', [
        'employees' => Employee::all()
    ]);
});

Route::get('/login', function () {
    return view('login');
});

//list employees
Route::get('/employees', [EmployeeController::class, 'index']);

//list leave requests
Route::get('/leave-requests', [LeaveRequestController::class, 'index']);

//create form employee
Route::get('/employees/create', [EmployeeController::class, 'create']);

//create form leave requests
Route::get('/leave-requests/create', [LeaveRequestController::class, 'create']);

//store employee
Route::post('/employees', [EmployeeController::class, 'store']);

//store leave requests
Route::post('/leave-requests', [LeaveRequestController::class, 'store']);

//edit form employee
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit']);

//edit form employee
Route::get('/leave-requests/{leaveRequest}/edit', [LeaveRequestController::class, 'edit']);

//update employee
Route::put('/employees/{employee}', [EmployeeController::class, 'update']);

//update employee
Route::put('/leave-requests/{leaveRequest}', [LeaveRequestController::class, 'update']);


//delete employee
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']);




//biar (single employee)
Route::get('/employees/{employee}', [EmployeeController::class, 'show']);

//biar (single leave req)
Route::get('/leave-requests/{leaveRequest}', [LeaveRequestController::class, 'show']);
