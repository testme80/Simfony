<?php

namespace Framework\DatabaseConstructor;
use Framework\Store\Storage\SessionStorage;

class Constructor {
    private $array = array();
    
    /**
     * Construct the Default DB Adapter and generate this with SessionStorage
     * 
     * @param type $type
     * @return boolean
     */
    
    function __construct($type) {
        if ($type == 'DefaultAdapter') {
            array_push($this->array ,'MYSQL');
        }
        
        SessionStorage::set('DB_TYPE', $this->array[0]);
        return true;
    }
}