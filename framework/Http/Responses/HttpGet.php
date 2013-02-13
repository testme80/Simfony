<?php

namespace Framework\Http\Get;
use Framework\EventManager\EventManager;
use Framework\Http\Get\HttpGetInterface;

class HttpGET implements HttpGetInterface {
    static public function import($array) {
        if (!is_array($array)) {
            EventManager::msg('HttpGet import is not an array!', 'error');
        }
    }
}