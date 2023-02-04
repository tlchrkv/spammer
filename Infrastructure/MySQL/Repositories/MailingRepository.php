<?php

declare(strict_types=1);

namespace SpammerApi\Infrastructure\MySQL\Repositories;

use SpammerApi\Domain\Mailing\Mailing;
use SpammerApi\Domain\Mailing\MailingStorage;
use SpammerApi\Infrastructure\MySQL\MySQL;

final class MailingRepository implements MailingStorage
{
    public function __construct(private readonly MySQL $mysql) {}

    public function create(Mailing $mailing): void
    {
        $this->mysql->exec("INSERT INTO mailings (id, title, message, status) VALUES ('$mailing->id', '$mailing->title', '$mailing->message', '$mailing->status')");
    }

    public function update(Mailing $mailing): void
    {
        // TODO: Implement update() method.
    }

    public function find(string $id): Mailing
    {
        // TODO: Implement find() method.
    }

    public function get(): array
    {
        // TODO: Implement get() method.
    }
}
