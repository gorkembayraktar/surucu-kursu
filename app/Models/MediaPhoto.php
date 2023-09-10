<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPhoto extends Model
{
    use HasFactory;

    protected $table = 'gallery_photo';

    protected $fillable = [
        'user_id',
        'image'
    ];
}
