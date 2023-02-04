<?php

namespace App\Domain\Mailing\SubscriberMessage;

enum Status
{
    case WAITING;
    case SENT;
    case ERROR;
}
