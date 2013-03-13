<?php

namespace Framework\Event;
use Framework\EventManager\EventManager;

class EventWatcher {
    
    /**
     * Check for an extension in the given ?page const
     * @param type $string
     * @return type
     */
    
    static public function checkForExtension($string) {
        $parsed = explode('.', $string);

        if (isset($parsed[1])) {
           
            if ($parsed[1] != 'php') {
                echo 'Er is een fout opgetreden!';
                EventManager::addError('IP ' . $_SERVER['REMOTE_ADDR'] . ' has loaded an page without the ' . $parsed[1] . ' extension', 'Event-Watcher');
                die();
            }
        }
        return $parsed[0];
    }
}