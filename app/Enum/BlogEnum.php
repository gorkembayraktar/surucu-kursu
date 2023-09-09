<?php
namespace App\Enum;

use App\Trait\EnumToArray;

enum BlogEnum:string
{
    use EnumToArray;
    
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case INEDITED = 'inedited';
    case TRASH = "trash";
}