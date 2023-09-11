<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMail extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $casts = [
        'publish' => \App\Enum\EmailContactEnum::class
    ];

    protected $fillable = [
        'type',
        'name',
        'mail',
        'subject',
        'message',
        'ip_adress',
        'ip_info_json',
        'device_info',
        'is_mail_send',
        'send_mail_adress',
        'page_created_at',
        'is_read',
        'is_deleted',
        'is_read_date',
        'is_deleted_date'
    ];
}
