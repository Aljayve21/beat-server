<!-- resources/views/hospitalrecords.blade.php -->

@extends('layouts.app')

@section('title', 'Hospital Records')

@section('contents')
    <h1>Hospital Records</h1>

    <ul>
        @forelse ($hospitalRecords as $record)
            <li>
                {{-- Display record details here --}}
                Date of Admit: {{ $record->date_of_admit }}
                Date of Discharge: {{ $record->date_for_discharged }}
                Name: {{ $record->name }}
                Heart Rate: {{ $record->heart_rate }}
                Respiratory Rate: {{ $record->respiratory }}
                Blood Pressure: {{ $record->blood_pressure }}
                Temperature: {{ $record->temperature }}
                Spo2: {{ $record->spo2 }}
            </li>
        @empty
            <p>No hospital records found.</p>
        @endforelse
    </ul>
@endsection
