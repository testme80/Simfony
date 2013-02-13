<?php

// Autoload.php

// Load all Framework required files

foreach (glob("framework/*/*.php") as $filename)
{
    include($filename);
}

// Create a new app!

use Framework\App\Application;

if (Application::isPageSet()) {
    Application::loadPage($_GET['page']);
} else {
    Application::loadPage(null);
}

// End of autoload.php