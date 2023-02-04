<?php

declare(strict_types=1);

return [
    \App\Domain\SubscriberResource::class => \App\Infrastructure\SubscriberResource\SubscriberCsvResource::class,
    \App\Domain\SubscriberStorage::class => \App\Infrastructure\MySQL\Repositories\SubscriberRepository::class,
    \App\Domain\Mailing\MailingStorage::class => \App\Infrastructure\MySQL\Repositories\MailingRepository::class,
    \App\Domain\Mailing\SubscriberMessage\MessageSender::class => \App\Infrastructure\SmsSender\SmsSenderStub::class,
    \App\Domain\Mailing\SubscriberMessage\SubscriberMessageStorage::class => \App\Infrastructure\MySQL\Repositories\SubscriberMessageRepository::class,
];
