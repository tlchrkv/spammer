<?php

declare(strict_types=1);

namespace App\Infrastructure\Http;

final class ApiRoute
{
    public function __construct(
        private readonly string $method,
        private readonly string $pathExpression,
        private readonly \Closure $closure
    ) {}

    public function isCurrentRoute(): bool
    {
        return true;
    }

    public function exec(): void
    {
        /** @var Response $response */
        $response = ($this->closure)();

        http_response_code($response->code);
        echo json_encode($response->content);
    }
}
