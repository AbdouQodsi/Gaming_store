<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Statistics_Model extends CI_Model
{
    
    public function get_sales_data() {
        $this->db->select('product_name,SUM(quantity) AS sales');
        $this->db->from('order_items');
        $this->db->join('product', 'product.product_id = order_items.productid');
        $this->db->group_by("product_name");
        $info = $this->db->get();
        return $info->result();
    }


    // after 
    public function Add_favorite() {
        $this->db->select('product_name,count(favorite.product_id) AS num');
        $this->db->from('favorite');
        $this->db->join('product', 'product.product_id = favorite.product_id');
        $this->db->group_by("product_name");
        $info = $this->db->get();
        return $info->result();
    }



}