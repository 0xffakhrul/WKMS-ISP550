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

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
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

    @php
        $heads = ['ID', 'Name', 'Type', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

        // Retrieve data from the database using Eloquent
        $employees = \App\Models\Employee::all();

        // Build the data array for the datatable
        $data = [];
        foreach ($employees as $employee) {
            $btnDetails = '<a href="/employees/' . $employee->id . '"><i class="fas fa-fw fa-eye"></i></a>';
            $btnEdit = '<a href=""><i class="fas fa-fw fa-pencil-alt text-warning"></i></a>';
            $btnDelete = '<a href=""><i class="fas fa-fw fa-trash text-danger"></i></a>';

            $rowData = [$employee->id, $employee->name, $employee->type, '<nobr>' . $btnDetails . $btnEdit . $btnDelete . '</nobr>'];
            $data[] = $rowData;
        }

        $config = [
            'data' => $data,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
    @endphp

    <section class="container-fluid">
        <h1 class="fw-bold">Latest Employees</h1>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="card">
                        <div class="card-body">
                            <x-adminlte-datatable id="table1" :heads="$heads" hoverable>
                                @foreach ($config['data'] as $row)
                                    <tr>
                                        @foreach ($row as $cell)
                                            <td>{!! $cell !!}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </x-adminlte-datatable>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

@stop
