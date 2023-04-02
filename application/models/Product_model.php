<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model
{
  // var $table = 'user';
  public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function get_data() {
      // $query = $this->db->query('select * from product');
      $query = $this->db->get('product');
      return $query->result();
    }
    

    public function add_product($data) {
      return $this->db->insert('product', $data);
    }

    public function get_user($id){
      $this->db->where('product_id', $id);
      $query = $this->db->get('product');
      return  $query->row();
    }
    public function edit_user($id){
      $this->db->select("*");
      $this->db->from("product");
      $this->db->where("product_id", $id);
      $query = $this->db->get();
      if (count($query->result()) > 0) {
          return $query->row();
      }
    }
    public function update_entry($arrayName,$id){
      $this->db->where('product_id', $id);
      if ($this->db->update('product', $arrayName)) {
        return true;
      }else {
        return false;
      }
    }
    public function delete_record($id){
      $this->db->where('product_id', $id);
      if ($this->db->delete('product')) {
       return true;
      }
    }

    public function multiple_images($image = array()){

      return $this->db->insert_batch('product',$image);
              }

    public function get_all_product()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->order_by('product.product_quantity', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_product_mouse()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_category',"COMPUTER MOUSE");
        // $this->db->order_by('product.product_id', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }
    public function get_all_product_headphones()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_category',"GAME HEADPHONES");
        $info = $this->db->get();
        return $info->result();
    }
    public function get_all_product_gamepad()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_category',"GAMEPADS");
        $info = $this->db->get();
        return $info->result();
    }
    public function get_all_product_glasses()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_category',"VR GLASSES");
        $info = $this->db->get();
        return $info->result();
    }
    public function get_all_product_keyboards()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_category',"KEYBOARDS");
        $info = $this->db->get();
        return $info->result();
    }
    public function get_all_product_Computer()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_category',"COMPUTERS");
        $info = $this->db->get();
        return $info->result();
    }
    public function get_all_product_Games()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_category',"GAMES");
        $info = $this->db->get();
        return $info->result();
    }

    public function get_product_by_id($id) {
      $this->db->select('*');
      $this->db->from('product');
      $this->db->where('product_id', $id);
      $query = $this->db->get();
      return $query->row();
  }


  public function get_single_product($id)
  {
      $this->db->select('*');
      $this->db->from('product');
      $this->db->where('product_id', $id);
      $info = $this->db->get();
      return $info->row();
  }


  public function get_product_details($product_id)
  {
      $this->db->select('*');
      $this->db->from('product');
      $this->db->where('product_id', $product_id);
      $query = $this->db->get();
      return $query->row();
  }
  public function get_all_search_product($search)
{
    $this->db->select('*');
    $this->db->from('product');

    $this->db->order_by('product.product_id', 'DESC');
    $this->db->like('product.product_name', $search, 'both');
    $this->db->or_like('product.product_description', $search, 'both');
    $this->db->or_like('product.product_category', $search, 'both');
    $this->db->or_like('product.product_brand', $search, 'both');
    $info = $this->db->get();
    return $info->result();
}



}