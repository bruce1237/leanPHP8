<?php
namespace lib;

class StaticClassA{
    protected static string $name = 'A';

    public function getName()
    {
        return static::$name;
    }

    public static function make(): static
    {
        return new static();
    }
}