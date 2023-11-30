<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $fillable = [
        'name',
        'age',
        'gender',
        'Birthday',
        'Address',
        'Contact',
        'Guardian',
        'room',
        'is_discharged'
    ];
    


    public function vitalSigns() 
    {
        return $this->hasMany(VitalSign::class, 'room', 'room');
    }

    
}
