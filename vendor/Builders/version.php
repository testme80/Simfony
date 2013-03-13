<?php

use Framework\Update\CheckForUpdates;
use Framework\Update\Updater;

class Version {
    function __construct() {
        $update = new CheckForUpdates();
        $url = $update->downloadURL;
        new Updater($url);
        
    }
}