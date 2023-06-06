@extends('layouts.app')
  
@section('title', 'Edit Product')
  
@section('contents')
    <h1 class="mb-0">Edit Patient Information</h1>
    <hr />
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $patient->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Age</label>
                <input type="text" name="age" class="form-control" placeholder="Age" value="{{ $patient->age }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Gender</label>
                <input type="text" name="gender" class="form-control" placeholder="Gender" value="{{ $patient->gender }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Condition</label>
                <textarea class="form-control" name="condition" placeholder="Condition" >{{ $patient->condition }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Heart Rate</label>
                <input type="text" name="gender" class="form-control" placeholder="Gender" value="{{ $patient->gender }}" >
                <label class="form-label">Respiratory Rate</label>
                <textarea class="form-control" name="respiratory_pressure" placeholder="Respiratory Rate" >{{ $patient->respiratory_pressure }}</textarea>
            </div>
            <div class="col mb-3">
                <label class="form-label">Blood Pressure</label>
                <textarea class="form-control" name="blood_pressure" placeholder="Blood Pressure" >{{ $patient->blood_pressure }}</textarea>
                <label class="form-label">Temperature</label>
                <input type="text" name="temperature" class="form-control" placeholder="Temperature" value="{{ $patient->temperature }}" >
                <label class="form-label">Bed No</label>
                <input type="text" name="bed_no" class="form-control" placeholder="Temperature" value="{{ $patient->bed_no }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning mx-3">Update</button>
            </div>
        </div>
    </form>
@endsection