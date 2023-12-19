@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
    <section class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">Employees</h1>
            <a href="/employees/create" class="btn btn-primary">Add Employee</a>
        </div>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <x-employee-table :employee="$employee" />
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>

@stop
