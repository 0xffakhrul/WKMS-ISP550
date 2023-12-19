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
        <h2 class="fw-bold pt-1">View {{ $employee['name'] }}</h2>

        {{-- Display Router Name --}}
    </section>
@stop
