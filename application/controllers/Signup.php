<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Signup_Model');
		$this->load->library(['form_validation','session']);
		$this->load->helper(array('form', 'url'));
		$this->load->helper('cookie');
		$this->load->database();
	}

	public function index(){ 
		if ($this->session->userdata('Active_login') === TRUE  ) {
			redirect('Profile/index');
		}else{
			$data = [
				'title' => 'Sign up',
				'pagetitle' => 'Sign up',
				'js' => 'Signup',
			];
			$this->load->view('Login', $data);
		}
	}

	public function insert()
	{
		$this->form_validation->set_rules('first_name', 'Nom', 'trim');
		$this->form_validation->set_rules('last_name', 'Prenon', 'trim|required');
		$this->form_validation->set_rules('adresse', 'adresse', 'trim');
		$this->form_validation->set_rules('phone', 'phone', 'trim');
		$this->form_validation->set_rules('email', 'email', 'trim');
		$this->form_validation->set_rules('password', 'password', 'trim');
		$this->form_validation->set_rules('confirm_password', 'confirm_password', 'trim|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			$dataa = array('Error' => 'error', 'mssage' => validation_errors());
		} else {
			$ajax_data = array(
				// id hach
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'adresse' => $this->input->post('adresse'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			);
			if ($this->Signup_Model->insert_entry($ajax_data)) {
				$dataa = array('Error' => 'Success', 'mssage' => 'Validation Success');
				redirect('Signup/index');

			} else {
				$dataa = array('Error' => 'Error', 'mssage' => 'Failed to add User');
			}
			
		}	
	}

	public function login()
	{
		$this->form_validation->set_rules('logemail', 'email', 'trim|required');
		$this->form_validation->set_rules('logpass', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data = array('Error' => 'error', 'message' => validation_errors());
		} else {
			// $password=$this->security->xss_clean($this->input->post('logpass'));
			// $email=$this->security->xss_clean($this->input->post('logemail'));

			$email = $this->input->post('logemail');
			$password = $this->input->post('logpass');
			$username_varif = $this->Signup_Model->validate($email);
			if ($username_varif == FALSE) {
				redirect("Signup/logout");
				$response = array('success' => false, 'message' => 'Wrong Information');
			} else {
				$passwordv = $username_varif->row('password');
				if (password_verify($password, $passwordv)) {
					$data_user = $username_varif->row();
					$user_data = array(
						'id' => $data_user->id,
						'first_name' => $data_user->first_name,
						'last_name' => $data_user->last_name,
						'email' => $data_user->email,
						'user_type' => $data_user->type,
						'adresse' => $data_user->adresse,
						'Active_login' => TRUE,
					);
					$this->session->set_userdata($user_data);
					// redirect('Welcome');
					$response = array('success' => true, 'message' => 'Login Successful');
				} else {
					$response = array('success' => false, 'message' => 'Wrong Information');
					
				}
				
			
			
			}
			echo json_encode($response);
		}
	}
	public function logout()
	{ 
		$this->session->sess_destroy();
	  redirect("Signup");
	}

}