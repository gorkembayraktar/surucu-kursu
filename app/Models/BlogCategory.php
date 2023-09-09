<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Blog;
use App\Models\RSBlogCategory;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    protected $fillable = [
        'title',
        'slug',
        'status',
    ];

    public function rs_blog(): HasMany
    {
        return $this->hasMany(RSBlogCategory::class, 'id', 'category_id');
    }

    public function blog_count(): HasMany{
        //SELECT b1.title, count(*) as count FROM `blog_categories` b1 RIGHT JOIN blog_category b2 ON b1.id = b2.category_id GROUP BY category_id
        return $this->hasMany(RSBlogCategory::class,  "category_id", "id");
    }
}
