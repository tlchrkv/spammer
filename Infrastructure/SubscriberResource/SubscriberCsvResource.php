<?php

declare(strict_types=1);

namespace SpammerApi\Infrastructure\SubscriberResource;

use SpammerApi\Domain\Subscriber;
use SpammerApi\Domain\SubscriberResource;

final class SubscriberCsvResource implements SubscriberResource
{
    public function getSubscribers(string $resourcePath): ?\Generator
    {
        $stream = fopen($resourcePath, 'r');

        while (($data = fgetcsv($stream)) !== false) {
            yield new Subscriber(uuid4(), $data[1], $data[0]);
        }

        fclose($stream);

        return null;
    }
}
