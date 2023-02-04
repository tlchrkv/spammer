<?php

declare(strict_types=1);

namespace App\Infrastructure\SubscriberResource;

use App\Domain\Subscriber;
use App\Domain\SubscriberResource;

final class SubscriberCsvResource implements SubscriberResource
{
    public function getNextSubscriberOrNull(): ?Subscriber
    {
        // TODO: Implement getNextSubscriberOrNull() method.
    }
}
