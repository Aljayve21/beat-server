@extends('layouts.app')

@section('title', 'Dashboard - Beep-Server')

@section('contents')
    <form method="post" action="/time-in">
        @csrf
        <label>Name:</label>
        <input type="text" name="name">
        <button type="submit">Time In</button>
    </form>
    
    <table>
        <tr>
            <th>Name</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Action</th>
        </tr>
        @foreach($time as $at)
        <tr>
            <td>{{ $at->name }}</td>
            <td>{{ $at->time_in }}</td>
            <td>{{ $at->time_out }}</td>
            <td>
                @if(!$at->time_out)
                    <form method="post" action="/time-out/{{ $at->id }}">
                        @csrf
                        <button type="submit">Time Out</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</body>


@endsection