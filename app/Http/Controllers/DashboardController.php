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
    $patientData = [];

    $patients = Patient::where('is_discharged', 0)->get();

    foreach ($patients as $patient) {
        $latestVitalSign = VitalSign::where('room', $patient->room)->latest()->first();

        if ($latestVitalSign) {
            $patientData[] = [
                'name' => $patient->name,
                'room' => $patient->room,
                'heart_rate' => $latestVitalSign->heart_rate,
                'respiratory_rate' => $latestVitalSign->respiratory_rate,
                'blood_pressure' => $latestVitalSign->blood_pressure,
                'temperature' => $latestVitalSign->temperature,
                'spo2' => $latestVitalSign->spo2,
                'pulse_rate' => $latestVitalSign->pulse_rate,
            ];
        }
    }

    return view('dashboard', compact('patientData')); // Update this line
    }

    
}
