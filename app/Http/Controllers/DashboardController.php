<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admission;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    public function index()
    {
    // Fetch data from the "Current Admit" page (you can use the Admission model)
    $admissions = Admission::all();
    
    return view('dashboard.index', compact('admissions'));
    }
}
    // public function index()
    // {
    //     $auth = User::where('role_as')->count();
    //     $patient = Patient::count();

    //     return view('admin.dashboard', compact('patient','auth'));
    // }
        
        /* Controller Method */
    


    // public function index() {
    //     $Auth = User::where('role_as', '0')->count();
    //     $Patient = Patient::count();
    //     return view('admin.dashboard', compact('Auth','Patient'));
    // }

    

