<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
		$this->load->model('Profile_Model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
    }


	public function index() {
		if ($this->session->userdata('Active_login') === TRUE  ) {
			$this->load->view('Profile_V');
		}else {
			redirect('Signup/index');
		}
		
	}
	public function Get_Profile() {
		if ($this->session->userdata('Active_login') == FALSE   ) {
			redirect("Signup/login");
		} else {
			$id = $this->session->userdata('id');
			$data_user=$this->Profile_Model->get_user($id);
			$output = array(
				"first_name" => $data_user->first_name, 
				"last_name" => $data_user->last_name, 
				"email" =>$data_user->email, 
				"adresse" =>$data_user->adresse,
				"phone" =>$data_user->phone,
				"city" =>$data_user->city,
				"country" =>$data_user->country,
				"postal_code" =>$data_user->postal_code,
				"username" =>$data_user->username,
			);
			echo json_encode($output);
		}
	  
	}
	public function profile_update(){
		if ($this->session->userdata('Active_login') == FALSE   ) {
				redirect("Signup/login");
		} else {
			$this->form_validation->set_rules('first_name', 'Nom', 'trim');
			$this->form_validation->set_rules('last_name', 'Prenon', 'trim|required');
			$this->form_validation->set_rules('adresse', 'adresse', 'trim');
			$this->form_validation->set_rules('username', 'username', 'trim');
			$this->form_validation->set_rules('phone', 'phone', 'trim');
			$this->form_validation->set_rules('email', 'email', 'trim');
			$this->form_validation->set_rules('city', 'city', 'trim');
			$this->form_validation->set_rules('country', 'country', 'trim');
			$this->form_validation->set_rules('postal_code', 'postal_code', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$dataa = array('msg' => 'error', 'message' => validation_errors());
			} else {
				$id = $this->session->userdata('id'); 
				$arrayName = array('first_name' => $this->input->post('first_name'), 
									'last_name' => $this->input->post('last_name'), 
									'email' => $this->input->post('email'), 
									'adresse' => $this->input->post('adresse'),
									'phone' => $this->input->post('phone'),
									'city' => $this->input->post('city'),
									'country' => $this->input->post('country'),
									'postal_code' => $this->input->post('postal_code'),
									'username' => $this->input->post('username'),
									
								);
				if ($this->input->post('password')  ) {
					$arrayName['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}

				if ($this->Profile_Model->update_entry($arrayName,$id) == true) {
					$dataa = array('msg' => 'Succes', 'message' => 'Record update Successfully');
				} else {
					$dataa = array('msg' => 'error', 'message' => 'Failed to update record');
				}
			}
			echo json_encode($dataa);
		}
	}

}
