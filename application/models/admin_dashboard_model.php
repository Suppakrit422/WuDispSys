<?php

class admin_dashboard_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
    
    
    public function selectstudentname(){
        $admin = $this->session->userdata('admin');
        $this->db->select('*');
        $this->db->from('personnel');
        $this->db->where('username',$admin);
        $query = $this->db->get();
        $admin = array();
        $admin = $query->result_array();
        if($admin > 0){
            return $admin;
        }else{
            return false;
        }
     }

     
    
    
}