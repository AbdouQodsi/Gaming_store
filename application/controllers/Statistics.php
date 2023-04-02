<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Statistics_Model');
        $this->load->library('chart');
    }
    public function index() {
        if ($this->session->userdata('Active_login') === TRUE and $this->session->userdata('user_type') === 'Admin' ) {
            $sales_data = $this->Statistics_Model->get_sales_data();
            
            // Prepare the data for the chart
            $chart_data = array();
            foreach($sales_data as $row) {
                $chart_data['labels'][] = $row->product_name;
                $chart_data['data'][] = (int) $row->sales;
            };
            $chart_properties = array(
                'type' => 'bar',
                'data' => array(
                    'labels' => $chart_data['labels'],
                    'datasets' => array(
                        array(
                            'label' => 'Sales',
                            'data' => $chart_data['data'],
                            'backgroundColor' => '#8b57c6',
                            'borderColor' => '#8b57c6',
                            'borderWidth' => 1
                        )
                    )
                ),
                'options' => array(
                    'scales' => array(
                        'yAxes' => array(
                            array(
                                'ticks' => array(
                                    'beginAtZero' => true
                                )
                            )
                        )
                    )
                )
            );
            
            // Create the chart
        
            $data['chart'] = $this->chart->generate($chart_properties);
            $this->load->view('Statistics_v', $data);
            
        }
    }
}
