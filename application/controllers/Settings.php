<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Settings_Model');

    }


	public function index() {
		if ($this->session->userdata('Active_login') === TRUE  ) {
			$this->db->select('last_notify, updates_notify, Events_notify');
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->from('user');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
		$row = $query->row();
		$value1 = $row->last_notify;
		$value2 = $row->updates_notify;
		$value3 = $row->Events_notify;
		};
		$data['checked'] = ($value1 == 'on') ? 'checked' : '';
		$data['my_checkbox2'] = ($value2 == 'on') ? 'checked' : '';
		$data['my_checkbox3'] = ($value3 == 'on') ? 'checked' : '';
		$this->load->view('setting', $data);
			  }
		
		
	}


	public function insert()
	{
			$this->form_validation->set_rules('my_checkbox1', 'Nom', 'trim');
			$this->form_validation->set_rules('my_checkbox2', 'updates_notify', 'trim');
			$this->form_validation->set_rules('my_checkbox3', 'Events_notify', 'trim');
			if ($this->form_validation->run() == FALSE) {
				$data = array('Error' => 'error', 'message' => validation_errors());
				// echo "NO NO";
			} else {
				

				if ($this->session->userdata('Active_login')==TRUE){

					$id_value = $this->session->userdata('id');
					$checkbox1_value = $this->input->post('my_checkbox1');
					$checkbox2_value = $this->input->post('my_checkbox2');
					$checkbox3_value = $this->input->post('my_checkbox3');

					if ($checkbox1_value == 'on') { $checkbox1_value = 'on'; }else{ $checkbox1_value = 'off';}
					if ($checkbox2_value == 'on') { $checkbox2_value = 'on'; }else{ $checkbox2_value = 'off';}
					if ($checkbox3_value == 'on') { $checkbox3_value = 'on'; }else{ $checkbox3_value = 'off';}
					$data = array(
						'last_notify' => $checkbox1_value,
						'updates_notify' => $checkbox2_value,
						'Events_notify' => $checkbox3_value,
					);

					if ($this->Settings_Model->insert_info($data,$id_value)) {
						$data = array('Error' => 'Success', 'message' => 'validation Success');
	
					} else {
						$data = array('Error' => 'Error', 'message' => 'Failed to add User');
					}


				} else {
				echo "NO NO";
				}


			}
			echo json_encode($data);
		
	}

}
