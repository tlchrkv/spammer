<?php

declare(strict_types=1);

namespace SpammerApi\Infrastructure\MySQL\Repositories;

use SpammerApi\Domain\Subscriber;
use SpammerApi\Domain\SubscriberStorage;
use SpammerApi\Infrastructure\MySQL\MySQL;

final class SubscriberRepository implements SubscriberStorage
{
    public function __construct(private readonly MySQL $mysql) {}

    public function phoneExists(string $phone): bool
    {
        // TODO: Implement phoneExists() method.
    }

    public function create(Subscriber $subscriber): void
    {
        $this->mysql->exec("INSERT INTO subscribers (id, name, phone) VALUES ('$subscriber->id', '$subscriber->name', '$subscriber->phone')");
    }

    public function find(string $id): Subscriber
    {
        // TODO: Implement find() method.
    }

    public function get(int $offset, ?int $length): array
    {
        return [];
    }
}
