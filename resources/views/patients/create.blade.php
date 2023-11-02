@extends('layouts.app')
  
@section('title', 'Admission')
  
@section('contents')
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
            <select class="gender" id="gender" required>
              {{-- <option selected></option> --}}
              <option value="1">Male</option>
              <option value="2">Female</option>
              <option value="3">Other</option>
            </select>
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
        {{-- <div class="col">
            <textarea class="form-control" name="blood_pressure" placeholder="Blood Pressure"></textarea>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="temperature" class="form-control" placeholder="Temperature">
            </div>
        </div> --}}

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Room Choice: </label>
            <select class="room" id="room" required>
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