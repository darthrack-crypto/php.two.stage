<?php

include 'helpers.php';
require_once __DIR__ . '/vendor/autoload.php';
var_dump(__DIR__);

const APP_DIR = __DIR__;
const VIEW_DIR = APP_DIR . "/view/";

/*spl_autoload_register(function ($class_name) {
    $path = APP_DIR . "/src/" . $class_name . '.php'; 
    include str_replace("\\","/", $path);
});*/