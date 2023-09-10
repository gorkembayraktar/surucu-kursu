<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaVideo extends Model
{
    use HasFactory;
    
    protected $table = 'gallery_video';

    protected $fillable = [
        'user_id',
        'title',
        'iframe'
    ];
}
