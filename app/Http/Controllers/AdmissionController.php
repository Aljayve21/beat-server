<?php

namespace App\Http\Controllers;
use App\Models\Admission;
use App\Models\Room;
use Illuminate\Http\Request;


class AdmissionController extends Controller
{
    public function index()
{
    $rooms = Room::all();
    return view('admission.create', compact('rooms'));
}

public function store(Request $request)
{
    // Validate the incoming form data
    $request->validate([
        'name' => 'required|string',
        'age' => 'required|numeric',
        'gender' => 'required|in:Male,Female,Other',
        'birthday' => 'required|date',
        'address' => 'required|string',
        'contact' => 'required|string',
        'guardian' => 'required|string',
        'room_choice' => 'required|numeric|exists:rooms,id',
    ]);

    // Check if the selected room is full
    $selectedRoom = Room::find($request->room_choice);
    if ($selectedRoom->isFull()) {
        return back()->with('error', 'The selected room is full.');
    }

    // Create a new admission record and save it to the database
    $admission = new Admission();
    $admission->name = $request->name;
    $admission->age = $request->age;
    $admission->gender = $request->gender;
    $admission->birthday = $request->birthday;
    $admission->address = $request->address;
    $admission->contact = $request->contact;
    $admission->guardian = $request->guardian;
    $admission->room_id = $request->room_choice;
    $admission->save();

    return redirect('/admission')->with('success', 'Admission successfully submitted.');
}

}
