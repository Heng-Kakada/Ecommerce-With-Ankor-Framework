<?php

namespace AnkorFramework\Core\Container;

use Exception;
use ReflectionClass;
use RuntimeException;

class AppCotainer
{
    private $bindings = [];

    public function register($abstract, callable $factory)
    {
        $this->bindings[$abstract] = $factory;
    }

    private function buildDependencies(ReflectionClass $reflection)
    {

        $constructor = $reflection->getConstructor();
        if (!$constructor) {
            return [];
        }

        $parameters = $constructor->getParameters();
        $className = $reflection->getName();

        return array_map(function ($param) use ($className) {

            $type = $param->getType();
            $paramClass = $type->getName();

            if (!$type) {
                throw new RuntimeException("Cannot resolve type for parameter: " . $param->getName());
            }

            if ($paramClass === $className) {
                throw new RuntimeException("Self-referencing dependency detected in class: $className");
            }

            return $this->get($type->getName());

        }, $parameters);

    }

    public function get($abstract)
    {
        if (isset($this->bindings[$abstract])) {
            return $this->bindings[$abstract]($this);
        }

        $reflection = new ReflectionClass($abstract);

        $dependencies = $this->buildDependencies($reflection);

        return $reflection->newInstanceArgs($dependencies);
    }

}
