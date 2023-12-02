<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_of_admit',
        'date_for_discharged',
        'heart_rate',
        'respiratory',
        'blood_pressure',
        'temperature',
        'spo2',
        'date',
        'time',
        'name', 
    ];
    
}
