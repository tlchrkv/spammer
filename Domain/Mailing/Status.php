<?php

namespace App\Domain\Mailing;

enum Status
{
    case DRAFT;
    case IN_PROCESS;
    case STOPPED;
    case FINISHED;
}
