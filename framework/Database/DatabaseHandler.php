<?php

namespace Framework\DatabaseHandler;
use Framework\EventManager\EventManager;

class Handler {

    private $type;

    static public function create() {
        $type = $_SESSION['DB_TYPE'];

        if (!isset($type)) {
            EventManager::msg('DB Type has not been specifeded!', 'error');
        }

        Handler::$type();
    }

    static private function MYSQL() {
        
    }

    static private function MYSQLI() {
        
    }

}