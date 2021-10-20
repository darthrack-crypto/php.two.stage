<?php

namespace App;


class Application
{
    /**
     * @var Router
     */
    private $router;

    public function __construct($router)
    {
        $this->router = $router;
    }

    public function run(string $uri, string $method) 
    {
        try {

            $respone = $this->router->dispatch($uri, $method);
            if ($respone instanceof Renderable) {
                $respone->render();
            } else {
                echo $respone;
            }
        } catch (ApplicationException $e) {
            $this->renderException($e);
        }
    }

    private function renderException(ApplicationException $e)
    {
        if ($e instanceof Renderable) {
            $e->render();
        } else {
            http_response_code(500);
        }
    }
}
