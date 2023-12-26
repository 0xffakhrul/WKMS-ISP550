@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
    <div class="container-fluid pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/employees') }}">Employees List</a></li>
                <li class="breadcrumb-item" aria-current="page">Create</li>
            </ol>
        </nav>
        <h1 class="fw-bold">New Employee</h1>

        <form method="POST" action="/employees">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <x-adminlte-input name="name" type="text" placeholder="Enter Name" label="Name"
                                value="{{ old('name') }}" required />
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-input name="phone_number" type="tel" placeholder="Enter Phone No."
                                label="Phone Number" value="{{ old('phone_number') }}" required />
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-input name="email" type="email" placeholder="Enter Email" label="Email"
                                value="{{ old('email') }}" required />
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
                                required>
                                <x-slot name="appendSlot" value="{{ old('hire_date') }}">
                                    <div class="input-group-text bg-dark justify-content-center">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-date-range>
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-select name="type" label="Employment Type" required>
                                <option value="part_time" {{ old('type') == 'part_time' ? 'selected' : '' }}>
                                    Part-Time</option>
                                <option value="full_time" {{ old('type') == 'full_time' ? 'selected' : '' }}>
                                    Full-Time</option>
                            </x-adminlte-select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@stop
