<?php

namespace Framework\Config\Database;

class ConfigDB {
    function get() {
        return array(
            'dbServer' => 'localhost',
            'dbUsername' => 'root',
            'dbPassword' => 'wokkel4',
            'dbName' => 'textme80_db',
            'dbTable' => 'users'
        );   
    }
}