<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\VitalSign;
use Illuminate\Http\Request;

class VitalSignController extends Controller
{
    public function getPatientVitalSign($room)
    {
        
        $vitalSigns = VitalSign::whereHas('patient', function ($query) use ($room) {
            $query->where('room', $room);
        })->first();
    

        return response()->json($vitalSigns);
    }

    
}
