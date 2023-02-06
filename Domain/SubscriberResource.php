<?php

declare(strict_types=1);

namespace SpammerApi\Domain;

interface SubscriberResource
{
    public function getSubscribers(string $resourcePath): ?iterable;
}
