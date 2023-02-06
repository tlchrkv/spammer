<?php

declare(strict_types=1);

namespace SpammerApi\Application\Commands;

use SpammerApi\Domain\SubscriberResource;
use SpammerApi\Domain\SubscriberStorage;

final class ParseSubscribersCommand
{
    public function __construct(
        private readonly SubscriberStorage $subscriberStorage,
        private readonly SubscriberResource $subscriberResource
    ) {}

    public function __invoke(string $resourcePath): void
    {
        foreach ($this->subscriberResource->getSubscribers($resourcePath) as $subscriber) {
            if (!$this->subscriberStorage->phoneExists($subscriber->phone)) {
                $this->subscriberStorage->create($subscriber);
            }
        }
    }
}
