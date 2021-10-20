<?php

namespace App;

class Router
{
    /**
     * @var array Route[]
     */
    private $routes = [];

    public function dispatch(string $uri, string $method) 
    {
        foreach($this->routes as $route) {
            if ($route->match($uri, $method)) {
                return $route->run();
            }
        }
        
        throw new NotFoundException();
    }

    private function addRoute(string $path, string $method, $callback) 
    {
        $this->routes[] = new Route($path, $method, $callback);
    }

    public function get(string $path, $callback) 
    {
        $this->addRoute($path, 'GET', $callback);
    }

    public function post(string $path, $callback) 
    {
        $this->addRoute($path, 'POST', $callback);
    }
}
