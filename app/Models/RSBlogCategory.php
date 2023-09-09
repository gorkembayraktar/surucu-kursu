<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSBlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_category';

    protected $fillable = [
        'blog_id',
        'category_id',
    ];
}
