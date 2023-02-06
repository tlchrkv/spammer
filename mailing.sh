#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/Infrastructure/initialize.php';

use SpammerApi\Application\Commands\ProcessMailingCommand;

if (!isset($argv[1])) {
    echo "Mailing ID is a required argument\n";
    return;
}

/** @var ProcessMailingCommand $processMailingCommand */
$processMailingCommand = instance(ProcessMailingCommand::class);
$processMailingCommand($argv[1], 1);
