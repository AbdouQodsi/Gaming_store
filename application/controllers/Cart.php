<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cart extends CI_Controller {
	
	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Cart_Model');
    $this->load->library('cart');
    $this->load->library('email');
    $this->load->library('form_validation');
  }

  public function view_cart() {
    if ($this->session->userdata('Active_login') === TRUE  ) {
      $data['cart_items'] = $this->cart->contents();
      $this->load->view('Cart', $data);
    }else {
    redirect('Signup/index');
    }
  }
    
  public function add_to_cart() {
    $product_id = $this->input->post('product_id');
    $product_name = $this->input->post('product_name');
    $price = $this->input->post('price');
    $quantity = $this->input->post('quantity');
    $image = $this->input->post('product_image');
    $brand = $this->input->post('product_brand');
    $data = array(
        'id' => $product_id,
        'image' => $image,
        'brand' => $brand,
        'name' => $product_name,
        'price' => $price,
        'qty' => $quantity
    );
    $this->cart->insert($data);
    redirect('Cart/view_cart');
  }


  //fix later
  public function back(){
    if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      redirect(base_url());
    }
  }
    
  public function home(){
      redirect('Welcome/index');
  }
  public function remove_cart(){
    $data = $this->input->post('rowid');
    $this->cart->remove($data);
    redirect('Cart/view_cart');
  }
  public function update_cart() {
    $data          = array();
    $data['qty']   = $this->input->post('qty');
    $data['rowid'] = $this->input->post('rowid');
    $this->cart->update($data);
    redirect('Cart/view_cart');
  }

  public function checkout() {
    $this->load->library('cart');
    if ($this->cart->total_items() == 0) {
      redirect('Welcome');
    }
    $user_id =  $this->session->userdata('id');
    $customer_email =  $this->session->userdata('email');
    $shipping_address =  $this->session->userdata('adresse');
    
    $order_total = $this->cart->total();
    $order_id = $this->Cart_Model->insert_order($user_id, $customer_email, $shipping_address, $order_total);

    // Insert the order items into the database
    foreach ($this->cart->contents() as $item) {
      $this->Cart_Model->insert_order_item($order_id, $item['id'], $item['qty'], $item['price']);
    }
    $this->cart->destroy();

    // Send a confirmation email to the customer
    $this->send_to_user();
    $this->send_to_Admin();
    redirect('Welcome');
    
  }
  public  function send_to_user(){
    $this->load->library('phpmailer_lib');
    $mail = $this->phpmailer_lib->load();
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'abdouqod2005@gmail.com';
    $mail->Password = 'mammunqzklcwinek';
    $mail->SMTPSecure = 'ssl';
    $mail->Port     = 465;
    $email_user = $this->Cart_Model->get_email_user($this->session->userdata('id'));
    if (!empty($email_user)) {
      $mail->addAddress(trim((string)$email_user));
    } else {
      echo 'error';
    }
    // Email subject
    $mail->Subject = 'Order Completed';
    // Set email format to HTML
    $mail->isHTML(true);
    // Email body content
    $mailContent = '<h1>Congratulations, you have successfully placed an order.</h1>';
    $mail->Body = $mailContent;
    // Send email
    if(!$mail->send()){
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }else{
      echo 'Message has been sent';
    }
  }
  public function send_to_Admin() {
    $this->load->library('phpmailer_lib');
    $mail = $this->phpmailer_lib->load();
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'abdouqod2005@gmail.com';
    $mail->Password = 'mammunqzklcwinek';
    $mail->SMTPSecure = 'ssl';
    $mail->Port     = 465;
    
    $email_admin = $this->Cart_Model->get_email_admin();
    // $mail->addAddress($email_admin);
    if (!empty($email_admin)) {
      $mail->addAddress(trim((string)$email_admin));
    } else {
      echo 'error';
    }
    // Email subject
    $mail->Subject = 'New Order';
    // Set email format to HTML
    $mail->isHTML(true);
    // Email body content
    $mailContent = '<h1>New Order</h1>';
    // $mailContent .= $this->input->post('message');
    $mail->Body = $mailContent;
    // Send email
    if(!$mail->send()){
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }else{
      echo 'Message has been sent';
    }
  }


    
    
}
