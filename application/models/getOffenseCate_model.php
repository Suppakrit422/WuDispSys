<?php

class getOffenseCate_model extends CI_Model {
    public function _construct()
    {
        parent:: __construct();
          
        
    }
    
     function getOffenseCate(){
        $this->db->select('*');      
        $this->db->from('OffenseCate');
        $this->db->order_by('oc_ID', 'ASC');
        $query = $this->db->get();
        return $query->result();
     }

     function getOffense(){
        $this->db->select('*');      
        $this->db->from('Offense');
        $this->db->order_by('off_desc', 'ASC');
        $query = $this->db->get();
        return $query->result();
     }

     function getDivisions(){
        $this->db->select('*');      
        $this->db->from('Divisions');
        $this->db->order_by('dept_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
     }

     function getCurriculum(){
        $this->db->select('*');      
        $this->db->from('Curriculum');
        $this->db->order_by('cur_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
     }

     function getDormitory(){
        $this->db->select('*');      
        $this->db->from('Dormitory');
        $this->db->order_by('dorm_ID', 'ASC');
        $query = $this->db->get();
        return $query->result();
     }
     
     function getPlace(){
      $this->db->select('*');      
      $this->db->from('Place');
      $this->db->order_by('place_ID', 'ASC');
      $query = $this->db->get();
      return $query->result();
   }
   function getCurriculum_info(){
      $this->db->select('*');      
      $this->db->from('Curriculum c');
      $this->db->join('divisions d','c.dept_ID=d.dept_ID'); 
      $this->db->where('dept_ID', 22);
      $query = $this->db->get();
      return $query->result();
   }
   
   
 }


    
       
    
