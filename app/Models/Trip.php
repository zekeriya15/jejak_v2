<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    /** @use HasFactory<\Database\Factories\TripFactory> */
    use HasFactory;

    protected $table = 'trips';

    // Specify which fields are fillable to allow mass assignment
    protected $fillable = [
        'judul', 
        'nama_destinasi', 
        'alamat', 
        'deskripsi', 
        'fasilitas', 
        'tgl_trip', 
        'harga_tiket', 
        'harga_trip', 
        'durasi'
    ];

    // Define relationships
    public function images() 
    {
        return $this->hasMany(TripImages::class);
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    public function bookings() 
    {
        return $this->hasMany(Booking::class);
    }
}
