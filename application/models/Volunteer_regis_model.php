<?php

class Volunteer_regis_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
   
 
    function showAll(){
      
         $status =2;
        //$service_ID= $this->input->post('txtdelID');
       //$student=59111111;
        //echo $person_ID;
        //$student = $this->session->userdata('student');
        $this->db->select('sv.*,');
        $this->db->from('service sv');
        $this->db->join('personnel p', 'sv.person_ID=p.person_ID');
        $this->db->where('sv.status', $status);
        $query = $this->db->get();
        //var_dump($query->result());
        //die;
       
        if($query->result() > 0){
            return $query->result();
        }else{
            return false;
        }
        
    }

    function show_whereid(){
        //ส่ง id ไปให้ ชื่อตัวแปร id ส่งแบบ Get
        $id = $this->input->get('id');
        $this->db->select('*');
        $this->db->from('Service sv');
        $this->db->join('personnel p', 'sv.person_ID=p.person_ID');
        $this->db->where('service_ID', $id);
        $query = $this->db->get();
        //var_dump($query->result());
        if($query->result() > 0){
            return $query->result();
        }else{
            return false;
        }
    

    }

    public function regisnotify(){
        $n=0;
        $id = $this->input->get('id');
        //$id=8;
        $this->db->select('*');
        $this->db->from('Service sv');
        $this->db->join('personnel p', 'sv.person_ID=p.person_ID');
        $this->db->where('service_ID', $id);
        $query = $this->db->get();
        $data = $query->result();
        //var_dump($data);
        //die();
        foreach ($query->result() as $row) {
            $r = $row->number_of+1;
                $query = $this->db->query('UPDATE service 
                                            SET number_of = '.$r.' WHERE service_ID = '.$id.'');

                        if($this->db->affected_rows() > 0){
                    // var_dump($row->person_fname.$row->person_lname);
                           $query= $this->db->query ('SELECT TIMEDIFF (end_time,start_time) AS time FROM service WHERE service_ID='.$id.'');
                           
                        $showall = array();
                        $showall = $query->result_array();
                        $showall['service'] = $query->result_array();
                        $name = $row->person_fname;
                        $last_name = $row->person_lname;
                        $person = $name." ".$last_name;
                           // $timetime =$row->$timeabs; 
                          // var_dump($showall);
                            //die;
                            $field = array(

                                'service_ID'=>$row->service_ID,
                                'S_ID'=>$this->session->userdata('student'),
                                'confirm_name'=>$person,
                                'certificat_date'=>$row->service_date,
                                'activity_time'=>$showall[$n]['time'],
                                'results	'=>'1',
                               // 'activity_type'=>$this->input->post('activity_type')
                            );
                            //var_dump($field);
                            $this->db->insert('participationactivities', $field);

                            if($this->db->affected_rows() > 0){

                            return true;
                        }else{
                            return false;
                        }

}

   
}
}



function wherecheck(){
    //ส่ง id ไปให้ ชื่อตัวแปร id ส่งแบบ Get
    /*code*/    
    $student = $this->session->userdata('student');
    $id = $this->input->get('id');
    //$id=23;
    $this->db->select('service_ID,S_ID');
    $this->db->from('participationactivities');
    //$this->db->join('personnel p', 'sv.person_ID=p.person_ID');
    $this->db->where('S_ID', $student);
    $this->db->where('service_ID', $id);

    $query = $this->db->get();
    //var_dump($query->result());
    if($query->num_rows() > 0){
            
        return true;
    }else{
        return  false;
    }


}
}