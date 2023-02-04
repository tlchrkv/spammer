<?php

declare(strict_types=1);

spl_autoload_register(function (string $className) {
    require str_replace('SpammerApi/', '', str_replace('\\', '/', $className)) . '.php';
});
