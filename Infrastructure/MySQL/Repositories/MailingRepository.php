<?php

declare(strict_types=1);

namespace App\Infrastructure\MySQL\Repositories;

use App\Domain\Mailing\Mailing;
use App\Domain\Mailing\MailingStorage;

final class MailingRepository implements MailingStorage
{
    public function create(Mailing $mailing): void
    {
        // TODO: Implement create() method.
    }

    public function update(Mailing $mailing): void
    {
        // TODO: Implement update() method.
    }

    public function find(string $id): Mailing
    {
        // TODO: Implement find() method.
    }
}
