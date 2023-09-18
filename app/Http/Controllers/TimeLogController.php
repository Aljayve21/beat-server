<?php

namespace App\Http\Controllers;

use App\Models\TimeLog;
use Illuminate\Http\Request;
// use Symfony\Component\HttpKernel\Profiler\Profile;

class TimeLogController extends Controller
{
    public function attendance() {
        $time = TimeLog::all();
        return view('attendance', compact('time'));
    }

    public function store(Request $request) {
        $time = new TimeLog();
        $time->name = $request->input('name');
        $time->time_in = now();
        $time->save();
        return redirect('/attendance');
    }

    public function timeOut($id) {
        $time = TimeLog::findOrFail($id);
        $time->time_out = now();
        $time->save();
        return redirect('/attendance');
    }
}
