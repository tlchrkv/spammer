<?php

declare(strict_types=1);

namespace SpammerApi\Infrastructure\MySQL;

use PDO;

final class MySQL
{
    private static $instances = [];
    public readonly \PDO $pdo;

    private function __construct()
    {
        $host = getenv('MYSQL_HOST');
        $database = getenv('MYSQL_DATABASE');
        $username = getenv('MYSQL_USER');
        $password = getenv('MYSQL_PASSWORD');

        $this->pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function instance(): MySQL
    {
        $mysql = self::class;

        if (!isset(self::$instances[$mysql])) {
            self::$instances[$mysql] = new self();
        }

        return self::$instances[$mysql];
    }

    public function exec(string $statement): int|false
    {
        return $this->pdo->exec($statement);
    }

    public function query($statement, $mode = PDO::ATTR_DEFAULT_FETCH_MODE, ...$fetch_mode_args): \PDOStatement|false
    {
        return $this->pdo->query($statement, $mode, ...$fetch_mode_args);
    }
}
