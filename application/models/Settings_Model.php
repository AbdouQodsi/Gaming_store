<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_Model extends CI_Model
{
    
    public function select_info($id){
        $this->db->select('last_notify, updates_notify, Events_notify');
        $this->db->where('id', $id);
        $this->db->from('user');
        $query = $this->db->get();
        
        
    }
    public function insert_info($data , $id){
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
        
    }



}