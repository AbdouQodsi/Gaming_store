<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart {

    // public function __construct() {
    //     require_once APPPATH.'libraries\chart\Chart.min.js';
    // }

    public function generate($config = array()) {
        $json_config = json_encode($config);
        $chart = "<canvas id='chart'></canvas>";
        $script = "<script>new Chart(document.getElementById('chart'), $json_config);</script>";
        return $chart . $script;
    }

}
?>