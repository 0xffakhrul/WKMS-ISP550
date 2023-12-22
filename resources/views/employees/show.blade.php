@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
    <section class="container-fluid pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/employees') }}">Employees List</a></li>
                <li class="breadcrumb-item" aria-current="page">{{ $employee['name'] }}</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold pt-1">View {{ $employee['name'] }}</h2>
            <div class="d-flex">
                <a href="/employees/{{ $employee->id }}/edit" class="btn btn-success mr-1">Edit</a>
                <a href="/employees/{{ $employee->id }}/edit" class="btn btn-danger">Delete</a>
            </div>
        </div>

        <form method="POST" action="/employees">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <x-adminlte-input name="name" type="text" placeholder="Enter Name" label="Name"
                                value="{{ $employee->name }}" disabled />
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-input name="phone_number" type="tel" placeholder="Enter Phone No."
                                label="Phone Number" value="{{ $employee->phone_number }}" disabled />
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-input name="email" type="email" placeholder="Enter Email" label="Email"
                                value="{{ $employee->email }}" disabled />
                        </div>
                        <div class="col-sm-6">
                            @php
                                $config = [
                                    'singleDatePicker' => true,
                                    'showDropdowns' => true,
                                    'startDate' => 'js:moment().format("YYYY-MM-DD")', // Set the start date
                                    'locale' => ['format' => 'YYYY-MM-DD'], // Set the format to display
                                ];
                            @endphp
                            <x-adminlte-date-range name="hire_date" label="Date" igroup-size="md" :config="$config"
                                value="{{ $employee->hire_date }}" disabled>
                                <x-slot name="appendSlot">
                                    <div class="input-group-text bg-dark justify-content-center">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-date-range>
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-input name="type" type="text" placeholder="Enter Employment Type"
                                label="Employment Type" value="{{ $employee->type }}" disabled />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@stop
