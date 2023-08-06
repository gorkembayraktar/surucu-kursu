<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'slider';

    protected $fillable = ['user_id' ,'title','sub_title', 'content', 'image', 'active', 'que', 'button_name', 'button_redirect'];

}
