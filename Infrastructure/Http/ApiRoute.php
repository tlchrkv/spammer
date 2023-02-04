<?php

declare(strict_types=1);

namespace SpammerApi\Infrastructure\Http;

final class ApiRoute
{
    public function __construct(
        private readonly string $method,
        private readonly string $pathExpression,
        private readonly \Closure $closure
    ) {}

    public function isCurrentRoute(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === $this->method && $_SERVER['REQUEST_URI'] === $this->pathExpression;
    }

    public function exec(): void
    {
        /** @var Response $response */
        $response = ($this->closure)();

        http_response_code($response->code);
        echo json_encode($response->content);
    }
}
