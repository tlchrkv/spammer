<?php

declare(strict_types=1);

namespace App\Domain;

interface SubscriberResource
{
    public function getNextSubscriberOrNull(): ?Subscriber;
}
