<!-- resources/views/hospitalrecords.blade.php -->

@extends('layouts.app')

@section('title', 'Hospital Records')

@section('contents')
    <h1>Hospital Records</h1>

    @if(count($hospitalRecords) > 0)
        <ul>
            @foreach($hospitalRecords as $record)
                <li>{{ $record->name }} - {{ $record->room }} - {{ $record->other_field }}</li>
                <!-- Adjust the fields based on your actual HospitalRecord model -->
            @endforeach
        </ul>
    @else
        <p>No hospital records found.</p>
    @endif
@endsection
