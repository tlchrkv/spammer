#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/Infrastructure/initialize.php';

use SpammerApi\Application\Commands\ParseSubscribersCommand;

if (!isset($argv[1])) {
    echo "Resource path is a required argument\n";
    return;
}

/** @var ParseSubscribersCommand $parseSubscribersCommand */
$parseSubscribersCommand = instance(ParseSubscribersCommand::class);
$parseSubscribersCommand($argv[1]);
