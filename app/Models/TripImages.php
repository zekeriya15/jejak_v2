<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripImages extends Model
{
    /** @use HasFactory<\Database\Factories\TripImagesFactory> */
    use HasFactory;

    protected $table = 'trip_images';

    protected $fillable = [
        'trip_id',
        'image_path',
    ];

    public function trip() 
    {
        return $this->belongsTo(Trip::class);
    }
}
