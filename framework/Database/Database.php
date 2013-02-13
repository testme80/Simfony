<?php

namespace Framework\Database;
use Framework\DatabaseHandler\Handler;

class Database {
    function __construct() {
        Handler::create();
    }
}