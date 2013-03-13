<?php

namespace Framework\Data\Render;

class RenderEngine {
    private $initials;
    
    /**
     * Sets the render engine
     * 
     * @param type $toRender
     * @return type
     */
    
    public function setToRender($toRender = array()) {
        if (!is_array($toRender)) {return;}
        
        $this->initials = $toRender;
    }
    
    /**
     * Render the given page(s)
     * 
     * @return boolean
     */
    
    public function render() {
        if (!isset($this->initials)) {return false;}
        
        foreach ($this->initials as $renderItem) {
            include_once ROOT . '/vendor/Views/' . $renderItem . '.php';
        }
        
        
    }
}