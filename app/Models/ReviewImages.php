<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewImages extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewImagesFactory> */
    use HasFactory;


    protected $table = 'review_images';

    protected $fillable = [
        'review_id',
        'image_path',
    ];


    public function review() 
    {
        return $this->belongsTo(Review::class);
    }
}
