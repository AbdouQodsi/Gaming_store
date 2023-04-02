<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart_Model extends CI_Model
{
  public function get_products() {
    $query = $this->db->get('product');
    return $query->result();
  }
  public function get_product_by_id($id){
    $this->db->select('*');
    $this->db->from('product');
    $this->db->where('product_id', $id);
    $info = $this->db->get();
    return $info->row();
  }
  public function insert_order($customer_name, $customer_email, $shipping_address, $order_total) {
    $data = array(
      'user_id' => $customer_name,
      'customer_email' => $customer_email,
      'shipping_address' => $shipping_address,
      'order_total' => $order_total
    );
    $this->db->insert('orders', $data);
    return $this->db->insert_id();
  }

  public function insert_order_item($order_id, $product_id, $quantity, $price) {
    $data = array(
      'order_id' => $order_id,
      'productid' => $product_id,
      'quantity' => $quantity,
      'price' => $price
    );
    $this->db->insert('order_items', $data);
  }
  public function get_order_by_id($order_id)
  {
    $query = $this->db->get_where('orders', array('id' => $order_id));
    return $query->row();
  }
  public function get_email_user($id)
  {
    $this->db->select('email');
    $this->db->from('user');
    $this->db->where('id', $id);
    $info = $this->db->get()->row();
    return $info->email;
  }
  public function get_email_admin()
  {
    $this->db->select('email');
    $this->db->from('user');
    $this->db->where('type','Admin');
    // $this->db->limit(1); 
    $info = $this->db->get()->row();
    if (!$info) {
      // No admin email found, throw an exception or return null
      throw new Exception('No admin email found');
    }
    return $info->email;
  }
  

}