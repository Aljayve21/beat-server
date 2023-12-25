<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HospitalRecord;
use App\Models\Patient;
use App\Models\VitalSign;
use Illuminate\Support\Facades\Log;

class HospitalRecordController extends Controller
{
    public function index()
    {
    $hospitalRecords = HospitalRecord::all();
    return view('hospitalrecords.index', compact('hospitalRecords'));
    }



//     public function store(Request $request)
// {
//     $data = $request->all();
//     $roomNumber = $data['room_number'];
    
//     $patient = Patient::where('room_number', $roomNumber)->first();

//     if (!$patient) {
//         return redirect()->route('dashboard')->with('error', 'Patient not found for room number ' . $roomNumber);
//     }

//     $hospitalRecordData = $this->prepareHospitalRecordData($data);
//     $this->storeHospitalRecord($hospitalRecordData);

//     return $this->redirectToHospitalRecords();
// }

// protected function storeHospitalRecord(array $data)
// {
//     $hospitalRecord = new HospitalRecord($data);
//     $hospitalRecord->save();
// }

public function store(Request $request)
    {
        try {
            

            $validatedData = $request->validate([
                'date_of_admit' => $request->input('date_of_admit'),
                'date_for_discharged' => $request->input('date_for_discharged'),
                'heart_rate' => $request->input('heart_rate'),
                'respiratory' => $request->input('respiratory'),
                'blood_pressure' => $request->input('blood_pressure'),
                'temperature' => $request->input('temperature'),
                'spo2' => $request->input('spo2'),
                'time' => $request->input('time'),
                'name' => $request->input('name'),
                
            ]);

            $hospitalRecord = new HospitalRecord($validatedData);
            $hospitalRecord->save();

            return response()->json(['message' => 'Hospital record stored successfully']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json(['error' => 'Error storing hospital record. See logs for details.'], 500);
        }
    }


protected function redirectToHospitalRecords()
{
    return redirect()->route('hospital-records')->with('success', 'Patient added successfully');
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

    
    public function dischargePatient(Request $request)
{
    
    $request->validate([
        'room_id' => 'required|integer',
        'patient_id' => 'required|integer',
    ]);

    
    $patient = Patient::find($request->input('patient_id'));

   
    $hospitalRecord = new HospitalRecord([
        'date_of_admit' => $patient->date_of_admit,
        'date_for_discharged' => now(),
        'name' => $patient->name,
        'pulse_rate' => $patient->vitalSign->pulse_rate,
        'respiratory_rate' => $patient->vitalSign->respiratory_rate,
        'blood_pressure' => $patient->vitalSign->blood_pressure,
        'temperature' => $patient->vitalSign->temperature,
        'spo2' => $patient->vitalSign->spo2,
    ]);

    $hospitalRecord->save();

    
    $patient->update(['is_discharged' => true]);

    return response()->json(['message' => 'Patient discharged successfully']);
}

    

    protected function getPatientDetails($roomId)
{
    $patient = Patient::where('room', $roomId)->first();
    $latestVitalSign = $this->getLatestVitalSign($patient);

    
    if ($patient && $latestVitalSign) {
        return [
            'name' => $patient->name,
            'heart_rate' => $latestVitalSign->heart_rate,
            'respiratory_rate' => $latestVitalSign->respiratory_rate,
            'blood_pressure' => $latestVitalSign->blood_pressure,
            'temperature' => $latestVitalSign->temperature,
            'spo2' => $latestVitalSign->spo2,
            
        ];
    }

    
    return null;
}



    // HospitalRecordController.php


    


}
