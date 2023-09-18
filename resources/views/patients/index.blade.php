@extends('layouts.app')

@section('title', 'Patient Data Information')

@section('contents')

{{-- <div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Patient Information</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Info</a>
</div> --}}
<hr />
@if(Session::has('success'))
<div class="alert alert-success" roles="alert">
    {{ Session::get('success') }}
</div>
@endif

{{-- <h2>Search Customer Total Data : <span id="total_records"></span></h2> --}}

{{-- <div class="row">
    <h2>Search Customer Total Data : <span id="total_records"></span></h2>
    <div class="col-12">
        <div class="form-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
        </div> --}}
        
        
{{-- <table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Condition</th>
            <th>Heart Rate</th>
            <th>Respiratory Rate</th>
            <th>Blood Pressure</th>
            <th>Temperature</th>
            <th>Action</th>
        </thead>
        <tbody>+
            @if($patient->count() > 0)
                @foreach($patient as $rs)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $rs-> name }}</td>
                    <td class="align-middle">{{ $rs-> age }}</td>
                    <td class="align-middle">{{ $rs-> gender }}</td>
                    <td class="align-middle">{{ $rs-> condition }}</td>
                    <td class="align-middle">{{ $rs-> heart_rate }}</td>
                    <td class="align-middle">{{ $rs-> respiratory_pressure }}</td>
                    <td class="align-middle">{{ $rs-> blood_pressure }}</td>
                    <td class="align-middle">{{ $rs-> temperature }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('patients.show', $rs->id )}}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('patients.edit', $rs->id )}}" type="button" class="btn btn-warning">Edit</a>
                            <form action="" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-danger m-0">Delete</button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="9">Data not Found</td>
                </tr>
                @endif
        </tbody>
</table> --}}

@endsection