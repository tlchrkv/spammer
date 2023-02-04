<?php

declare(strict_types=1);

/**
 * @throws ReflectionException
 */
function instance(string $class): object {
    $bindings = require_once __DIR__ . '/../bindings.php';

    $reflector = new \ReflectionClass($class);

    if (!$reflector->isInstantiable()) {
        throw new ReflectionException("[$class] is not instantiable");
    }

    $constructor = $reflector->getConstructor();

    if (is_null($constructor)) {
        return new $class;
    }

    $parameters = $constructor->getParameters();
    $dependencies = [];
    foreach ($parameters as $parameter) {
        $dependencyClass = $parameter->getDeclaringClass();

        if (is_null($dependencyClass)) {
            throw new ReflectionException("Cannot resolve dependencies for class [$class]!?");
        }

        $dependencies[] = $bindings[$class];
    }

    return $reflector->newInstanceArgs($dependencies);
}
