<?php

namespace Framework\Data;
use Framework\EventManager\EventManager;

class Import {
    
    /**
     * Import an Framework file
     * 
     * @param type $item
     * @return boolean
     */
    
    static public function importFrameworkFile($item) {
        if (!file_exists('framework/' . $item . '.php')) {
            EventManager::addError('Framework file ' . $item . 'can not been included!');
            
            return false;
        }
        
        include('framework/' . $item . '.php');
        return true;
    }
    
    /**
     * Import an extension
     * NOT WORKING YET!
     * 
     * @param type $use
     * @return type
     */
    
    static public function importFrameworkExtension($use) {
        return;
    }
}
