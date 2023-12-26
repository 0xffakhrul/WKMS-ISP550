@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
    <section class="container-fluid pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/leave-requests') }}">Leave Requests List</a></li>
                <li class="breadcrumb-item" aria-current="page">{{ $leaveRequest['id'] }}</li>
            </ol>

        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">View Leave Request</h1>
            <div class="d-flex">
                <a href="/leave-requests/{{ $leaveRequest->id }}/edit" class="btn btn-success mr-1">Edit</a>
                <form method="POST" action="/leave-requests/{{ $leaveRequest->id }}">
                    @csrf
                    @method('DELETE')
                    <button href="/leave-requests/{{ $leaveRequest->id }}/edit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>

        <form method="POST" action="/employees">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <x-adminlte-input name="name" type="text" placeholder="Enter Name" label="Name"
                                value="{{ $employeeName = $leaveRequest->employee->name ?? 'N/A' }}" disabled />
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-input name="phone_number" type="tel" placeholder="Start Date"
                                label="Phone Number" value="{{ $leaveRequest->start_date }}" disabled />
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-input name="email" type="email" placeholder="Enter Email" label="Email"
                                value="{{ $leaveRequest->end_date }}" disabled />
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-input name="type" type="text" placeholder="Enter Employment Type"
                                label="Leave Type" value="{{ $leaveRequest->leave_type }}" disabled />
                        </div>
                        <div class="col-sm-12">
                            <x-adminlte-input name="description" label="Leave Description"
                                placeholder="Enter leave description" value="{{ $leaveRequest->description }}" disabled />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@stop
