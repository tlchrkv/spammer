<?php

declare(strict_types=1);

namespace SpammerApi\Infrastructure\Http;

final class Response
{
    public function __construct(
        public readonly int $code,
        public readonly array $content
    ) {}
}
