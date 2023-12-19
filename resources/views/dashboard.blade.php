@extends('adminlte::page')


@push('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush


@section('css')
    <link rel="stylesheet" href="../css/admin_custom.css">
@stop

@section('content')
    <section class="container-fluid pt-3">
        <h1 class="fw-bold">Dashboard</h1>
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ \App\Models\Employee::count() }}</h3>
                        <p>Total Employees</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid">
        <h1 class="fw-bold">Latest Employees</h1>
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
