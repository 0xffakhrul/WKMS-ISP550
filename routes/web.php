<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;

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
    return view('dashboard', [
        'employees' => Employee::all()
    ]);
});

Route::get('/employees', [EmployeeController::class, 'index']);

Route::get('/employees/create', [EmployeeController::class, 'create']);

//store
Route::post('/employees', [EmployeeController::class, 'store']);

//edit form
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit']);

//update
Route::put('/employees/{employee}', [EmployeeController::class, 'update']);




//biar
Route::get('/employees/{employee}', [EmployeeController::class, 'show']);
