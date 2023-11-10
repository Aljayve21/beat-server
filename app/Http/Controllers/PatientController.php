<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\VitalSign;

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
    
           if( $existingPatientInRoom )
           {
            return redirect()->back()->withErrors(['room' => 'Room '. $data['room'] . ' is already occupied']);
           }
    
           $data['is_discharged'] = $request->has('is_discharged');
    
    
           $patient = Patient::create($data);
    
           return redirect()->route('patients', $patient->id)->with('success','Patient added Successfully');
    }

    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
        
    }

    public function hospitalRecords()
    {
        $dischargedPatients = Patient::where('is_discharged', true)->get();

        return view('hospitalrecords', compact('dischargedPatients'));
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
        ]);

        $vitalSign = VitalSign::create([
            'patient_id' => $request->input('patient_id'),
        ]);

        return redirect()->route('patients')->with('sucess','Vital Signs added Sucessfully');
        
    }


    
}