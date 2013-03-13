<?php

namespace Framework\Form;

class Parser {
    
    /**
     * 
     * Generate an new HTML Form
     * 
     * @param type $name
     * @param type $method
     * @param type $auto
     * @param type $action
     * @return type
     */
    
    public function createForm($name, $method, $auto = true, $action = null) {
        if ($auto == TRUE) {
            // Auto generate!
            
            return '
               <form action="' . preg_replace('/\.php$/', '', __FILE__) . '
               name="' . $name . '"  method="post">   
            ';
        } else {
            // Manaul generate!
            
            return '
                <form action="' . $action . '"
                name="' . $name . '" method="' . $method . '">
            ';
        }
    }
    
    /**
     * End the HTML Form
     */
    
    public function endForm() {
        echo '</form>';
    }
    
    /**
     * Creates colored text
     * 
     * @param type $input
     */
    
    public function colorText($input = array()) {
        echo '<a style="color: ' . $input[1] . '">' . $input[0] . '</a>';
        return;
    }
    
    /**
     * Modify an specified text
     * 
     * @param type $input
     * @return type
     */
    
    public function text($input = array()) {
        if (!is_array($input)){return;}
        
        echo '<a style="text-align: ' . $input[1] . '">' . $input[0] . '</a>';
        return;
    }
    
}