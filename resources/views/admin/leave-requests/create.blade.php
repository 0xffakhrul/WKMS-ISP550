@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
    <div class="container-fluid pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/leave-requests') }}">Leave Requests List</a></li>
                <li class="breadcrumb-item" aria-current="page">Create</li>
            </ol>
        </nav>
        <h1 class="fw-bold">New Leave Request</h1>
        <form method="POST" action="/leave-requests">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <x-adminlte-select name="employee_id" label="Select Employee">
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}"
                                        {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                            </x-adminlte-select>
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
                            <x-adminlte-date-range name="start_date" label="Start Date" igroup-size="md" :config="$config">
                                <x-slot name="appendSlot" value="{{ old('start_date') }}">
                                    <div class="input-group-text bg-dark justify-content-center">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-date-range>
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
                            <x-adminlte-date-range name="end_date" label="End Date" igroup-size="md" :config="$config">
                                <x-slot name="appendSlot" value="{{ old('end_date') }}">
                                    <div class="input-group-text bg-dark justify-content-center">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-date-range>
                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-select name="leave_type" label="Leave Type">
                                <option value="sick" {{ old('leave_type') == 'sick' ? 'selected' : '' }}>
                                    Sick</option>
                                <option value="annual" {{ old('leave_type') == 'annual' ? 'selected' : '' }}>
                                    Annual</option>
                                <option value="other" {{ old('leave_type') == 'other' ? 'selected' : '' }}>
                                    Other</option>
                            </x-adminlte-select>
                        </div>
                        <div class="col-sm-12">
                            <x-adminlte-textarea name="description" label="Leave Description"
                                placeholder="Enter leave description">{{ old('description') }}</x-adminlte-textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@stop
