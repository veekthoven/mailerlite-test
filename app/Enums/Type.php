<?php
 
namespace App\Enums;

enum Type: string
{
    case Date = 'date';
    case Number = 'number';
    case String = 'string';
    case Boolean = 'boolean';
}
