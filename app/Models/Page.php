<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $fillable = ['user_id', 'title', 'slug', 'sub_title', 'image','content','button_name','button_redirect', 'fixed', 'active'];
}
