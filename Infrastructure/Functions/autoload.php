<?php

declare(strict_types=1);

spl_autoload_register(fn (string $className) => require __DIR__ . '/' . str_replace('App', 'app', str_replace('\\', '/', $className)) . '.php');
