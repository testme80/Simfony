<?php

namespace Framework\DatabaseConstructor;

class Constructor {
    private $array = array();
    
    function __construct($type) {
        if ($type == 'DefaultAdapter') {
            array_push($this->array, 'MYSQL');
        }
        
        $_SESSION['DB_TYPE'] = $this->array[0];
        return true;
    }
}