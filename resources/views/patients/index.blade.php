@extends('layouts.app')

@section('title', 'Current Admit')

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

<div class="container">
    {{-- <h1>Room {{ $room }}</h1> --}}

{{-- <h2>Search Customer Total Data : <span id="total_records"></span></h2> --}}

 {{-- <div class="row">
    <h2>Search Customer Total Data : <span id="total_records"></span></h2>
    <div class="col-12">
        <div class="form-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
        </div> --}}
        
        
 <table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Guardian</th>
            <th>Room</th>
        </thead>
        <tbody>
            @if($patient->count() > 0)
                @foreach ($patient as $rs)
                @if($rs->room == $room)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $rs-> name }}</td>
                    <td class="align-middle">{{ $rs-> age }}</td>
                    <td class="align-middle">{{ $rs-> gender }}</td>
                    <td class="align-middle">{{ $rs-> Birthday }}</td>
                    <td class="align-middle">{{ $rs-> Address }}</td>
                    <td class="align-middle">{{ $rs-> Contact }}</td>
                    <td class="align-middle">{{ $rs-> Guardian }}</td>
                    <td class="align-middle">{{ $rs-> room }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form method="POST" action="{{ route('patients.discharge', $rs->id) }}">
                                @csrf
                                <button type="submit">Discharge</button>
                            </form>                            
                    </td>
                </tr>
                @endif
                @endforeach
                @endif
        </tbody>
</table> 

    </div>

@endsection