<?php

namespace Framework\Update;

class Updater {
    function __construct($url) {
        $extension = $this->getExtension($url);
        $this->downloadNew($url, $extension);
    }
    
    /**
     * Download the new framework;
     * 
     * @param type $url
     * @param type $extension
     * @return boolean
     */
    
    private function downloadNew($url, $ex) {
        file_put_contents('test.' . $ex, file_get_contents($url));
        return true;
    }
    
    /**
     * Return the file's extension
     * 
     * @param type $url
     * @return type
     */
    
    private function getExtension($url) {
        $result = explode('.', $url);
        return $result[1];
    }
    
    private function generateTitle() {
        
    }
}