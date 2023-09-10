<?php
namespace App\Enum;

use App\Trait\EnumToArray;

enum EmailEnum:string
{
    use EnumToArray;
    
    case REPLY_CONTACTS = 'REPLY_CONTACTS';
}