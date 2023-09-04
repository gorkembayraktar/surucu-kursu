<?php
namespace App\Enum;


enum ServicesEnum:string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case INEDITED = 'inedited';
    case TRASH = "trash";
}