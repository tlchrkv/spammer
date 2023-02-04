<?php

declare(strict_types=1);

namespace App\Domain;

interface SubscriberStorage
{
    public function phoneExists(string $phone): bool;
    public function create(Subscriber $subscriber): void;
    public function find(string $id): Subscriber;
    public function get(int $offset, int $length): array;
}
