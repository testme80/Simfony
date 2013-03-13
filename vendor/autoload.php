<?php

// Autoload.php

/**
 * Load all required framework files
 */

include 'framework/Main/config.php';

foreach (glob("framework/*/*.php") as $filename)
{
   
    if (strpos($filename, BANNED_PHPFILES) || $filename == 'framework/Main/config.php' || $filename == 'none') {
        
    } else {
        include($filename);
    }
    
    
}

/**
 * Create an new app!
 */

use Framework\App\Application;

$application = new Application();

if (Application::isPageSet()) {
    $application->loadPage($_GET['page']);
} else {
    $application->loadPage(null);
}
