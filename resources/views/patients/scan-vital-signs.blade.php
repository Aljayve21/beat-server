@extends('layouts.app')

@section('contents')

    <h1>Scan Vital Sign</h1>

    <form action="{{ route('patients.store-vital-signs') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="patient_id">Select Patient: </label>
            <select name="patient_id" id="patient_id" class="form-control">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }} - Room {{ $patient->room }}</option>
                @endforeach
            </select>
        </div>

        <input type="text" name="heart_rate" class="form-control" placeholder="Heart Rate" required>
        <input type="text" name="respiratory_rate" class="form-control" placeholder="Respiratory Rate" required>
        <input type="text" name="blood_pressure" class="form-control" placeholder="Blood Pressure" required>
        <input type="text" name="temperature" class="form-control" placeholder="Temperature" required>
        <input type="text" name="spo2" class="form-control" placeholder="Spo2" required>
        <input type="text" name="pulse_rate" class="form-control" placeholder="Pulse Rate" required>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection