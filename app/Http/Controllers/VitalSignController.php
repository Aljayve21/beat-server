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
            $requestData = $request->all();

            
            $validationRules = [
                'patient_id' => 'required|exists:patients,id',
                'heart_rate' => 'required|numeric',
                'respiratory_rate' => 'required|numeric',
                'blood_pressure' => 'required|string',
                'temperature' => 'required|numeric',
                'spo2' => 'required|numeric',
                'pulse_rate' => 'required|numeric',
            ];

            $request->validate($validationRules);

            
            $vitalSign = new VitalSign([
                'patient_id' => $requestData['patient_id'],
                'heart_rate' => $requestData['heart_rate'],
                'respiratory_rate' => $requestData['respiratory_rate'],
                'blood_pressure' => $requestData['blood_pressure'],
                'temperature' => $requestData['temperature'],
                'spo2' => $requestData['spo2'],
                'pulse_rate' => $requestData['pulse_rate'],
            ]);

            
            $vitalSign->save();

            
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Vital sign added successfully.']);
            } else {
                return redirect()->route('patients')->with('success', 'Vital sign added successfully.');
            }
        } catch (\Exception $e) {
            Log::error($e);

           
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Error adding vital sign.'], 500);
            } else {
                return redirect()->route('patients')->with('error', 'Error adding vital sign.');
            }
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

    