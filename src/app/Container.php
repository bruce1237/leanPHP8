<?php

namespace app;

use app\Exceptions\Container\NotFoundException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{

    private array $entires = [];


    public function get(string $id)
    {
        if(!$this->has($id)){
            throw new NotFoundException('class "'.$id.'" has no binding');
        }

        $entry = $this->entires[$id];

        var_dump($entry);

        return $entry($this);
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
}
