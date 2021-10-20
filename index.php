<?php

use App\Application;
use App\Router;
use App\View;
use App\Controller;


error_reporting(E_ALL);
ini_set('display_errors',true);



require_once 'bootstrap.php';

$router = new Router();

$router->get('/', function() {
    return new View('homepage', ['title' => 'General Page']);
});
$router->get('/about', function() {
    return new View('about', ['title' => 'About Page']);
});

$router->get('/', Controller::class . '@index');
$router->get('/about', Controller::class . '@about');


$application = new Application($router);
$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
