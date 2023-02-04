<?php

declare(strict_types=1);

namespace SpammerApi\Application\Queries;

use SpammerApi\Domain\SubscriberStorage;

final class GetSubscribersQuery
{
    public function __construct(
        private readonly SubscriberStorage $subscriberStorage
    ) {}

    public function __invoke(int $offset, ?int $length): array
    {
        return $this->subscriberStorage->get($offset, $length);
    }
}
