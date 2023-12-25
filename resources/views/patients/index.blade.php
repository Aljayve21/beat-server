@extends('layouts.app')


@section('contents')
<hr />
<div class="d-flex align-items-center justify-content-between">
    {{-- <h1 class="mb-0">Current Admit List</h1>
    <a href="{{ route('patients.scan') }}" class="btn btn-primary">Scan Vital Sign</a> --}}
</div>
<hr />

@if(Session::has('success'))
<div class="alert alert-success" roles="alert">
    {{ Session::get('success') }}
</div>
@endif
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
                @foreach ($patient as $rs)
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
                    {{-- <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form method="POST" action="{{ route('patients.discharge', $rs->id) }}">
                                @csrf
                                <button type="submit">Discharge</button>
                            </form>                            
                    </td> --}}
                </tr>
                @endforeach
        </tbody>
</table> 

    

@endsection