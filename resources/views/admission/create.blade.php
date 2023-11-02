@extends('layouts.app')
  


@section('contents')
<div class="container">
    <h2>Admission Form</h2>
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admission.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <!-- Add other form fields here -->

        <div class="form-group">
            <label for="room_choice">Room Choice</label>
            <select class="form-control" id="room_choice" name="room_choice">
                <option value="" selected>Select a Room</option>
                @for ($i = 1; $i <= 14; $i++)
                    @if (isset($roomAvailability[$i]) && $roomAvailability[$i] > 0)
                        <option value="{{ $i }}">Room {{ $i }}</option>
                    @else
                        <option value="{{ $i }}" disabled>Room {{ $i }} (Full)</option>
                    @endif
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
