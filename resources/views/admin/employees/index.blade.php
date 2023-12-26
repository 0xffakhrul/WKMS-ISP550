@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
    @php
        $heads = ['ID', 'Name', 'Email', 'Phone No.', 'Type', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

        // Retrieve data from the database using Eloquent
        $employees = \App\Models\Employee::all();

        // Build the data array for the datatable
        $data = [];
        foreach ($employees as $employee) {
            $type = $employee->type == 'full_time' ? 'Full-Time' : 'Part-Time';
            $btnDetails = '<a href="/employees/' . $employee->id . '"><i class="fas fa-fw fa-eye"></i></a>';
            $btnEdit = '<a href="/employees/' . $employee->id . '/edit"><i class="fas fa-fw fa-pencil-alt text-warning"></i></a>';
            $btnDelete = '<a href=""><i class="fas fa-fw fa-trash text-danger"></i></a>';

            $rowData = [$employee->id, $employee->name, $employee->email, $employee->phone_number, $type, '<nobr>' . $btnDetails . $btnEdit . $btnDelete . '</nobr>'];
            $data[] = $rowData;
        }

        $config = [
            'data' => $data,
            'order' => [[1, 'desc']],
            'columns' => [null, null, null, ['orderable' => false]],
            // 'searching' => true,
        ];
    @endphp

    <section class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">Employees</h1>
            <a href="/employees/create" class="btn btn-primary">Add Employee</a>
        </div>
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
