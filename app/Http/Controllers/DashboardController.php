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

            
                foreach ($vitalSigns as $vitalSign) {
                    $roomData[] = [
                        'name' => $patient->name,
                        'room' => $patient->room,
                        'respiratory_rate' => $vitalSign->respiratory_rate,
                        'blood_pressure' => $vitalSign->blood_pressure,
                        'temperature' => $vitalSign->temperature,
                        'spo2' => $vitalSign->spo2,
                        'pulse_rate' => $vitalSign->pulse_rate,
                    ];
            }
                   
            
        }

        return view('dashboard', compact('roomData'));



    }

    
}
