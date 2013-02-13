<?php

namespace Framework\EventManager;
use Framework\Debugging;

class EventManager {

    static public function msg($message, $model, $createError = false) {

        $filepath = './vendor/Builders/' . $model . '.php';

        if (!EventManager::file_included($model)) {
            include_once($filepath);
        }
        
        if ($createError == true) {
            $errorLog = new Debugging\ErrorDebugging;
            $errorLog->logWrite($message);
            $errorLog->logClose();
        }

        $message = EventManager::newModel(htmlentities($message));
        new $model($message);

        return true;
    }

    static public function exception($name) {
       $ex = new \FW_Exception;
       $ex->create($name);
       
       return true;
    }

    static public function file_included($file) {
        $included_files = get_included_files();

        foreach ($included_files as $filePath) {
            if (strpos($filePath, $file)) {
                return true;
            }
        }

        return false;
    }

    static private function newModel($msg) {
        return '<br />' . $msg . '<br />';
    }

}