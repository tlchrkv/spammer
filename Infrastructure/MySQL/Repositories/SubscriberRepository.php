<?php

declare(strict_types=1);

namespace App\Infrastructure\MySQL\Repositories;

use App\Domain\Subscriber;
use App\Domain\SubscriberStorage;

final class SubscriberRepository implements SubscriberStorage
{
    public function phoneExists(string $phone): bool
    {
        // TODO: Implement phoneExists() method.
    }

    public function create(Subscriber $subscriber): void
    {
        // TODO: Implement create() method.
    }

    public function find(string $id): Subscriber
    {
        // TODO: Implement find() method.
    }

    public function get(int $offset, int $length): array
    {
        // TODO: Implement get() method.
    }
}
