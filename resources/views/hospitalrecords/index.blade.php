@extends('layouts.app')

@section('title', 'Hospital Records')

@section('contents')
    <h1>Hospital Records</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Date of Admit</th>
                <th>Date of Discharge</th>
                <th>Name</th>
                <th>Heart Rate</th>
                <th>Respiratory Rate</th>
                <th>Blood Pressure</th>
                <th>Temperature</th>
                <th>Spo2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hospitalRecords as $record)
                <tr>
                    <td>{{ $record->date_of_admit }}</td>
                    <td>{{ $record->date_for_discharged }}</td>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->heart_rate }}</td>
                    <td>{{ $record->respiratory }}</td>
                    <td>{{ $record->blood_pressure }}</td>
                    <td>{{ $record->temperature }}</td>
                    <td>{{ $record->spo2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
