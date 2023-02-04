<?php

declare(strict_types=1);

namespace SpammerApi\Infrastructure\SmsSender;

use SpammerApi\Domain\Mailing\SubscriberMessage\MessageSender;

final class SmsSenderStub implements MessageSender
{
    public function send(string $title, string $message, string $phone): void {}
}
