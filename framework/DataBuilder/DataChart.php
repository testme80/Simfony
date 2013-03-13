<?php

namespace Framework\Data;

class Chart {
    /**
     * Chart Types
     * */

    const LINE_CHART = 'lc';
    const LINE_CHART_SPARKLINE = 'ls';
    const LINE_CHART_XY = 'lxy';
    const BAR_CHART = 'bhs';
    const BAR_CHART_VERTICAL = 'bvs';
    const BAR_CHART_HORIZONTAL_GROUPED = 'bhg';
    const BAR_CHART_VERTICAL_GROUPED = 'bvg';
    const PIE_CHART = 'p';
    const PIE_CHART_THREED = 'p3';
    const PIE_CHART_CONCENTRIC = 'c';
    const RADAR_CHART = 'r';
    const RADER_CHART_SPLINES = 'rs';
    const SCATTER_PLOT = 's';
    const QR_CODE = 'qr';
    const O_METER = 'gm';

    /**
     * Colors
     */
    const BLACK = '000000';
    const SILVER = 'C0C0C0';
    const GRAY = '808080';
    const WHITE = 'FFFFFF';
    const MAROON = '800000';
    const RED = 'FF0000';
    const PURPLE = '800080';
    const GREEN = '008000';
    const YELLOW = 'FFFF00';
    const BLUE = '005BB7';

    private $charType;
    private $legend;
    private $values;
    private $colors;
    private $size;
    private $title;
    
    /**
     * Construct DataChart
     * 
     * @param type $type
     * @param type $data
     * @param type $colors
     * @param type $title
     * @param type $size
     */

    public function __construct($type, $data, $colors = null, $title = null, $size = '300x225') {
        $this->setCharType($type);
        $this->setLegend($data);
        $this->setValues($data);
        $this->size = $size;

        if ($colors !== null) {
            $this->setColors($colors);
        }

        if ($title !== null) {
            $this->setTitle($title);
        }
    }

    /**
     * Retourneerd je grafiek (chart)
     *
     * @return String [html]
     * */
    public function getChart() {
        return '<img src="' . $this->generateCode() . '" />';
    }

    /**
     * Stel je grafiek type in, dit moet via een constante van deze chart-class
     * Vb. Chart::PIE_CHART
     *
     * @param String $type
     * @return void
     * */
    public function setCharType($type) {
        $this->charType = $type;
    }

    /**
     * Stel de data in voor de grafiek.
     * Dit gebeurt via een associatieve array waarbij de index de legende is, en de gekoppelde waarde de waarde is.
     * vb.
     * $data = array('legende1' => 2, 'legende2' => 6)
     *
     * @param Array $data
     * @return void
     * */
    public function setData($data) {
        $this->setLegend($data);
        $this->setValues($data);
    }

    /**
     * Stelt de grafiek titel in
     *
     * @param String $str
     * @return void
     * */
    public function setTitle($str) {
        $str = str_replace(' ', '+', $str);
        $this->title = $str;
    }

    /**
     * Genereerd de "code", en retourneerd een url voor je chart.
     *
     * @return String
     * */
    private function generateCode() {
        $url = '//chart.googleapis.com/chart';
        $url .= '?chs=' . $this->size;
        $url .= '&cht=' . $this->charType;
        $url .= $this->legend;
        $url .= $this->values;

        if (!empty($this->colors)) {
            $url .= $this->colors;
        }

        if (!empty($this->title)) {
            $url .= '&chtt=' . $this->title;
        }

        return $url;
    }

    /**
     * Stel de legende in, dit moet via een array.
     * De index van de legende moet overeenkomen met de index van de waarden
     *
     * @param Array $data
     * @return void
     * */
    private function setLegend($data) {
        $legend = '&chdl=';
        $i = 0;

        foreach ($data as $lName => $val) {
            $lName = str_replace(' ', '+', $lName);
            $legend .= ($i++ == 0) ? $lName : '|' . $lName;
        }

        $this->legend = $legend;
    }

    /**
     * Geef de waarden door, dit moet via een array.
     *
     * @param Array $data
     * @return void
     * */
    private function setValues($data) {
        $vals = '&chd=t:';
        $i = 0;

        foreach ($data as $lName => $val) {
            if (is_numeric($val)) {
                $vals .= ($i++ == 0) ? $val : ',' . $val;
            }
        }

        $this->values = $vals;
    }

    /**
     * Stel de kleuren in.
     *
     * @param Array $colors
     * @return void
     * */
    public function setColors($colors) {
        $str = '&chco=';
        $i = 0;

        foreach ($colors as $color) {
            $color = str_replace('#', '', $color);
            $str.= ($i++ == 0) ? $color : ',' . $color;
        }

        $this->colors = $str;
    }

    /**
     * Stel de grootte in.
     * Groote volgens volgend formaat (XxY) vb(250x150)
     *
     * @param String $str
     * @return void
     * */
    public function setSize($str) {
        $this->size = $str;
    }

}