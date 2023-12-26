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
                <li class="breadcrumb-item" aria-current="page">Edit</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold pt-1">Edit {{ $leaveRequest['id'] }}</h2>
            <a href="/leave-requests/{{ $leaveRequest->id }}/edit" class="btn btn-danger">Delete</a>
        </div>

        <form method="POST" action="/leave-requests/{{ $leaveRequest->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
            @if ($leaveRequest->status != 'approved' && $leaveRequest->status != 'rejected')
                <button type="submit" name="status" value="approved" class="btn btn-success">Approve</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal">Reject</button>
            @endif
        </form>

        <x-adminlte-modal id="rejectModal" title="Reject Leave Request">
            <!-- Add a textarea for the rejection reason -->
            <x-adminlte-textarea name="rejection_reason" label="Rejection Reason" placeholder="Enter rejection reason" />
            <x-slot name="footerSlot">
                <!-- Button to submit the rejection form -->
                <button type="submit" name="status" value="rejected" class="btn btn-danger">Reject</button>
                <!-- Button to close the modal -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </x-slot>
        </x-adminlte-modal>

    </section>
@stop
