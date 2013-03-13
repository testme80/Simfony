<?php

namespace Framework\EventManager;
use Framework\Debugging;

class EventManager {
    
    /**
     * 
     * Display the user an message
     * 
     * @param type $message
     * @param type $model
     * @param type $createError
     * @return boolean
     */

    static public function msg($message, $model, $createError = false) {

        $filepath = './vendor/Builders/' . $model . '.php';

        if (!EventManager::file_included($model)) {
            include_once($filepath);
        }
        
        if ($createError == true) {
            self::addError('File ' . $filepath . ' can not been included, does the file exists?', 'EventManager\Create-Error');
        }

        $message = EventManager::newModel(htmlentities($message));
        new $model($message);

        return true;
    }
    
    /**
     * Import an view
     * 
     * @param type $view
     * @return boolean
     */
    
    static public function importView($view) {
        if (!self::file_included('vendor/Views/' . $view . '.php')) {
            if (file_exists('vendor/Views/' . $view . '.php')) {
                include('vendor/Views/' . $view . '.php');
            } else {
                self::addError('View ' . $view . ' can not been included!');
                self::exception('FileNotFoundException');
                return false;
            }
        }
        
        new $view();
        return true;
    }
    
    /**
     * Create an exception using the exception handler
     * 
     * @param type $name
     * @return boolean
     */

    static public function exception($name) {
       $ex = new \FW_Exception;
       $ex->create($name);
       return true;
    }
    
    /**
     * Add an error to the error-log
     * 
     * @param type $error
     * @return boolean
     */
    
    static public function addError($error, $from = null) {
        $errorLog = new Debugging\ErrorDebugging;
        $errorLog->logWrite($error, $from);
        $errorLog->logClose();
        
        return true;
    }
    
    /**
     * Check if an file has been included
     * 
     * @param type $file
     * @return boolean
     */

    static public function file_included($file) {
        $included_files = get_included_files();

        foreach ($included_files as $filePath) {
            if (strpos($filePath, $file)) {
                return true;
            }
        }

        return false;
    }
    
    /**
     * Create a new model/builder
     * 
     * @param type $msg
     * @return type
     */

    static private function newModel($msg) {
        return '<br />' . $msg . '<br />';
    }

}