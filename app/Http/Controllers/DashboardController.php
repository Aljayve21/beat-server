<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admission;
use App\Models\Patient;
use App\Models\VitalSign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\VitalSignController;
class DashboardController extends Controller
{
    
    
    public function showDashboard()
    {
        
        $roomData = [];

        $patients = Patient::where('is_discharged', 0)->get();

        foreach ($patients as $patient) {
            
            $vitalSigns = VitalSign::where('patient_id', $patient->id)->get();

            if($vitalSigns->isNotEmpty()) {
                foreach($vitalSigns as $vitalSign) {
                $roomData [] = [
                'name' => $patient->name,
                'room' => $patient->room,
                'heart_rate' => $vitalSign->last()->heart_rate,
                'respiratory_rate' => $vitalSign->last()->respiratory_rate,
                'blood_pressure' => $vitalSign->last()->blood_pressure,
                'temperature' => $vitalSign->last()->temperature,
                'spo2' => $vitalSign->last()->spo2,
                'pulse_rate' => $vitalSign->last()->pulse_rate,
                ];
            }
        }   
     }

     return view('dashboard', compact('roomData'));

    }

    
}
