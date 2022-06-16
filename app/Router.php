<?php
namespace app;

use Exception;

class Router{
    private array $routers;

    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routers[$requestMethod][$route]  = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function routes(): array
    {
        return $this->routers;
    }

    public function resolve(string $requestUri, string $requestMethod)
    {
        $route = explode('?', $requestUri)[0];
        $action = $this->routers[$requestMethod][$route] ?? null;

        if(! $action){
            throw new Exception("RouterNotFoundException");
        }

        if(is_callable($action)){
            return call_user_func($action);
        }

        if(is_array($action)){
            [$class, $method] = $action;

            if(class_exists($class)){
                $class = new $class();
            }

            if(method_exists($class, $method)){
                return call_user_func_array([$class, $method],[]);
            }
        }


    }
}