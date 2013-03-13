<?php

namespace Framework\Update;
use Framework\EventManager\EventManager;

class CheckForUpdates {
    
    private $version, $all;
    public $downloadURL;


    function __construct() {
        $this->init();
        $this->checkVersion();
        
        if ($this->version == VERSION) {
            echo 'Dit is al de nieuwste versie!';
            
            $url = $this->getDownloadURL();
            return $url;
        } else {
            echo 'Er is een nieuwe versie beschrikbaar! Versie' . $this->version;
            
            $url = $this->getDownloadURL();
            return $url;
        }
    }
    
    /**
     * Init for the CheckForUpdates class, gets the data from an specifed URL
     */
    
    private function init() {
        $site = file_get_contents(UPDATE_URL);
        $final = explode('|', $site);
        $this->all = $final;
    }


    /**
     * Get the version and check it out!
     * 
     * @return boolean
     */
    
    private function checkVersion() {
        if (!is_numeric($this->all[0])) {
            EventManager::addError('Version is not numeric!');
            return false;
        }
        
        $result = (int)$this->all[0];
        $this->version = $result;
        return true;
        
    }
    
    /**
     * Returns the download URL
     * 
     * @return type
     */
    
    private function getDownloadURL() {
        $this->downloadURL = $this->all[1];
        
        return $this->downloadURL;
    }
}