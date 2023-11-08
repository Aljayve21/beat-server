<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',  
        'respiratory',
        'blood_pressure',
        'temperature',
        'spo2',
        'pulse_rate',
        'room',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }
}
