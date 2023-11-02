@extends('layouts.app')
  
@section('title', 'Edit')

@section('contents')
<div class="container">
    <h2>Current Admissions</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Guardian</th>
                <th>Room Choice</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admissions as $admission)
                <tr>
                    <td>{{ $admission->name }}</td>
                    <td>{{ $admission->age }}</td>
                    <td>{{ $admission->gender }}</td>
                    <td>{{ $admission->birthday }}</td>
                    <td>{{ $admission->address }}</td>
                    <td>{{ $admission->contact_number }}</td>
                    <td>{{ $admission->guardian }}</td>
                    <td>{{ $admission->room_choice ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection