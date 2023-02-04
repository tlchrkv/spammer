<?php

namespace App\Domain\Mailing\SubscriberMessage;

interface MessageSender
{
    /**
     * @throws MessageNotSent
     */
    public function send(string $title, string $message, string $phone): void;
}
