<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;


    protected $table = 'bookings';

    protected $fillable = [
        'trip_id', 'user_id', 'jumlah', 'harga_total', 'status'
    ];

    public function trip() 
    {
        return $this->belongsTo(Trip::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
