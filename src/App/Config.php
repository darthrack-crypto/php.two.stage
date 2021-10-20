<?php

namespace App;

use Exception;

class Config
{
    private array $configurations = [];

    protected function __construct()
    {
        $this->load();
    }

    protected function __clone()
    {
        
    }

    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton");
    }

    private function load()
    {
        foreach (scandir(APP_DIR . '/config/') as $file) {
            if ($file != '.' && $file != '..') {
                require APP_DIR . '/config/' . $file;
                array_push($this->configurations, [$file => require APP_DIR . '/config/' . $file]);
            }
        }
    }

    public function get(string $config, $default = null)
    {
        return array_get($this->configurations, $config, $default);
    }

    public static function getInstance()
    {
        $cls = static::class;
        if(!isset(self::$configurations[$cls])) {
            self::$configurations[$cls] = new static();
        }

        return self::$configurations[$cls];
    }
}
