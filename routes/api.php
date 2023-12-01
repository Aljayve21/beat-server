<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VitalSignController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('api/patients/{room}', [PatientController::class,'getPatientsByRoom'])->name('getPatientsByRoom');
Route::post('/rooms/get-patient-details', [RoomController::class, 'getPatientDetails'])->name('api.rooms.getPatientDetails');

Route::post('vital-signs', [VitalSignController::class,'store']);
Route::get('/patients/scan-vital-signs', [PatientController::class, 'scanVitalSigns'])->name('patients.scan-vital-signs');
