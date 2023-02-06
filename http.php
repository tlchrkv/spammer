<?php

declare(strict_types=1);

require_once __DIR__ . '/Infrastructure/initialize.php';

header('Content-Type: application/json');

try {
    foreach (require_once __DIR__ . '/Infrastructure/Http/routes.php' as $route) {
        if ($route->isCurrentRoute()) {
            $route->exec();
            return;
        }
    }

    http_response_code(404);
    echo json_encode(['error' => 'Method not found']);
} catch (\Throwable $error) {
    http_response_code(500);
    echo json_encode(['error' => $error->getMessage()]);
}
