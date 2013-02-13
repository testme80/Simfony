<?php

namespace Framework\App;

use Framework\EventManager\EventManager;

class Application {
    
    static function isPageSet() {
        if (!isset($_GET['page'])) {
            return false;
        } else {
            return true;
        }
    }
    
    static function loadPage($argument) {
        if ($argument == null) {
            $argument = HOMEPAGE;
        }
        
        if (Application::ifPageExists($argument)) {
            require './vendor/Builders/' . $argument . '.php';
            new $argument();
        } else {
            require './vendor/Builders/' . NOTFOUND_PAGE . '.php';
            $page = NOTFOUND_PAGE;
            
            EventManager::msg($argument, $page);
        }
    }
    
    static private function ifPageExists($argument) {
        if (file_exists('./vendor/Builders/' . $argument . '.php')) {
            return true;
        } else {
            return false;
        }
    }
}
