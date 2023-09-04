<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $casts = [
        'publish' => \App\Enum\ServicesEnum::class
    ];

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'slug',
        'publish'
    ];


    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
