
<?php

class teacher_model extends CI_Model {
    public function _construct()
    {
        parent:: __construct();
          
        
    }
    

 public function showAll(){
    $this->db->select('*');
          // $this->db->select('os.S_ID, s.std_fname,s.std_lname,s.behavior_score,s.cur_ID,s.dorm_ID');
            $this->db->from('offensestd os');
            $this->db->join('student s ',' os.S_ID = s.S_ID');
            $this->db->join('personnel p ','  s.person_ID = p.person_ID');
            $this->db->join('offensehead oh',' os.oh_ID = oh.oh_ID');
              $this->db->join('offense o ',' oh.off_ID = o.off_ID ');
             $this->db->where('p.person_ID' ,6010201001);
             $this->db->order_by('s.behavior_score', 'ASC');
            $query = $this->db->get();
         
            //var_dump($query->result());
            //die();
            return $query->result();
            
       
        }
      
        
     
  
   
    }


    
       
    
