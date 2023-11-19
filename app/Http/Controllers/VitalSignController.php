<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\VitalSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VitalSignController extends Controller
{
    public function index()
    {
        $vitalSigns = VitalSign::all();
        return view("vital_signs.index", compact("vitalSigns"));
    }

    public function store(Request $request)
    {
        try {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'heart_rate' => 'required|numeric',
            'respiratory_rate' => 'required|numeric',
            'blood_pressure' => 'required|string',
            'temperature' => 'required|numeric',
            'spo2' => 'required|numeric',
            'pulse_rate' => 'required|numeric',
            
        ]);
        $vitalSign = new VitalSign([
            'patient_id' => $request->input('patient_id'),
            'heart_rate' => $request->input('heart_rate'),
            'respiratory_rate' => $request->input('respiratory_rate'),
            'blood_pressure' => $request->input('blood_pressure'),
            'temperature' => $request->input('temperature'),
            'spo2' => $request->input('spo2'),
            'pulse_rate' => $request->input('pulse_rate'),
        ]);

        
        $vitalSign->save();
        
       
        

        
        return redirect()->route('patients')->with('success', 'Vital sign added successfully.');
    } catch (\Exception $e) {
        Log::error($e);

        return redirect()->route('patient')->with('error', 'Error adding vital Sign');
    }

}

    public function scanVitalSigns()
    {
        $patients = Patient::all();

        return view('vital-signs.scan', compact('patients'));
    }

    public function scan()
    {
        $patient = Patient::where('is_discharged', 0)->get();

        return view('vital-signs.scan', compact('patient'));
    }

    public function show(VitalSign $vitalSign)
    {
        return view('vital_signs.show', compact('vitalSign'));
    }

    

    
}
