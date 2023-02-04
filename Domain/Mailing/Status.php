<?php

namespace SpammerApi\Domain\Mailing;

enum Status
{
    case DRAFT;
    case IN_PROCESS;
    case STOPPED;
    case FINISHED;
}
