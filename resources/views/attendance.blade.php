@extends('layouts.app')

@section('title', 'Dashboard - Beep-Server')

@section('contents')
<body>
<div class="container-sm">
    <form method="post" action="/time-in">
        @csrf
        
        
          <label>Name:</label>
          <div class="input-group mb-3">
            <input type="text"id="name" class="form-control" name="name" aria-label="name" aria-describedby="basic-addon2" required>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Time In</button>
            </div>
          </div>
    </form>
</div>
    
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>Name</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Action</th>
        </tr>
        </thead>
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