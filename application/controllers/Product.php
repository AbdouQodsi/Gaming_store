<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
		$this->load->model('Product_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
    $this->load->library('encryption');
    $this->load->library('upload');
    }


	public function index() {
    if ($this->session->userdata('Active_login') === TRUE and $this->session->userdata('user_type') === 'Admin' ) {
      $this->load->view('Product_v');
		}
	}
	public function get() {
		$list = $this->Product_model->get_data();
		$data = array();
    
  
    foreach ($list as $format) {
      $edit="<div class='row'><div class='col'><a data-toggle='tooltip' data-placement='top' title='Edit' class='btn btn-outline-secondary btn-sm edit' onclick='edit(".$format->product_id.")'><i class='mdi mdi-pencil font-size-18'></i></a></div>";
      $delete="<div class='col-auto '><a class ='btn btn-outline-secondary btn-sm edit pull-right'  data-toggle='tooltip' data-placement='top' title='Delete'  id='Delete_Did' onclick='delete_user(".$format->product_id.")'><i class='mdi mdi-trash-can font-size-18'></i></a></div></div>";
      
      $row = array();
      
      $row[] = "<img src='" . base_url("Upload/" . $format->product_image) . "' style='width:100px'/>";

      
      $row[]= $format->product_name;
      $row[]= $format->product_price;
      $row[]= $format->product_quantity;
      $row[]= $format->product_brand;
      $row[]= $format->product_category;
      $row[]= $format->published_date;
      $row[]= $edit." ".$delete; 
      $data[] = $row;
    }
    $output = array(
      "data" => $data,
    );
    echo json_encode($output);
	}

  private function set_upload_options()
  {   
    //upload an image options
    $config = array();
    $config['upload_path'] = 'Upload/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['overwrite']     = FALSE;
    return $config;
  }
  public function insert_data() {
    $this->form_validation->set_rules('product_name', 'Nom', 'trim');
    $this->form_validation->set_rules('product_price', 'Price', 'trim');
    // $this->form_validation->set_rules('product_image', 'image', 'trim');
    $this->form_validation->set_rules('published_date', 'Date', 'trim');
    $this->form_validation->set_rules('product_brand', 'Brand', 'trim');
    $this->form_validation->set_rules('product_description', 'Description', 'trim');
    $this->form_validation->set_rules('product_quantity', 'Quantity', 'trim');
    $this->form_validation->set_rules('product_category', 'Category', 'trim'); 
    if ($this->form_validation->run() == FALSE) {
      $dat = array('prbl' => 'error', 'message' => validation_errors());
    } else {
      $this->upload->initialize($this->set_upload_options());
      if (!$this->upload->do_upload('image_product')) {
        $error = $this->upload->display_errors();
        echo $error;
    } else {
        $imageData = $this->upload->data();
        $string = $imageData['file_name'];
        
        $dataa = array(
            'product_name' => $this->input->post('product_name'),
            'product_price' => $this->input->post('product_price'),
            'product_image' => $string,
            'product_description' => $this->input->post('product_description'),
            'product_brand' => $this->input->post('product_brand'),
            'product_category' => $this->input->post('product_category'),
            'product_quantity' => $this->input->post('product_quantity'),
            'published_date' => $this->input->post('published_date'),
        );  
        
        if ($this->Product_model->add_product($dataa)) {
            $dat = array('prbl' => 'Success', 'message' => 'validation Success');
        } else {
            $dat = array('prbl' => 'error', 'message' => 'Failed to add User');
        }
        echo json_encode($dat);
    }
  }
    
  }

public function Get_User() {
  $id= $this->input->post('product_id');
  $data_user=$this->Product_model->get_user($id);
  $outpute = array(
    "product_id" =>$this->encryption->encrypt($data_user->product_id), 
    "product_name" => $data_user->product_name,  
    "product_price" => $data_user->product_price, 
    "product_image" =>$data_user->product_image,
    'product_description' =>$data_user->product_description,
    'product_brand' => $data_user->product_brand,
    'product_category' => $data_user->product_category,
    'product_quantity' => $data_user->product_quantity,
    'published_date' => $data_user->published_date,
  );
  echo json_encode($outpute);
}


public function Edit_Users(){
  $this->form_validation->set_rules('product_name', 'Nom', 'trim|required');
  $this->form_validation->set_rules('product_price', 'Price', 'trim|required');
  $this->form_validation->set_rules('product_imag', 'image', 'trim|required');
  $this->form_validation->set_rules('published_date', 'Date', 'trim|required');
  $this->form_validation->set_rules('product_brand', 'Brand', 'trim|required');
  $this->form_validation->set_rules('product_description', 'Description', 'trim|required');
  $this->form_validation->set_rules('product_quantity', 'Quantity', 'trim|required');
  $this->form_validation->set_rules('product_category', 'Category', 'trim|required'); 
 
  if ($this->form_validation->run() == FALSE) {
    $data = array('msg' => 'error', 'message' => validation_errors());
  } else {
     $id = $this->encryption->decrypt($this->input->post('product_id')); 

    $arrayName = array(
      'product_id' => $id,
      'product_name' => $this->input->post('product_name'),
      'product_price' => $this->input->post('product_price'),
      // 'product_image' => $this->input->post('product_image'),
      'product_description' => $this->input->post('product_description'),
      'product_brand' => $this->input->post('product_brand'),
      'product_category' => $this->input->post('product_category'),
      'product_quantity' => $this->input->post('product_quantity'),
      'published_date' => $this->input->post('published_date'),
    );
    if ($this->Product_model->update_entry($arrayName,$id) == true) {
        $data = array('msg' => 'Success', 'message' => 'Record update Successfully');
    } else {
        $data = array('msg' => 'erro', 'message' => 'Failed to update record');
    }
    echo json_encode($data);
  }
}

public function deleteUser($id){
  
      if ($this->Product_model->delete_record($id)==true)
      {
           $data = array('result' => 'success', 'message' => 'user delete Successfully');            
       }
      else
      {
          $data = array('result' => 'error', 'message' => 'Failed to delete user');            
      }
      echo json_encode($data);
  }

  public function manage_product()
  {
    $data = array();
    $data['get_all_product'] = $this->Product_model->get_all_product();
  }
  public function single($id)
  {
      $data                       = array();
      $data['get_single_product'] = $this->Product_model->get_single_product($id);
      $this->load->view('single', $data);
  }


//  public function View($id) {
//           $data['get_single_product'] = $this->Product_model->get_product_by_id($id);
  
//           $this->load->view('single', $data);
//       }



public function product_details($product_id) {
  
  // Get the product details from the database
  // $product = $this->Product_model->get_product_details($product_id);
  
  // // Load the product view and pass the product details to it
  // $this->load->view('single', array('product' => $product));

  $data                       = array();
  $data['product'] = $this->Product_model->get_product_details($product_id);
  $this->load->view('single', $data);
}







}
