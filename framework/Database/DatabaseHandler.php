<?php

namespace Framework\DatabaseHandler;

use Framework\EventManager\EventManager;
use Framework\Store\Storage\SessionStorage;

class Handler {

    private $type, $db, $args;

    /**
     * Create the database
     */
    static public function create() {
        $type = SessionStorage::get('DB_TYPE');

        if (!isset($type)) {
            EventManager::msg('DB Type has not been specifeded!', 'error');
        }

        Handler::$type();
    }

    /**
     * Create an MySQL Port
     */
    static private function MYSQL() {
        $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USERNAME, PASSWORD);
    }

    /**
     * Create an MySQLi Port
     */
    
    static private function MYSQLI() {
        
    }

    /**
     * Bind the query with the arguments
     * 
     * @param type $query
     * @param type $args
     * @return type
     */
    static public function queryBind($query, $args) {
        $query = $this->db->prepare($query);

        foreach ($args as $arg) {
            $query->bindValue($arg);
        }

        $query->execute();
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
    
    /**
     * Pull data out of the db, as an string
     * 
     * @param type $argumentsSelect
     * @param type $args
     * @return type
     */
    
    static public function pullDataString($argumentsSelect = array(), $args) {
        $this->args = $argumentsSelect;
        $defaultTable = DEFAULT_TABLE;
        
        if (isset($defaultTable)) {
            return mysql_result(mysql_query("SELECT `$argumentsSelect[0]` FROM `$defaultTable`"), 0);
        } else {
            return mysql_result(mysql_query("SELECT `$argumentsSelect[0]` FROM `table!`"), 0);
        }
    }
}