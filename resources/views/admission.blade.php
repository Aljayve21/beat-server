@extends('layouts.app')
  
@section('title', 'Admit Patient')
  
@section('contents')
    <h1 class="mb-0">Admin Patient</h1>
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <hr />
    <form action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col">
                <input type="text" name="age" class="form-control" placeholder="Age">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="gender" class="form-control" placeholder="Gender">
            </div>
            <div class="col">
                <input type="text" name="Birthday" class="form-control" placeholder="Birthday">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea type="text" name="Address" class="form-control" placeholder="Address"></textarea>
            </div>
            <div class="col">
                <input type="text" name="Contact" class="form-control" placeholder="Contact No">
            </div>
            <div class="col">
                <input type="text" name="Guardian" class="form-control" placeholder="Guardian">
        </div>

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
        {{-- <div class="col">
            <textarea class="form-control" name="blood_pressure" placeholder="Blood Pressure"></textarea>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="temperature" class="form-control" placeholder="Temperature">
            </div>
        </div> --}}
 
        <div class="row">
            <div class="mx-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection