<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\VitalSign;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Models\HospitalRecord;



class RoomController extends Controller
{
    public function view()
    {
        return view('views.dashboard');
    }

    public function showRooms()
    {
        $rooms = Room::all();

        $occupiedRooms = Patient::where('is_discharged', false)
            ->pluck('room');

        $processedRooms = $rooms->map(function ($room) use ($occupiedRooms) {
            $room->occupied = $occupiedRooms->contains($room->id);
            $room->emergency_status_color = $room->occupied ? 'red' : 'green';
            return $room;
        });

        return view('rooms.index', compact('processedRooms'));
    }
    

    public function updateRoomStatus(Request $request, $roomId)
    {
        $room = Room::findOrFail($roomId);

        $room->emergency_status = $request->input('emergency_status');
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room status updated successfully');
    }

    public function index()
    {
    $rooms = Room::all();

    foreach ($rooms as $room) {
        $patientInRoom = Patient::where('room', $room->id)->first();

        $room->occupancy_status = $patientInRoom ? 'Occupied' : 'Available';
        $room->emergency_color = $room->available ? 'green' : 'red';
        $room->patient = $patientInRoom; 
    }


    return view('rooms.index', compact('rooms'));
    }


    public function updateRoomColorAndReturnButtonClass($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['error' => 'Room not found'], 404);
        }

        $room->emergency_color = ($room->status == 'Occupied') ? 'danger' : 'success';
        $room->save();

        $buttonClass = 'btn btn-' . $room->emergency_color . ' mx-4';

        return response()->json(['button_class' => $buttonClass]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'available' => 'required|boolean', 
            'emergency_status' => 'required|boolean', 
        ]);

       

        Room::create([
            'name' => $request->input('room_name'),
            'available' => !$request->input('available'),
            'emergency_status' => $request->input('emergency_status'),
            'status' => 'Available', 
        ]);

        return redirect()->route('rooms.index')->with('success', "Room Create Successully");
    }

    public function truncateRoomsTable()
    {
    
    DB::table('patients')->delete();

    
    DB::table('rooms')->truncate();

    return redirect()->route('rooms.index')->with('success', 'Rooms table truncated successfully');
    }

    public function create()
    {
        return view('rooms.create');
    }
    

    

    public function getPatientDetails(Request $request)
{
    $roomId = $request->input('room_id');

    try {
        $patient = Patient::where('room', $roomId)->firstOrFail();
        $vitals = VitalSign::where('patient_id', $patient->id)->latest()->first();

        if ($patient->is_discharged) {
            if ($vitals) {
                $hospitalRecord = new HospitalRecord([
                    'date_of_admit' => $patient->date_of_admit,
                    'date_for_discharged' => now(),
                    'heart_rate' => $vitals->heart_rate,
                    'respiratory_rate' => $vitals->respiratory_rate, 
                    'blood_pressure' => $vitals->blood_pressure,
                    'temperature' => $vitals->temperature,
                    'spo2' => $vitals->spo2,
                    'time' => now(),
                    'name' => $patient->name,
                ]);

                $hospitalRecord->save();

                $patient->delete();

                $room = Room::find($roomId);
                if ($room) {
                    $room->status = 'Available';
                    $room->save();
                }

                return response()->json(['message' => 'Patient discharged successfully and moved to hospital_records']);
            } else {
                return response()->json(['error' => 'Vital signs missing for the discharged patient'], 500);
            }
        }

        return response()->json(['patient' => $patient, 'vitals' => $vitals]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    



public function dischargePatient(Request $request)
{
    try {
        $roomId = $request->input('room_id');

        $patient = Patient::where('room', $roomId)->firstOrFail();

        // Check if the patient is already discharged
        if ($patient->is_discharged) {
            return response()->json(['message' => 'Patient is already discharged']);
        }

        $vitals = VitalSign::where('patient_id', $patient->id)->latest()->firstOrFail();

        // Assuming 'respiratory' is the correct field name
        $hospitalRecordData = [
            'patient_id' => $patient->id,
            'date_of_admit' => $patient->date_of_admit,
            'date_for_discharged' => now(),
            'heart_rate' => $vitals->heart_rate,
            'respiratory' => $vitals->respiratory_rate,
            'blood_pressure' => $vitals->blood_pressure,
            'temperature' => $vitals->temperature,
            'spo2' => $vitals->spo2,
            'time' => now(),
            'name' => $patient->name,
        ];

        if ($patient->is_discharged) {
            // If the patient is already discharged, update the data without creating a new record
            $hospitalRecord = HospitalRecord::updateOrCreate(['patient_id' => $patient->id], $hospitalRecordData);
        } else {
            // If the patient is not yet discharged, create a new hospital record
            $hospitalRecord = new HospitalRecord($hospitalRecordData);
            $hospitalRecord->save();
        }

        $patient->is_discharged = true;
        $patient->save();

        $room = Room::find($roomId);
        if ($room) {
            $room->status = 'Available';
            $room->save();
        }

        if ($request->ajax()) {
            return response()->json(['message' => 'Patient discharged successfully', 'patient' => $hospitalRecord]);
        } else {
            return redirect()->route('hospital_records')->with('success', 'Patient discharged successfully');
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}




    



    


    



    public function updateRoomAvailability($roomId)
    {
    $room = Room::find($roomId);

    if (!$room) {
        return response()->json(['error' => 'Room not found'], 404);
    }

    $occupied = Patient::where('room', $room->id)->where('is_discharged', 0)->exists();

    $room->available = !$occupied;

    $room->save();

    return response()->json(['available' => $room->available]);
    }


}
