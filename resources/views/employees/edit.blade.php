@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
    <section class="container-fluid pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/employees') }}">Employees List</a></li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ url('/employees/' . $employee->id) }}">{{ $employee->name }}</a>
                </li>
                <li class="breadcrumb-item">Edit</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold pt-1">Edit {{ $employee['name'] }}</h2>
            <a href="/employees/{{ $employee->id }}/edit" class="btn btn-danger">Delete</a>
        </div>

        <form method="POST" action="/employees/{{ $employee->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <x-adminlte-input name="name" type="text" placeholder="Enter Name" label="Name"
                                value="{{ $employee->name }}" />
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-input name="phone_number" type="tel" placeholder="Enter Phone No."
                                label="Phone Number" value="{{ $employee->phone_number }}" />
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-input name="email" type="email" placeholder="Enter Email" label="Email"
                                value="{{ $employee->email }}" />
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
                            <x-adminlte-date-range name="hire_date" label="Date" igroup-size="md" :config="$config">
                                <x-slot name="appendSlot" value="{{ $employee->hire_date }}">
                                    <div class="input-group-text bg-dark justify-content-center">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-date-range>
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-select name="type" label="Employment Type">
                                <option value="part_time" {{ $employee->type == 'part_time' ? 'selected' : '' }}>
                                    Part-Time
                                </option>
                                <option value="full_time" {{ $employee->type == 'full_time' ? 'selected' : '' }}>
                                    Full-Time
                                </option>
                            </x-adminlte-select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </section>
@stop
