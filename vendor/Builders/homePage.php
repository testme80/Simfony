<?php

use Framework\Data\Import;
use Framework\Data\Chart;
use Framework\UrlParser\UrlParser;

class homePage {
    
    private function parseText($text) {
        echo $text;
        return true;
    }

    function __construct() {
        $this->parseText('HEllo! <br />');
        $url = new UrlParser();
        $url->getAllArguments();
    }

}

