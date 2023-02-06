#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/Infrastructure/initialize.php';

use

/** @var ParseSubscribersCommand $parseSubscribersCommand */
$parseSubscribersCommand = instance(ParseSubscribersCommand::class);
$parseSubscribersCommand();
