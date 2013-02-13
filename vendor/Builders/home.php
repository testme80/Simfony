<?php

use Framework\Http\Get\HttpGET;

class Home {
    
    function __construct() {
        echo 'This is the homepage!';
        
        HttpGET::import($array);
        
    }
}