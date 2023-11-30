<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'patient_id',
        'heart_rate',
        'respiratory_rate',
        'blood_pressure',
        'temperature',
        'spo2',
        'pulse_rate',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'room', 'room');
    }

    public static function latestVitalSigns($patientRoom)
    {
        return static::where('room', $patientRoom)->latest()->first();
    }
}

