<?php

class Volunteer_history_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
 
    function showAll(){
        $i=0;
       $student = $this->session->userdata('student');
        //$student =59123456;

        $this->db->select('*');
        $this->db->from('service sv');
        $this->db->join('personnel p', 'sv.person_ID=p.person_ID');
        $this->db->join('participationactivities pp', 'sv.service_ID=pp.service_ID');
        $this->db->where('pp.S_ID', $student);
        //$this->db->where('pp.results', '0');
        //var_dump($query->result());
        //$this->db->where('service_ID', $id);
        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
         
        foreach($showall as $value){
            $data = $value['status'];
            $start_time = date_format(date_create($value['start_time']),"H:i");
            $end_time = date_format(date_create($value['end_time']),"H:i");
            $status = $this->utilstatus($data);

        
        $showall[$i]["statusname"] = $status;
        $showall[$i]["start_time"] = $start_time;
        $showall[$i]["end_time"] = $end_time;
        $i++;
    }
    // var_dump($showall);   
    // die();
        if($showall > 0){
            return $showall;
        }else{
            return false;
        }
    }  
    public function utilstatus($statusID){

        $data = array("รอผลการเสนอ","อนุมัติ",'');
        return $data[$statusID];
    }  


}