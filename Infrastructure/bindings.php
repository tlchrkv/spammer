<?php

declare(strict_types=1);

return [
    \SpammerApi\Domain\SubscriberResource::class => \SpammerApi\Infrastructure\SubscriberResource\SubscriberCsvResource::class,
    \SpammerApi\Domain\SubscriberStorage::class => \SpammerApi\Infrastructure\MySQL\Repositories\SubscriberRepository::class,
    \SpammerApi\Domain\Mailing\MailingStorage::class => \SpammerApi\Infrastructure\MySQL\Repositories\MailingRepository::class,
    \SpammerApi\Domain\Mailing\SubscriberMessage\MessageSender::class => \SpammerApi\Infrastructure\SmsSender\SmsSenderStub::class,
    \SpammerApi\Domain\Mailing\SubscriberMessage\SubscriberMessageStorage::class => \SpammerApi\Infrastructure\MySQL\Repositories\SubscriberMessageRepository::class,
];
