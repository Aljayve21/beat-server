<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    private function isRoomAvailable($roomChoice)
{
    // Check if the selected room is available
    $room = Room::find($roomChoice);

    return $room && $room->available;
}
}
