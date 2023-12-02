<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\VitalSign;
use App\Models\HospitalRecord;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patient = Patient::orderBy('created_at', 'DESC')->get();

        return view('patients.index', compact('patient'));

       
    }
    public function create()
    {
        return view('patients.create');
    }
    
    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string',
        'age' => 'required|integer',
        'gender'=> 'required|string',
        'Birthday'=> 'required|date',
        'Address'=> 'required|string',
        'Contact'=> 'required|string',
        'Guardian'=> 'required|string',
        'room'=> 'required|integer',
        'is_discharged'=> 'boolean',
    ]);

    
    $existingPatientInRoom = Patient::where('room', $data['room'])->first();

    if ($existingPatientInRoom) {
        return redirect()->back()->withErrors(['room' => 'Room ' . $data['room'] . ' is already occupied']);
    }

    $data['is_discharged'] = $request->has('is_discharged');

    try {
        
        $patient = Patient::create($data);

        
        if (!$patient) {
            throw new \Exception('Failed to create patient');
        }
    } catch (\Exception $e) {
        
        dd($e->getMessage());
    }

    return redirect()->route('patients.index', $patient->id)->with('success', 'Patient added successfully');
}



    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        $vitalSigns = $patient->vitalSigns; 

        return view('patients.show', compact('patient', 'vitalSigns'));
    }

    public function hospitalRecords()
    {
        // $dischargedPatients = Patient::where('is_discharged', true)->get();
        

        // return view('hospitalrecords', compact('dischargedPatients'));
        $hospitalRecords = HospitalRecord::all();

        return view('hospitalrecords', compact('hospitalRecords'));
    }

    public function vitalSigns()
    {
        return $this->hasMany(VitalSign::class, 'room', 'room');
    }

    public function scanVitalSigns()
    {
        $patients = Patient::where('is_discharged', 0)->get();

        return view('patients.scan-vital-signs', compact('patients'));
    }

    public function storeVitalSigns(Request $request)
    {
    $request->validate([
        'patient_id' => 'required|exists:patients,id',
        'heart_rate' => 'required|numeric',
        'respiratory_rate' => 'required|numeric',
        'blood_pressure' => 'required|string',
        'temperature' => 'required|numeric',
        'spo2' => 'required|numeric',
        'pulse_rate' => 'required|numeric',
    ]);

    

    try {
        $patient = Patient::findOrFail($request->input('patient_id'));

        $vitalSign = VitalSign::create([
            'patient_id' => $patient->id,
            'heart_rate' => $request->input('heart_rate'),
            'respiratory_rate' => $request->input('respiratory_rate'),
            'blood_pressure' => $request->input('blood_pressure'),
            'temperature' => $request->input('temperature'),
            'spo2' => $request->input('spo2'),
            'pulse_rate' => $request->input('pulse_rate'),
        ]);

        // Fetch the updated vital signs for the patient
        $vitalSigns = VitalSign::where('room', $patient->room)->get();

        return redirect()->route('patients.scan-vital-signs')->with('success', 'Vital signs added successfully.')->with(compact('vitalSigns', 'patient'));
    } catch (\Exception $e) {
        Log::error($e);

        return redirect()->route('patients.scan-vital-signs')->with('error', 'Error adding vital sign.');
    }
    }

    public function fetchPatientDetails($roomId)
{
    
    dd("Debugging fetchPatientDetails", $roomId);

    $patient = Patient::where('room_id', $roomId)->first();

    if (!$patient) {
        return response()->json(['error' => 'Patient not found'], 404);
    }

    $data = [
        'patientName' => $patient->name,
        'respiratoryRate' => $patient->respiratory_rate,
        'temperature' => $patient->temperature,
        'pulseRate' => $patient->pulse_rate,
        'date_of_admit' => $patient->date_of_admit,
        'date_for_discharged' => $patient->date_for_discharged,
        'heart_rate' => $patient->heart_rate,
        'respiratory' => $patient->respiratory,
        'blood_pressure' => $patient->blood_pressure,
        'spo2' => $patient->spo2,
        'date' => $patient->date,
        'time' => $patient->time,
        'name' => $patient->name,
    ];

    return response()->json($data);
}

    public function getRooms()
    {
        $rooms = [];
        for ($i = 1; $i <= 14; $i++) {
            $patientData = Patient::where('room_number', $i)->first();
            $rooms[] = [
                'room_number' => $i,
                'patient_data' => $patientData,
            ];
        }

        return view('dashboard', compact('rooms'));
    }


    


    
}