<?php
namespace App\Enum;

use App\Trait\EnumToArray;

enum EmailContactEnum:string
{
    use EnumToArray;
    
    case CONTACT = 'contact';
}