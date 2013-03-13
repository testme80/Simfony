<?php

namespace Framework\App;

use Framework\EventManager\EventManager;
use Framework\Event\EventWatcher;

class Application {
    
    private $action;

    /**
     * Check if the page has been set
     * 
     * @return boolean
     */

    static function isPageSet() {
        if (!isset($_GET['page'])) {
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * 
     * Load the page
     * 
     * @param type $argument
     * @return boolean
     */

    public function loadPage($argument) {

        $argument = EventWatcher::checkForExtension($argument);

        if ($argument == null) {
            $argument = HOMEPAGE;
        }

        if (Application::ifPageExists($argument)) {
            require './vendor/Builders/' . $argument . '.php';
            if (isset($this->action)) {new $this->action; } else { new $argument;  }
        } else {

            if (!file_exists('./vendor/Builders/' . NOTFOUND_PAGE . '.php')) {
                return false;
            }

            require './vendor/Builders/' . NOTFOUND_PAGE . '.php';
            $page = NOTFOUND_PAGE;

            EventManager::msg($argument, $page, true);
        }
    }
    
    /**
     * Assign an specifeid action to a class
     * 
     * @param type $action
     * @return type
     */
    
    public function assignToClass($action) {
        $this->action = $action;
        return;
    }


    /**
     * Check if the page does exists
     * 
     * @param type $argument
     * @return boolean
     */

    static private function ifPageExists($argument) {
        if (file_exists('./vendor/Builders/' . $argument . '.php')) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Check if the config file does exists
     * 
     * @return boolean
     */

    static private function isConfigFileExists() {
        if (file_exists('config.php')) {
            return true;
        } else {
            
        }
    }
    

}
