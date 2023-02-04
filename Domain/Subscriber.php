<?php

namespace App\Domain;

final class Subscriber
{
    public function __construct(
        public string $id,
        public string $name,
        public string $phone
    ) {}
}
