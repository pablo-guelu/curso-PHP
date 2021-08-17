<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Room;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'room_id', 'checkin', 'checkout', 'user_id'
    ];
    
    public function room()
    {
        return $this->hasOne(Room::class);
    }
}
