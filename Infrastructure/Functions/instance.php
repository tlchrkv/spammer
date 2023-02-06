<?php

/**
 * @throws ReflectionException
 */
function instance(string $class) {
    $bindings = require_once __DIR__ . '/../bindings.php';

    $reflector = new \ReflectionClass($class);

    if (!$reflector->isInstantiable()) {
        throw new ReflectionException("[$class] is not instantiable");
    }

    $constructor = $reflector->getConstructor();

    if ($constructor === null) {
        return new $class;
    }

    $parameters = $constructor->getParameters();
    $dependencies = [];
    foreach ($parameters as $parameter) {
        $dependencyClass = $parameter->getType()->getName();

        if ($dependencyClass === null) {
            throw new ReflectionException("Cannot resolve dependencies for class [$class]!");
        }

        if (method_exists($dependencyClass, 'instance')) {
            $dependencies[] = $dependencyClass::instance();
            continue;
        }

        if ($bindings[$dependencyClass] === null) {
            throw new ReflectionException("Has no declared binding for class [$dependencyClass]!");
        }

        if (is_callable($bindings[$dependencyClass])) {
            $dependencies[] = $bindings[$dependencyClass]();
            continue;
        }

        $dependencies[] = instance($bindings[$dependencyClass]);
    }

    return $reflector->newInstanceArgs($dependencies);
}
