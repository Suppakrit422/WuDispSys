<?php

class ServiceProfile extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }



    public function selectfname_lname(){
        $username = $this->session->userdata('username');
       
        $this->db->select('s.std_fname,s.std_lname');
        $this->db->from('student s');
        $this->db->where('s.S_ID',$username);
        $query = $this->db->get();
        $fname_lname = array();
        $fname_lname = $query->result_array();


        if( $fname_lname == "" || $fname_lname == null){
            $this->db->select('p.person_fname,p.person_lname');
            $this->db->from('personnel p');
            $this->db->where('p.username',$username);
            $query = $this->db->get();
            $fname_lname = array();
            $fname_lname = $query->result_array();
        }
        if($fname_lname > 0){
            return $fname_lname;
        }else{
            return false;
        }

        }
    
    
    
    
    
    
}