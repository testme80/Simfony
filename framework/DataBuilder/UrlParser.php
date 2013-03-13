<?php

namespace Framework\UrlParser;

use Framework\EventManager\EventManager;

class UrlParser {
    
    /**
     * 
     * Check the current URL
     * 
     * @return boolean|string
     */

    static public function now() {
        $pageURL = 'http';
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        
        if (empty($pageURL)) {
            EventManager::msg('Page URL check has been failed!', 'UrlParser/now');
            return false;
        }
        
        return $pageURL;
    }
    
    public function getAllGetArguments() {
        $result = array();
        $url = explode('/', self::now());
        $pieces = explode('?', $url[4]);
        $cleanedPieces = array_splice($pieces, 1, 2);
        
        // Some checking
        
        if (!isset($cleanedPieces[0]) || $cleanedPieces[0] == "") { return false;}
        if (isset($cleanedPieces[1])) {return false;}
        
        foreach ($cleanedPieces as $piece) {
            $piece = addslashes($piece);
            array_push($result, $piece);
        }
        
        print_r($result);
        
        
        
    }

}
