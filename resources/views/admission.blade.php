@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
    <h1 class="mb-0">Add Product</h1>
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
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="gender" class="form-control" placeholder="Gender">
            </div>
            <div class="col">
                <input type="text" name="condition" class="form-control" placeholder="Condition">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="heart_rate" class="form-control" placeholder="Heart Rate">
            </div>
            <div class="col">
                <input type="text" name="resperatory_pressure" class="form-control" placeholder="Respiratory Pressure">
            </div>
            <div class="col">
                <input type="text" name="oxygen_level" class="form-control" placeholder="Oxygen Level">
        </div>
        <div class="col">
            <textarea class="form-control" name="blood_pressure" placeholder="Blood Pressure"></textarea>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="temperature" class="form-control" placeholder="Temperature">
            </div>
        </div>
 
        <div class="row">
            <div class="mx-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection