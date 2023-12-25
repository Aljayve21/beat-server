<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'available',
        'status',
        'emergency_status',
    ];

    public function isRoomAvailable($roomChoice)
    {
        
        $room = Room::find($roomChoice);

        return $room && $room->available;
    }
}
