<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VitalSignController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalRecordController;

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
Route::post('/tab1/discharge/{roomId}', [HospitalRecordController::class, 'dischargePatient'])->name('dischargePatient');
Route::post('vital-signs', [VitalSignController::class,'store']);
Route::get('/patients/scan-vital-signs', [PatientController::class, 'scanVitalSigns'])->name('patients.scan-vital-signs');
Route::post('/hospital-records', [HospitalRecordController::class, 'storeHospitalRecord'])->name('hospital-records.store');

