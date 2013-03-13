<?php

namespace Framework\DependencyInjection;
use Framework\EventManager\EventManager;

class DataChecker {
    
    /**
     * Checks if an item exists in an specifed array
     * 
     * @param type $array
     * @param type $search
     * @return boolean
     */
    
    public function itemArrayExists($array, $search) {
        if ($this->isArray($array)) {
            foreach ($array as $item) {
                if ($item == $search) {
                    return true;
                }
            }
            
            return false;
        } else {
            EventManager::addError('Item is not an array!');
        }
    }
    
    /**
     * Check if input is an real array
     * 
     * @param type $array
     * @return boolean
     */
    
    public function isArray($array) {
        if (is_array($array)) {
            return true;
        }
        return false;
    }
}
