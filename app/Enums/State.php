<?php
 
namespace App\Enums;

enum State: string
{
    case Active = 'active';
    case Unsubscribed = 'unsubscribed';
    case Junk = 'junk';
    case Unconfirmed = 'unconfirmed';
    case Bounced = 'bounced';
}
