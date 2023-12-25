<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VitalSign;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function insertVitalSigns(Request $request)
    {
        // Validate request data if necessary
        Log::info('Received data:', $request->all());
        $heartRate = $request->input('heart_rate');
        $respiratoryRate = $request->input('respiratory_rate');
        $bloodPressure = $request->input('blood_pressure');
        $temperature = $request->input('temperature');
        $spo2 = $request->input('spo2');
        $pulseRate = $request->input('pulse_rate');

        // Insert data into the database using the VitalSignController
        app('App\Http\Controllers\VitalSignController')->store([
            'heart_rate' => $heartRate,
            'respiratory_rate' => $respiratoryRate,
            'blood_pressure' => $bloodPressure,
            'temperature' => $temperature,
            'spo2' => $spo2,
            'pulse_rate' => $pulseRate,
        ]);

        return response()->json(['message' => 'Data inserted successfully']);
    }
}
