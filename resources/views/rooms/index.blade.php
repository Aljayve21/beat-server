@extends('layouts.app') <!-- Assuming you have a layout file, adjust this as needed -->

@section('title', 'Rooms')

@section('contents')
<h1>Create Room</h1>
<a href="{{ route('rooms.create') }}" class="btn btn-success">Create Room</a>

    <div class="container mt-4">
        <h1>Rooms</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Availability</th>
                    <th>Emergency Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->available ? 'Available' : 'Occupied' }}</td>
                        {{-- <td>{{ $room->emergency_status ? 'Emergency' : 'Normal' }}</td> --}}
                        <td>
                        <span style="color: {{ $room->emergency_color }}">{{ $room->emergency_status ? 'Emergency' : 'Normal' }}</span>
                        </td>
                        <td>
                            <!-- Add your actions here, e.g., buttons to update availability, etc. -->
                            <button class="btn btn-primary" onclick="updateAvailability({{ $room->id }})">
                                Update Availability
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No rooms found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function updateAvailability(roomId) {
            // Perform AJAX request to update room availability
            $.ajax({
                url: `/update-room-availability/${roomId}`,
                type: 'GET',
                success: function(response) {
                    // Handle success, e.g., update the UI
                    console.log(response);
                },
                error: function(error) {
                    // Handle error, e.g., show an alert
                    console.error('Error updating room availability:', error);
                }
            });
        }
    </script>
@endsection