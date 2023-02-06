#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/Infrastructure/initialize.php';

use SpammerApi\Application\Queries\GetMailingsQuery;
use SpammerApi\Domain\Mailing\Mailing;
use SpammerApi\Domain\Mailing\Status;

$workingMailings = [];

while (true) {
    /** @var GetMailingsQuery $getMailingsQuery */
    $getMailingsQuery = instance(GetMailingsQuery::class);

    /** @var Mailing $mailing */
    foreach ($getMailingsQuery() as $mailing) {
        if ($mailing->status === Status::IN_PROCESS && !isset($workingMailings[$mailing->id])) {
            $workingMailings[$mailing->id] = exec("./mailing.sh $mailing->id");
            continue;
        }

        if ($mailing->status === Status::STOPPED && isset($workingMailings[$mailing->id])) {
            exec("kill -9 {$workingMailings[$mailing->id]}");
            continue;
        }
    }

    sleep(5);
}
