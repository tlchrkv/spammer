#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/Infrastructure/initialize.php';

use SpammerApi\Infrastructure\MySQL\MySQL;

try {
    migrate(MySQL::instance(), getenv('MYSQL_MIGRATIONS_DIR'));
} catch(\PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function migrate(MySQL $mysql, string $migrationsDir) {
    createMigrationsTableIfNotExist($mysql);

    $candidates = array_map(
        static function (string $file): int {
            return (int) explode('.', $file)[0];
        },
        array_diff(scandir($migrationsDir), ['..', '.'])
    );

    sort($candidates);

    $last = getLastExecuted($mysql);
    $counter = 0;

    foreach ($candidates as $candidate) {
        if ($candidate > $last) {
            $filename = $migrationsDir . '/' . $candidate . '.sql';
            $mysql->exec(file_get_contents($filename));
            setLastExecuted($mysql, $candidate);
            $counter++;
        }
    }

    echo sprintf('Migrated %d', $counter);
    echo PHP_EOL;
}


function createMigrationsTableIfNotExist(MySQL $mysql) {
    $mysql->exec('CREATE TABLE IF NOT EXISTS migrations (version BIGINT NOT NULL, PRIMARY KEY(version))');
}

function getLastExecuted(MySQL $mysql): int {
    $result = $mysql->query('SELECT version FROM migrations ORDER BY version DESC LIMIT 1');

    return (int) $result->fetchColumn();
}

function setLastExecuted(MySQL $mysql, int $version): void {
    $mysql->exec(sprintf('INSERT INTO migrations VALUES (%d)', $version));
}
