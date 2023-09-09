<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\User;
use App\Models\BlogCategory;
use App\Models\RSBlogCategory;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blog";

    protected $casts = [
        'publish' => \App\Enum\BlogEnum::class
    ];

    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'content',
        'image',
        'publish'
    ];

    public function user(): HasOne{
        return $this->hasOne(User::class, 'id', 'user_id');
    }

   /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany|App\Models\BlogCategory[]
    */
    public function categories(): BelongsToMany{
       return $this->belongsToMany(BlogCategory::class, 'blog_category', 'blog_id', 'category_id');
    }

    public function blog_category(): HasMany{
       return $this->hasMany(RSBlogCategory::class, 'blog_id', 'id');
    }

    public function has_category( int $category_id ){
        return $this->hasMany(RSBlogCategory::class, 'blog_id', 'id')->where('category_id', $category_id)->count() > 0;
    }

    
}
