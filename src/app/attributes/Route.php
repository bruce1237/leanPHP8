<?php
namespace app\attributes;

use Attribute;

#[Attribute()]
class Route{
    public function __construct(public string $routePath, public string $method = 'get')
    {
        
    }
}