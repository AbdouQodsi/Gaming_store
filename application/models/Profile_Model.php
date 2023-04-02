<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_Model extends CI_Model
{

    var $table = 'user';
    

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function get_user($id){
      $this->db->where('id', $id);
      $query = $this->db->get($this->table);
      return  $query->row();
    }
    public function update_entry($arrayName,$id){
      $this->db->where('id', $id);
      if ($this->db->update('user', $arrayName)) {
        return true;
      }else {
        return false;
      }
    }

}