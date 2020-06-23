<?php

class OffcTime_model extends CI_Model {
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
            
             $this->db->where('oh.off_ID',2);
            $query = $this->db->get();
         
            //var_dump($query->result());
            //die();
            return $query->result();
            
       
        }
        function getOffense(){
            $this->db->select('*');      
            $this->db->from('Offense');
            $this->db->order_by('off_ID', 'ASC');
            $query = $this->db->get();
            return $query->result();
         }

         public function datebetween(){
            //  echo'ffff';
          
            
            // สองตัวนี้ไว้รับค่าจากview
            $off_ID = $this->input->post('off_ID');
            $firstday = $this->input->post('firstday');
            $lastday = $this->input->post('lastday');
            
            //  เปิดค่าตัวนี้ถ้าจะเช็คผ่านUrl 
            // $off_ID ="1";
            //  $firstday="2018-12-13";
            // $lastday="2020-12-13";
            
          
                $this->db->select('oh.committed_date,ostd.S_ID,s.std_fname,s.std_lname,s.behavior_score,c.cur_name,d.dname');   
                $this->db->from('offensehead oh');
                $this->db->join('offensestd ostd','oh.oh_ID=ostd.oh_ID'); 
                $this->db->join('offense o','oh.off_ID=o.off_ID'); 
                $this->db->join('offensecate oc','o.oc_ID=oc.oc_ID'); 
                $this->db->join('student s','ostd.S_ID=s.S_ID'); 
                $this->db->join('curriculum c','s.cur_ID=c.cur_ID'); 
                $this->db->join('dormitory d','s.dorm_ID=d.dorm_ID'); 
            

                 $this->db->where('o.off_ID' , $off_ID);
                $this->db->where('oh.committed_date >=' , $firstday);
                $this->db->where('oh.committed_date <=' , $lastday);
                $this->db->order_by('oh.committed_date ');
                $query = $this->db->get();
                $data = array();
                $data = $query->result_array();
               if($data !=NULL){
                  return $data;
               }else{
                return false;
              }
        
       
    }
        
       
    }


    

