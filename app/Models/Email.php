<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'emails';

    protected $casts = [
        'type' => \App\Enum\EmailEnum::class
    ];


    protected $fillable = [
        'type',
        'host',
        'port',
        'email',
        'password',
        'secure',
        'reply_mail'
    ];

}
