<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admission;
use App\Models\Patient;
use App\Models\VitalSign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    
    
    public function showDashboard()
    {
        $roomData = [];

        $patients = Patient::all();

        foreach ($patients as $patient) {
            $roomNumber = $patient->room;

            $vitalSigns = VitalSign::where('patient_id', $patient->id)->get();

            $roomData[$roomNumber] = [
                'patient' => $patient,
                'vitalSigns' => $patient->vitalSigns,
            ];
        }

        return view('dashboard', compact('roomData'));
    }



    

    
}
