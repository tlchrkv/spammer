<?php

namespace App\Domain\Mailing\SubscriberMessage;

interface SubscriberMessageStorage
{
    public function create(SubscriberMessage $subscriberMessage): void;
    public function update(SubscriberMessage $subscriberMessage): void;
    public function findFirstWaitingOrNull(string $mailingId): ?SubscriberMessage;
}
