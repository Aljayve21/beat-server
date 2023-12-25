@extends('layouts.app')

@section('title', 'Create Room')

@section('contents')
    <h1>Create Room</h1>

    <form action="{{ route('rooms.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="room_name" class="form-label">Room Name</label>
            <input type="text" class="form-control" id="room_name" name="room_name" required>
        </div>
        <div class="mb-3">
            <label for="available" class="form-label">Available</label>
            <select name="available" id="available" class="form-control" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="emergency_status" class="form-label">Emergency Status</label>
            <select name="emergency_status" id="emergency_status" class="form-control" required>
                <option value="1">Emergency</option>
                <option value="0">Normal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Room</button>
    </form>
@endsection