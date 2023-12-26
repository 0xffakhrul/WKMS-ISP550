@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')
    @php
        $heads = ['ID', 'Employee', 'Start Date', 'End Date', 'Type', 'Status', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

        // Retrieve data from the database using Eloquent
        $leaveRequests = \App\Models\LeaveRequest::all();

        // Build the data array for the datatable
        $data = [];
        foreach ($leaveRequests as $leaveRequest) {
            $employeeName = $leaveRequest->employee->name ?? 'N/A';
            $type = $leaveRequest->leave_type;
            $status = $leaveRequest->status;

            // Add a badge based on the status
            $statusBadge = match ($status) {
                'approved' => '<span class="badge badge-pill badge-success">Approved</span>',
                'rejected' => '<span class="badge badge-pill badge-danger">Rejected</span>',
                default => '<span class="badge badge-pill badge-secondary">Pending</span>',
            };

            $btnDetails = '<a href="/leave-requests/' . $leaveRequest->id . '/edit"><i class="fas fa-fw fa-eye"></i></a>';
            $btnDelete = '<a href=""><i class="fas fa-fw fa-trash text-danger"></i></a>';

            $rowData = [$leaveRequest->id, $employeeName, $leaveRequest->start_date, $leaveRequest->end_date, $type, $statusBadge, '<nobr>' . $btnDetails . $btnDelete . '</nobr>'];
            $data[] = $rowData;
        }

        $config = [
            'data' => $data,
            'order' => [[1, 'desc']],
            'columns' => [null, null, null, null, null, null, ['orderable' => false]],
            // 'searching' => true,
        ];
    @endphp


    <section class="container-fluid pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">Leave Requests</h1>
            <a href="/leave-requests/create" class="btn btn-primary">Add Leave Request</a>
        </div>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="card">
                        <div class="card-body">
                            <x-adminlte-datatable id="table2" :heads="$heads" hoverable>
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
