<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;


    protected $table = 'bookings';

    public function trip() 
    {
        return $this->belongsTo(Trip::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
