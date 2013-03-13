<?php

namespace Framework\Data;

class PageInfo {
    
    /**
     * Returns the currect pagetitle
     * 
     * @return string
     */
    
    public function getPageTitle() {
        return $_GET['page'];
    }
  
}