<?php

function array_get(array $array, string $keys, $default = null) {

    $keys = explode('.', $keys);
    
    foreach($keys as $key) {
        if (is_array($array) && array_key_exists($key, $array)) {
            $array = $array[$key];
        } else {
            return $default;
        }
    }
    return $array;
}
