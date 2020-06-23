<?php

class Proofargument_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
    public function selectstudentproofargument(){
        $i=0;
        //$results = 0;
        $student = $this->session->userdata('student');
        //$student = "59111111";
        $this->db->select('*');
        $this->db->from('proofargument pfm');
        $this->db->join('report r', 'pfm.report_ID=r.report_ID');
        $this->db->join('offensestd os', 'r.offensestd_ID=os.offensestd_ID');
        $this->db->join('offensehead oh', 'os.oh_ID=oh.oh_ID');
        $this->db->join('offense o', 'oh.off_ID=o.off_ID');
        //$this->db->where('pfm.results',$results);
        $this->db->where('pfm.S_ID',$student);
        $query = $this->db->get();
        $student = array();
        $student = $query->result_array();
        
        foreach($student as $value){
            
            $data = $value['results'];
            $status = $this->utilstatus($data);
            $student[$i]["resultsname"] = $status;
            $i+=1;

        }
        
        
        
        if($student > 0){
            return $student;
        }else{
            return false;
        }
    }

    public function utilstatus($statusID){

        $data = array("รอการอนุมัติ","อนุมัติ","ไม่อนุมัติ");
        return $data[$statusID];
    } 

  
    public function selectoffenseorder(){
        
        //$student = $this->session->userdata('student');
        $id = $this->input->get('id');
        
   
        
        
        $this->db->select('*');
        $this->db->from('proofargument pfm');
        $this->db->join('student s', 'pfm.S_ID=s.S_ID');
        $this->db->join('report r', 'pfm.report_ID=r.report_ID');
        $this->db->join('offensestd os', 'r.offensestd_ID=os.offensestd_ID');
        $this->db->join('offensehead oh', 'os.oh_ID=oh.oh_ID');
        $this->db->join('offense o', 'oh.off_ID=o.off_ID');
        $this->db->join('place p', 'oh.place_ID=p.place_ID');
        $this->db->join('offevidence ovd', 'oh.oh_ID=ovd.oh_ID');
        $this->db->where('pfm.proof_ID',$id);
        
        
        
        $query = $this->db->get();
        /*
         $student = array();
         $student = $query->result_array();
         
         */
        
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    
    
    
    }
    
}