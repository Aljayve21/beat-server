<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HospitalRecord;

class HospitalRecordController extends Controller
{
    public function createHospitalRecord(Request $request)
    {
        $data = $request->all();

        $hospitalRecord = new HospitalRecord([
            'date_of_admit' => $data['date_of_admit'],
            'date_of_discharged' => $data['date_for_discharged'],
            'name' => $data['name'],
            'heart_rate'=> $data['heart_rate'],
            'respiratory_rate' => $data['respiratory_rate'],
            'blood_pressure'=> $data['blood_pressure'],
            'temperature'=> $data['temperature'],
            'spo2'=> $data['spo2'],
        ]);


        $hospitalRecord->save();

        return redirect()-> route('dashboard')->with('success','Patient discharged and Hospital record created. ');


    }
}
