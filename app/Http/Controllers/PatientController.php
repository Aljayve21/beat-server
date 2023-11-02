<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patient = Patient::orderBy('created_at', 'DESC')->get();

        return view('patients.index', compact('patient'));

       
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'Birthday' => 'required|date',
            'Address' => 'required|string',
            'Contact' => 'required|string',
            'Guardian' => 'required|string',
            'room' => 'required|integer', // Ensure the 'room' field is validated
        ]);

        dd($data);

        // $roomAvailability = Patient::checkRoomAvailability($data['room']);

        // if (!$roomAvailability) {
        // return back()->with('error', 'Room is full. Please choose another room.');
        // }

        $patient = Patient::create($data);

        return redirect()->route('patients.show', $patient->id);
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    public function showCurrentAdmit($room)
    {
    $patients = Patient::all(); // Fetch all admission records (you might want to paginate this in a real application)
    return view('patients.index', compact('patients', 'room'));
    }


    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);

        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patient::findOrFail($id);

        $patient->update($request->all());

        return redirect()->route('patients')->with('success', 'Patient Info Updated Succcessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);

        $patient->delete();

        return redirect()->route('patients')->with('success', 'Patient Data Deleted Successfully');
    }
}