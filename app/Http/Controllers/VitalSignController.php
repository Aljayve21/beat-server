<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\VitalSign;
use Illuminate\Http\Request;

class VitalSignController extends Controller
{
    public function index()
    {
        $vitalSigns = VitalSign::all();
        return view("vital-signs.index", compact("vitalSigns"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'heart_rate' => 'required',
            'respiratory_rate' => 'required',
            'blood_pressure' => 'required',
            'temperature' => 'required',
            'spo2' => 'required',
            'pulse_rate' => 'required',
        ]);

        $vitalSign = new VitalSign($validatedData);
        $vitalSign->save();

        return redirect()->route('patients.index')->with('success', 'Vital sign data added successfully.');
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

    
}
