<?php

namespace Framework\Debugging;

class ErrorDebugging {
    
    /**
     * Declare log file and file pointer as private properties
     *
     * @var type 
     */
    
    private $log_file, $fp;
    // set log file (path and name)
    public function lfile($path) {
        $this->log_file = $path;
    }
    
    /**
     * 
     * Writes an message to the log
     * 
     * @param type $message
     */
    
    public function logWrite($message, $from = null) {
        // if file pointer doesn't exist, then open log file
        if (!is_resource($this->fp)) {
            $this->logOpen();
        }
        
        if ($from == null) {
             $script_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
        } else {
            $script_name = $from;
        }
        
        
       
        // define current time and suppress E_WARNING if using the system TZ settings
        // (don't forget to set the INI setting date.timezone)
        $time = @date('[d/M/Y:H:i:s]');
        // write current time, script name and message to the log file
        fwrite($this->fp, "$time ($script_name) $message" . PHP_EOL);
    }
    
    /**
     * Close the log
     */
    
    public function logClose() {
        fclose($this->fp);
    }
    
    /**
     * Open the log
     */
    
    private function logOpen() {
        // in case of Windows set default log file
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $log_file_default = 'c:/xampp/htdocs/Framework2.0/framework/DataBuilder/Logs/errorLog.txt';
        }
        // set default log file for Linux and other systems
        else {
            $log_file_default = '/tmp/logfile.txt';
        }
        // define log file from lfile method or use previously set default
        $lfile = $this->log_file ? $this->log_file : $log_file_default;
        // open log file for writing only and place file pointer at the end of the file
        // (if the file does not exist, try to create it)
        $this->fp = fopen($lfile, 'a') or exit("Can't open $lfile!");
    }
}
