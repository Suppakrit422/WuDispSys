<?php

class ReportOffender_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        $this->load->helper('url', 'form');
        $this->load->helper('directory');
        $this->load->helper('number');
        
    }
    
    public function selectstudentoffensehead(){
        $student = $this->session->userdata('student');
        $statusoff = "7";
        // $this->db->distinct();
        $this->db->select('*');
        $this->db->from('offensestd ostd');
        $this->db->join('student s', 'ostd.S_ID=s.S_ID');
        $this->db->join('offensehead oh', 'ostd.oh_ID=oh.oh_ID');
        $this->db->join('offense o', 'oh.off_ID=o.off_ID');
        $this->db->join('report rp', 'ostd.offensestd_ID=rp.offensestd_ID');
       // $this->db->join('proofargument pr', 's.S_ID=ostd.S_ID');
        $this->db->join('place p', 'oh.place_ID=p.place_ID');
        $this->db->join('offevidence ov', 'oh.oh_ID=ov.oh_ID');
        $this->db->where('ostd.statusoff !=',$statusoff);
        $this->db->where('ostd.S_ID',$student);
        $this->db->group_by('rp.offensestd_ID');

        $query = $this->db->get();
        $student = array();
        $student = $query->result_array();
        
        
        
        if($student > 0){
            return $student;
        }else{
            return false;
        }
    }


    public function updatestatusoffAdmitwrongoffensestd(){
        $student = $this->session->userdata('student');
        $offensestd_ID = $this->input->post('offensestd_ID');
       // $offensestd_ID = "72";
        $statusoff = "7";


        $field = array(
            'statusoff'=>$statusoff
            

        );
        $this->db->where('offensestd.offensestd_ID', $offensestd_ID);
        $this->db->update('offensestd', $field);
        
        
        
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
   
    
    
    
    
    
    
}