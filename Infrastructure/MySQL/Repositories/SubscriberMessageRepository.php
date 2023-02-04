<?php

declare(strict_types=1);

namespace SpammerApi\Infrastructure\MySQL\Repositories;

use SpammerApi\Domain\Mailing\SubscriberMessage\SubscriberMessage;
use SpammerApi\Domain\Mailing\SubscriberMessage\SubscriberMessageStorage;
use SpammerApi\Infrastructure\MySQL\MySQL;

final class SubscriberMessageRepository implements SubscriberMessageStorage
{
    public function __construct(private readonly MySQL $mysql) {}

    public function create(SubscriberMessage $subscriberMessage): void
    {
        // TODO: Implement create() method.
    }

    public function update(SubscriberMessage $subscriberMessage): void
    {
        // TODO: Implement update() method.
    }

    public function findFirstWaitingOrNull(string $mailingId): ?SubscriberMessage
    {
        // TODO: Implement findFirstWaitingOrNull() method.
    }
}
