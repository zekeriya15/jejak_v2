<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;


    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'trip_id',
        'rating',
        'ulasan',
    ];


    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function trip() 
    {
        return $this->belongsTo(Trip::class);
    }

    public function images() 
    {
        return $this->hasMany(ReviewImages::class);
    }
}
