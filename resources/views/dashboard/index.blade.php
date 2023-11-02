{{-- @extends('layouts.app')

@section('contents')
    <h1>Admission Form</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="/admission">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <!-- Add similar fields for age, gender, birthday, address, contact, and guardian -->

        <div>
            <label for="room_choice">Choose a Room:</label>
            <select name="room_choice" id="room_choice" required>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection --}}

@extends('layouts.app')

@section('contents')
    <h1>Admission Records</h1>

    @if ($request->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Contact</th>
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
                        <td>{{ $admission->room_choice ?? 'N/A' }}</td> <!-- Assuming you have a 'room' relationship in the Admission model -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No admission records available.</p>
    @endif
@endsection
