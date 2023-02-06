<?php

spl_autoload_register(function (string $className) {
    require str_replace('SpammerApi/', '', str_replace('\\', '/', $className)) . '.php';
});
