<?php

declare(strict_types=1);

namespace App\Infrastructure\SmsSender;

use App\Domain\Mailing\SubscriberMessage\MessageSender;

final class SmsSenderStub implements MessageSender
{
    public function send(string $title, string $message, string $phone): void {}
}
