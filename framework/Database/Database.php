<?php

namespace Framework\Database;
use Framework\DatabaseHandler\Handler;

class Database {
    
    private $query, $args;
    
    function __construct() {
        Handler::create();
    }
    
    /**
     * Sets the query
     * 
     * @param type $query
     */
    
    public function setQuery($query) {
        $this->query = $query;
    }
    
    /**
     * Sets the arguments for the query
     * 
     * @param type $args
     * @return boolean
     */
    
    public function setArgs($args = array()) {
        if (!is_array($args)) {
            return false;
        }
        
        $this->args = $args;
    }
    
    /**
     * Execute the query
     */
    
    public function execute() {
        if (!isset($this->args) || !isset($this->query)) {
            return false;
        }
        
        if (!is_array($this->args)) {
            return false;
        }
        
        $res = Handler::queryBind($this->query, $this->args);
        return $res;
       
    }
}