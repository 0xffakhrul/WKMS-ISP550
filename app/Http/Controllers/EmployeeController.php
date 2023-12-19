<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //show all listings
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::all()
        ]);
    }

    //show single employee
    public function show(Employee $employee)
    {
        return view('employees.show', [
            'employee' => $employee
        ]);
    }

    //create form
    public function create()
    {
        return view('employees.create');
    }
}
