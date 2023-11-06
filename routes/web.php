<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TimeLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Time_in and Time_Out Attendance
Route::controller(TimeLogController::class)->group(function () {
    Route::get('/attendance', 'App\Http\Controllers\TimeLogController@attendance');
    Route::post('/time-in', 'App\Http\Controllers\TimeLogController@store');
    Route::post('/time-out/{id}', 'App\Http\Controllers\TimeLogController@timeOut');
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [LiveSearchController::class, 'index']);

// Route::get('/action', [LiveSearchController::class, 'action'])->name('action');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('lagout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/tab1', function () {
        return view('dashboard');
    });
    
    Route::get('/tab2', function () {
        return view('dashboard');
    });

    Route::controller(PatientController::class)->prefix('patients')->group(function () {
        Route::get('', 'index')->name('patients');
        Route::get('create', 'create')->name('patients.create');
        Route::post('store', 'store')->name('patients.store');
        // Route::get('show/{room}', 'room')->name('patients.show', 'views.dashboard');
        Route::get('show/{id}', 'show')->name('patients.show');
        Route::get('index/{room}', 'showCurrentAdmit')->name('patients.show');
        Route::get('edit/{id}', 'edit')->name('patients.edit');
        Route::put('edit/{id}', 'update')->name('patients.update');
        Route::delete('destroy/{id}', 'destroy')->name('patients.destroy');
        Route::post('patients/discharge/{id}', 'discharge')->name('patients.discharge');

    });

    
    
    Route::get('/hospitalrecords', [PatientController::class, 'hospitalRecords'])->name('hospitalrecords');
    
   

    
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::get('/attendance', [App\Http\Controllers\TimeLogController::class, 'attendance'])->name('attendance');
});





 