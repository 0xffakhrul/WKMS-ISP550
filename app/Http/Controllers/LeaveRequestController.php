<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    //show all listings
    public function index()
    {
        return view('admin.leave-requests.index', [
            'leave-request' => LeaveRequest::all()
        ]);
    }

    //show single leave
    public function show(LeaveRequest $leaveRequest)
    {
        return view('admin.leave-requests.show', [
            'leaveRequest' => $leaveRequest,
        ]);
    }

    //create form
    public function create()
    {
        $employees = Employee::all();
        return view('admin.leave-requests.create', [
            'employees' => $employees,
        ]);
    }

    //store leave request
    public function store(Request $request)
    {
        // Validate the form data
        $formFields = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'leave_type' => 'required|in:sick,annual,other',
            'description' => 'required|string',
        ]);

        // Create a new LeaveRequest instance and store it in the database
        LeaveRequest::create($formFields);

        // Redirect to the leave requests list or show page
        return redirect('/leave-requests')->with('success', 'Leave request created successfully!');
    }

    public function edit(LeaveRequest $leaveRequest)
    {
        return view('admin.leave-requests.edit', ['leaveRequest' => $leaveRequest]); // Change the variable name here
    }

    //update leave requests (status)
    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        // Validate the form data
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        // Update only the status
        $leaveRequest->update([
            'status' => $request->input('status'),
        ]);

        // Redirect to the leave requests list or show page
        return redirect('/leave-requests');
    }
}
