<?php

declare(strict_types=1);

namespace App\Infrastructure\MySQL\Repositories;

use App\Domain\Mailing\SubscriberMessage\SubscriberMessage;
use App\Domain\Mailing\SubscriberMessage\SubscriberMessageStorage;

final class SubscriberMessageRepository implements SubscriberMessageStorage
{
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
