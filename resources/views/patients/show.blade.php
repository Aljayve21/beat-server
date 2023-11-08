@extends('layouts.app')
  
@section('title', 'Show Product')
  
@section('contents')
    <h1 class="mb-0">Patient Information</h1>
    <hr />
    <div class="row">
        {{-- <div class="col mb-3">
            <label class="form-label">ID</label>
            <input type="text" name="id" class="form-control" placeholder="Bed NO." value="{{ $patients->id }}" readonly>
        </div> --}}
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $patient->name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Age</label>
            <input type="text" name="age" class="form-control" placeholder="age" value="{{ $patient->age }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Gender</label>
            <textarea class="form-control" name="gender" placeholder="Gender" value="{{ $patient->gender }}" readonly></textarea>
        </div>
        <div class="col mb-3">
            <label class="form-label">Birthday</label>
            <textarea class="form-control" name="Birthday" placeholder="Birthday" value="{{ $patient->Birthday }}" readonly></textarea>
        </div>
        <div class="col mb-3">
            <label class="form-label">Address</label>
            <textarea class="form-control" name="Address" placeholder="Address" value="{{ $patient->Address }}" readonly></textarea>
        </div>
        <div class="col mb-3">
            <label class="form-label">Contact</label>
            <textarea class="form-control" name="Contact" placeholder="Contact" value="{{ $patient->Contact }}" readonly></textarea>
        </div>
        <div class="col mb-3">
            <label class="form-label">Guardian</label>
            <textarea class="form-control" name="Guardian" placeholder="Guardian" value="{{ $patient->Guardian }}" readonly></textarea>
        </div>
        <div class="col mb-3">
            <label class="form-label">Room :</label>
            <textarea class="form-control" name="room" placeholder="Room" value="{{ $patient->room }}" readonly></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Condition</label>
            <input type="text" name="condition" class="form-control" placeholder="Condition" value="" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Heart Rate</label>
            <textarea class="form-control" name="heart_rate" placeholder="Heart Rate" readonly></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Respiratory Rate</label>
            <input type="text" name="resperatory_pressure" class="form-control" placeholder="Respiratory Rate" value="" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Blood Pressure</label>
            <textarea class="form-control" name="blood_pressure" placeholder="Blood Pressure" readonly></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Temperature</label>
            <input type="text" name="temperature" class="form-control" placeholder="Temperature" value="" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Bed Room No</label>
            <input type="text" name="bed_no" class="form-control" placeholder="Bed Room No" value="" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="" readonly>
        </div>
    </div>
@endsection