<?php

declare(strict_types=1);

namespace SpammerApi\Infrastructure\SubscriberResource;

use SpammerApi\Domain\Subscriber;
use SpammerApi\Domain\SubscriberResource;

final class SubscriberCsvResource implements SubscriberResource
{
    public function getNextSubscriberOrNull(): ?Subscriber
    {
        // TODO: Implement getNextSubscriberOrNull() method.
    }
}
