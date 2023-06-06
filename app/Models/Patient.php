<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'bed_no',
        'name',
        'age',
        'gender',
        'condition',
        'heart_rate',
        'respiratory_pressure',
        'blood_pressure',
        'oxygen_level',
        'temperature'
    ];
}
