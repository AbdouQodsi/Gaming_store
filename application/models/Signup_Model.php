<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup_Model extends CI_Model
{

    var $table = 'user';
    

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function insert_entry($data){
        return $this->db->insert('user', $data);
    }
    public function login($email, $password) {
      $this->db->limit(1);
      $this->db->where('email', $email);
      $this->db->where('password', $password);
      $this->db->from('user');
      // $result = $this->db->get_where('user',array('email'=> $email));
      $query = $this->db->get();
      // $this->db->limit(1);
      // $query = $this->db;
      if ($query->num_rows() > 0) {
        return $query;
      } else {
        return FALSE;
      }
    // return $query;
    }
  function validate($email)
  {
    $this->db->limit(1);
    // $this->db->where('password', $password);
    // $this->db->where('verification_code',1);
    $result = $this->db->get_where('user', array('email' => $email));
    if ($result->num_rows() > 0) {
      return $result;
    } else {
      return FALSE;
    }
  }

}