<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\Session\Session;
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

    //store employee
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|digits:10',
            'email' => 'required|email|max:255',
            'hire_date' => 'required',
            'type' => 'required',
        ]);

        Employee::create($formFields);

        return redirect('/')->with('message', 'Employee created successfully!');
    }

    //edit form
    public function edit(Employee $employee)
    {
        return view('employees.edit', ['employee' => $employee]);
    }

    //update employee
    public function update(Request $request, Employee $employee)
    {
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|digits:10',
            'email' => 'required|email|max:255',
            'hire_date' => 'required',
            'type' => 'required',
        ]);

        $employee->update($formFields);

        return redirect('/employees/' . $employee->id)->with('message', 'Employee updated successfully!');
    }
}
