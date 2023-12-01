<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\VitalSign;

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

    public function getPatientDetails(Request $request)
    {
    $roomId = $request->input('room_id');
    
    $patient = Patient::where('room', $roomId)->first();
    $vitals = VitalSign::where('patient_id', $patient->id)->latest()->first();

    return response()->json(['patient' => $patient, 'vitals' => $vitals]);
    }

}
