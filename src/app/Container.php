<?php

namespace app;

use app\Exceptions\Container\ContainerException;
use Exception;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionType;
use ReflectionUnionType;

class Container implements ContainerInterface
{

    private array $entires = [];


    public function get(string $id)
    {

        /**
         * deprecated by throw exception, 
         * if key found, return by calling the callable function
         */
        // if(!$this->has($id)){
        //     throw new NotFoundException('class "'.$id.'" has no binding');
        // }


        if ($this->has($id)) {
            $entry = $this->entires[$id];
            echo '-------_HAS_______-' . PHP_EOL;
            var_dump($entry);
            return $entry($this);
        }

        $this->resolve($id);
    }




    public function has(string $id): bool
    {
        return isset($this->entires[$id]);
    }

    public function set(string $id, callable $concrete): void
    {
        $this->entires[$id] = $concrete;
    }

    public function test()
    {
        var_dump($this->entires);
    }

    public function resolve(string $id)
    {
        // 1. Inspect the class that we are trying to get from the container
        $refectionClass = new ReflectionClass($id);

        if (!$refectionClass->isInstantiable()) {
            throw new ContainerException('Class ' . $id . ' is not instantiable');
        }

        // 2. inspect the constructor of the class

        $constructor = $refectionClass->getConstructor();

        //if there is no constructor for the class, new the class, then return
        if (!$constructor) {
            return new $id;
        }

        // 3. inspect the constructor parameters(Dependencies)

        $parameters = $constructor->getParameters();

        //if the constructor has no params, new the class, then return
        if (!$parameters) {
            return new $id;
        }

        var_dump($parameters);

        // 4. if the constructor parameters is a class 
        //then try to resolve the class using the container

        $dependencies = array_map(
            function (ReflectionParameter $params) use ($id) {
                $name = $params->getName();
                $type = $params->getType();

                if (!$type) {
                    throw new ContainerException('Failed to resolve class "' . $id . '" because param "' . $name . '" is missing type hint');
                }

                if ($type instanceof ReflectionUnionType) {
                    throw new ContainerException('Failed to resolve class "' . $id . '" because of union type for params "' . $name . '"');
                }

                if ($type instanceof ReflectionNamedType && ! $type->isBuiltin()) {

                    echo 'LLL' . PHP_EOL;
                    echo $type->getName() . PHP_EOL;
                    return $this->get($type->getName());
                }

                throw new ContainerException('Failed to resolve class "' . $id . '" because of the invalid params "' . $name . '"');
            },
            $parameters
        );

        var_dump($dependencies);
        die('CCEFG');

        return $refectionClass->newInstanceArgs($dependencies);
    }
}
