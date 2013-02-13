<?php

namespace Framework\Store\Storage;

use Framework\Store\StorageInterface;

class SessionStorage implements StorageInterface {
    static public function __construct() {
        session_start();
    }
    
    static public function get($key) {
        return $_SESSION[$key];
    }
    
    static public function has($key) {
        return isset($_SESSION[$key]);
    }
    
    static public function remove($key) {
        unset($_SESSION[$key]);
    }
    
    static public function set($key, $value) {
        $_SESSION[$key] = $value;
    }
}