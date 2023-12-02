<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HospitalRecord;
use App\Models\Patient;

class HospitalRecordController extends Controller
{
    public function store(Request $request)
{
    $data = $request->all();
    $roomNumber = $data['room_number'];
    
    $patient = Patient::where('room_number', $roomNumber)->first();

    if (!$patient) {
        return redirect()->route('dashboard')->with('error', 'Patient not found for room number ' . $roomNumber);
    }

    $hospitalRecordData = $this->prepareHospitalRecordData($data);
    $this->storeHospitalRecord($hospitalRecordData);

    return $this->redirectToHospitalRecords();
}

protected function storeHospitalRecord(array $data)
{
    $hospitalRecord = new HospitalRecord($data);
    $hospitalRecord->save();
}

public function createHospitalRecord(Request $request)
{
    $data = $request->all();
    $roomNumber = $data['room_number'];

    $patient = Patient::where('room_number', $roomNumber)->first();

    if (!$patient) {
        return redirect()->route('dashboard')->with('error', 'Patient not found for room number ' . $roomNumber);
    }

    $hospitalRecordData = $this->prepareHospitalRecordData($data);
    $this->storeHospitalRecord($hospitalRecordData);

    return redirect()->route('dashboard')->with('success', 'Patient discharged and Hospital record created.');
}

protected function redirectToHospitalRecords()
{
    return redirect()->route('hospital_records')->with('success', 'Patient added successfully');
}

protected function prepareHospitalRecordData(array $data): array
{
    return [
        'date_of_admit' => $data['date_of_admit'],
        'date_of_discharged' => $data['date_for_discharged'],
        'name' => $data['name'],
        'heart_rate' => $data['heart_rate'],
        'respiratory_rate' => $data['respiratory_rate'],
        'blood_pressure' => $data['blood_pressure'],
        'temperature' => $data['temperature'],
        'spo2' => $data['spo2'],
    ];
}

public function showHospitalRecords()
    {
        $hospitalRecords = HospitalRecord::getAllRecords();

        return view('hospitalrecords', compact('hospitalRecords'));
    }



    // HospitalRecordController.php


    


}
