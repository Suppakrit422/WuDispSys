<?php

class officer_div_model extends CI_Model {
    public function _construct()
    {
        parent:: __construct();
          
        
    }
    

 public function showAll(){
    $this->db->select('*');
          // $this->db->select('os.S_ID, s.std_fname,s.std_lname,s.behavior_score,s.cur_ID,s.dorm_ID');
            $this->db->from('offensestd os');
            $this->db->join('student s ',' os.S_ID = s.S_ID');
            $this->db->join('curriculum c ',' s.cur_ID = c.cur_ID');
            $this->db->join('dormitory d ',' s.dorm_ID = d.dorm_ID');
              $this->db->join('offensehead oh ',' os.oh_ID = oh.oh_ID');
              $this->db->join('offense o ','  oh.off_ID = o.off_ID ');
              $this->db->join('offensecate oc',' o.oc_ID = oc.oc_ID');
            
             $this->db->where('oh.off_ID',1);
            $query = $this->db->get();
         
            //var_dump($query->result());
            //die();
            return $query->result();
            
       
        }
        //function getOffense(){
            //$this->db->select('*');      
           // $this->db->from('Offense');
           // $this->db->order_by('off_ID', 'ASC');
            //$query = $this->db->get();
            //return $query->result();
       //  }
        
        function getDivisions(){
            $this->db->select('*');      
            $this->db->from('Divisions');
            $this->db->order_by('dept_ID', 'ASC');
            $query = $this->db->get();
            return $query->result();
         }
    }


    
       
    
