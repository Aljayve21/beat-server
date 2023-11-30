@extends('layouts.app')
  
@section('title', 'Admission')

  
@section('contents')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <h1 class="mb-0">Admit Patient</h1>
    <hr />
    <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col">
                <input type="text" name="age" class="form-control" placeholder="Age">
            </div>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="gender">Gender :</label>
            <select name="gender" class="gender" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <input type="text" class="form-control flatpickr" name="Birthday" placeholder="Select a date">

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
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="room">Room Choice: </label>
            <select name="room" class="room" id="room" required>
                @for ($i = 1; $i <= 14; $i++)
                    <option value="{{ $i }}">Room {{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="row">
            <div class="mx-5">
                <button type="submit" class="btn btn-primary my-3 mx-2">Submit</button>
            </div>
        </div>
    </form>

    

@endsection
