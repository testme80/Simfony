<?php

namespace Framework\Data;

class Parser {

    /**
     * Splits an answer from a string
     * 
     * @param type $string
     * @return type
     */
    
    public function splitToBottom($string) {
        $piece = explode(addslashes($string));
        $piece[1] = str_replace(' ', '', $piece[1]);
        return $piece[1];
    }

    /**
     * Change array[0] to array['name']
     * 
     * @return type
     */
    
    public function array_put_to_position() {
        $count = 0;
        $return = array();
        foreach ($this->array as $k => $v) {
            // insert new object
            if ($count == $this->position) {
                if (!$this->name)
                    $name = $count;
                $return[$name] = $this->object;
                $inserted = true;
            }
            // insert old object
            $return[$k] = $v;
            $count++;
        }
        if (!$name)
            $name = $count;
        if (!$inserted)
            $return[$name];
        $array = $return;
        return $array;
    }

}
