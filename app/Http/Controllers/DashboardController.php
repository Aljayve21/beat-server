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
        $patientData = [];
        $vitalSignsData = [];

        $patients = Patient::all();
        $vitalSigns = VitalSign::all();

    foreach ($patients as $patient) {
        $roomNumber = $patient->room;
        $patientData[$roomNumber] = $patient;
    }

    // Create an associative array for vital signs data based on patient ID
    foreach ($vitalSigns as $vitalSign) {
        $roomNumber = $vitalSign->patient->room;
        $vitalSignsData[$roomNumber] = $vitalSign;
    }

    return view('dashboard')->with(compact('patientData', 'vitalSignsData'));
    }
}
    

    

