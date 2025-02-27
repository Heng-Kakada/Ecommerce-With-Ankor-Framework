<?php

namespace AnkorFramework\App\Container;

use AnkorFramework\App\Http\BaseController;
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


            if (!$type) {
                throw new RuntimeException("Cannot resolve type for parameter: " . $param->getName());
            }

            $paramClass = $type->getName();

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

        if (!class_exists($abstract)) {
            throw new RuntimeException("Class '$abstract' does not exist.");
        }

        $reflection = new ReflectionClass($abstract);

        if (!$reflection->isInstantiable()) {
            throw new RuntimeException("Class '$abstract' is not instantiable.");
        }

        if (str_starts_with($abstract, 'src\\controllers\\') || str_ends_with($abstract, 'Controller')) {
            if (!$reflection->isSubclassOf(BaseController::class)) {
                throw new RuntimeException("Class '$abstract' must extend BaseController.");
            }
        }

        $dependencies = $this->buildDependencies($reflection);

        return $reflection->newInstanceArgs($dependencies);
    }

}
