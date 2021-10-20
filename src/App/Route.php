<?php

namespace App;

class Route 
{

    private $uri;
    private $method;
    private $callback;

    public function __construct($uri, $method, $callback)
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->callback = $callback;
    }

    private function prepareCallback($callback) 
    {
        [$class, $method] = explode('@', $callback);
        return [$class, $method];
    }

    public function match(string $uri, string $method): bool
    {
        if ($uri == $this->uri && $method == $this->method) {
            return true;
        }

        return false;
    }

    public function run() 
    {
        if (is_callable($this->callback)) {
            return call_user_func($this->callback);
        } else {
            return call_user_func($this->prepareCallback($this->callback));
        }
    }
}
