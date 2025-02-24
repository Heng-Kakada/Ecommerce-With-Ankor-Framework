<?php

namespace AnkorFramework\Core\Container;

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
        // if there is no constructor we return an empty array
        $constructor = $reflection->getConstructor();
        if (!$constructor) {
            return [];
        }

        // if there is constructor we get all the parameters
        $parameters = $constructor->getParameters();

        return array_map(function ($param) {

            $type = $param->getType();

            if (!$type) {
                throw new RuntimeException();
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
