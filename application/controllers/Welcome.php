<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Product_model');
    }


	public function index() {
		$data                    = array();
		$data['get_all_product'] = $this->Product_model->get_all_product();
		$this->load->view('home',$data);
	}
	public function searchV() {
		$data                    = array();
		$data['get_all_product'] = $this->Product_model->get_all_product();
		$this->load->view('home',$data);
	}
	public function cod() {
		$this->load->view('Coditions');
	}
	public function CONFIDENTIALITY() {
		$this->load->view('confidentiality');
	}

	public function Mouse() {
		$data                    = array();
		$data['mouse_product'] = $this->Product_model->get_all_product_mouse();
		$this->load->view('mouse', $data);
	}
	public function Headphones() {
		$data                    = array();
		$data['headphones_product'] = $this->Product_model->get_all_product_headphones();
		$this->load->view('headphones', $data);
	}
	public function Gamepad() {
		$data                    = array();
		$data['gamepad_product'] = $this->Product_model->get_all_product_gamepad();
		$this->load->view('gamepad', $data);
	}
	public function Glasses() {
		$data                    = array();
		$data['glasses_product'] = $this->Product_model->get_all_product_glasses();
		$this->load->view('glasses', $data);
	}
	public function keyboards() {
		$data                    = array();
		$data['keyboards_product'] = $this->Product_model->get_all_product_keyboards();
		$this->load->view('keyboards', $data);
	}
	public function Computer() {
		$data                    = array();
		$data['Computer_product'] = $this->Product_model->get_all_product_Computer();
		$this->load->view('Computer', $data);
	}
	public function Games() {
		$data                    = array();
		$data['Games_product'] = $this->Product_model->get_all_product_Games();
		$this->load->view('Games', $data);
	}
	public function favorite() {
		if ($this->session->userdata('Active_login') === TRUE  ) {
			$user_id = $this->session->userdata('id');
	
			// Get user's favorite products
			$this->db->select('product.*');
			$this->db->from('favorite');
			$this->db->join('product', 'product.product_id = favorite.product_id');
			$this->db->where('favorite.user_id', $user_id);
			$query = $this->db->get();
		
			$data['products'] = $query->result();
			$this->load->view('Favorite_v', $data);
			  }else {
				redirect('Signup/index');
			  }

	}
	public function add_to_favorites($product_id)
	{
		// Check if user is logged in
		if (!$this->session->userdata('id')) {
			redirect("Signup/login"); // redirect to login page
			echo 'no non';
		}

		// Get user ID
		$user_id = $this->session->userdata('id');
		// $product_id = 6;

		// Check if product already in favorites
		$this->db->where('user_id', $user_id);
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('favorite');

		if ($query->num_rows() > 0) {
			// Product already in favorites, show message and redirect
			$this->session->set_flashdata('message', 'Product already in favorites');
			redirect('Product/product_details/'.$product_id);
		}

		// Add product to favorites
		$data = array(
			'user_id' => $user_id,
			'product_id' => $product_id
		);
		$this->db->insert('favorite', $data);

		// Show success message and redirect
		$this->session->set_flashdata('message', 'Product added to favorites');
		redirect('Product/product_details/'.$product_id);
	}

	public function search() {
		$search = $this->input->get('search');
		if (!empty($search)) {
            $data                    = array();
            $data['get_all_product'] = $this->Product_model->get_all_search_product($search);
            $data['search']          = $search;
			echo $search;

            if ($data['get_all_product']) {
				$this->load->view('search', $data);
            } else {
                redirect('Welcome');
            }
        } else {
            redirect('Welcome');
        }
    }

}
