<?php

// Caution! Class is controlled by the EventManager!

use Framework\EventManager\EventManager;

class FW_Exception {
    
    public function create($exception) {
        
        if (!EventManager::file_included('Exception/' . $exception . '.php')) {
            include_once('Exception/' . $exception . '.php');
        }
        
        new $exception();
        return true;
    }
    
    public function ifset($exception) {
       
    }
}
