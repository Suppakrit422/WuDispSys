<?php

class OffenseHead_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        $this->load->helper('url', 'form');
        $this->load->helper('directory');
        $this->load->helper('number');
        
    }
    
    public function selectstudentoffensehead(){
        $student = $this->session->userdata('student');
        $statusoff = "0";   //6 คือ คืนคะแนนความประพฤติ
        // $statusoff = "6";   //6 คือ คืนคะแนนความประพฤติ
        
        $this->db->select('*');
        $this->db->from('offensestd ostd');
        $this->db->join('student s', 'ostd.S_ID=s.S_ID');
        $this->db->join('offensehead oh', 'ostd.oh_ID=oh.oh_ID');
        $this->db->join('offense o', 'oh.off_ID=o.off_ID');
        $this->db->join('report rp', 'ostd.offensestd_ID=rp.offensestd_ID');
       // $this->db->join('proofargument pr', 's.S_ID=ostd.S_ID');
        $this->db->join('place p', 'oh.place_ID=p.place_ID');
        $this->db->join('offevidence ov', 'oh.oh_ID=ov.oh_ID');
        $this->db->where('ostd.statusoff',$statusoff);
        // $this->db->where('ostd.statusoff !=',$statusoff);
        $this->db->where('ostd.S_ID',$student);
        $this->db->where('oh.OffenseHead_oh_ID','');

        $query = $this->db->get();
        $student = array();
        $student = $query->result_array();
        
        
        
        if($student > 0){
            return $student;
        }else{
            return false;
        }
    }
    
    public function selectoffenseorder(){
        
        //$student = $this->session->userdata('student');
        $id = $this->input->get('id');
        //$id = 37;
        /*
         $query = $this->db->get('offensestd');
         $this->db->where('offensestd_ID',$id);
         if($query->num_rows() > 0){
         return $query->row();
         }else{
         return false;
         }*/
        
        
        
        $this->db->select('*');
        $this->db->from('offensestd ostd');
        //$this->db->join('report r', 'ostd.offensestd_ID=r.offensestd_ID');
        $this->db->join('student s', 'ostd.S_ID=s.S_ID');
        //$this->db->join('proofargument pr', 'r.report_ID=r.report_ID');
        $this->db->join('offensehead oh', 'ostd.oh_ID=oh.oh_ID');
        $this->db->join('offevidence ovd', 'oh.oh_ID=ovd.oh_ID');
        $this->db->join('offense of', 'oh.off_ID=of.off_ID');
        $this->db->join('place p', 'oh.place_ID=p.place_ID');
        $this->db->where('ostd.offensestd_ID',$id);
        
        
        
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
    
    
    public function selectoffenseforinsert(){
        
        //$student = $this->session->userdata('student');
        $id = $this->input->get('id');
    //    $id = 50;
 

        $this->db->select('*');
        $this->db->from('offensestd ostd');
        $this->db->join('report r', 'ostd.offensestd_ID=r.offensestd_ID');
        $this->db->join('student s', 'ostd.S_ID=s.S_ID');
        $this->db->where('ostd.offensestd_ID',$id);
        
        
        
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
    
    public function insertproofargument(){
        // $id = $this->input->get('id');
        $student = $this->session->userdata('student');
        $report_ID = $this->input->post('report_ID');
        // $report_ID = 35;
        
        $this->db->select('*');
        $this->db->from('offensestd ostd');
        $this->db->join('student s', 'ostd.S_ID=s.S_ID');
        $this->db->join('offensehead oh', 'ostd.oh_ID=oh.oh_ID');
        $this->db->join('offense o', 'oh.off_ID=o.off_ID');
        $this->db->join('report rp', 'ostd.offensestd_ID=rp.offensestd_ID');
       // $this->db->join('proofargument pr', 's.S_ID=ostd.S_ID');
        $this->db->join('place p', 'oh.place_ID=p.place_ID');
        $this->db->join('offevidence ov', 'oh.oh_ID=ov.oh_ID');
     
        
        $this->db->where('ostd.S_ID',$student);
        $this->db->where('rp.report_ID',$report_ID);

        $query = $this->db->get();
        // var_dump($query->result());
        foreach ($query->result() as $row) {
            $report_ID = $row->report_ID;
            $S_ID = $row->S_ID;
            $person_ID = $row->person_ID;
            $offensestd_ID = $row->offensestd_ID;
        }

        $changename =explode(".",$_FILES["myFile"]["name"]);
    // var_dump($changename[0]);    ชื่อรูปที่ผู้ใช้ใส่
    // var_dump($changename[1]);	นามสกุลไฟล์รูปที่ผู้ใช้ใส่
    //die();
    // $proof_ID =" ";


    $_FILES['userfile']['name']     = $report_ID.".".$changename[1];
    $filename =  $_FILES['userfile']['name'];
    // $data = $this->checkfilename($filename);
    // if($data == 'true'){
    //     unlink(FCPATH . 'upload_proofargument/'.$filename);
    //     $this->db->where('proofargument.proof_name', $filename);
    //     $this->db->delete('proofargument');

    // }

    $_FILES['userfile']['type']     = $_FILES['myFile']['type'];
  $_FILES['userfile']['tmp_name'] = $_FILES['myFile']['tmp_name'];
  $_FILES['userfile']['error']    = $_FILES['myFile']['error'];
  $_FILES['userfile']['size']     = $_FILES['myFile']['size'];
    $config['upload_path'] = './upload_proofargument/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']= 2000;


    $this->load->library('upload', $config);
    if ( ! $this->upload->do_upload()){
        $error = array('error' => $this->upload->display_errors());
        //$this->load->view('upload_form', $error);
    }else{
        $final_files_data[] = $this->upload->data();
    }

        //$id = $this->input->post('txteditID');
        // var_dump($report_ID);
        // var_dump($person_ID);
        // var_dump($S_ID);
        // die;
        $field = array(
            'report_ID'=>$report_ID,
            'S_ID'=>$S_ID,
            'person_ID'=>$person_ID,
            'proof_name'=> $_FILES['userfile']['name'],
            'proof_date'=>$this->input->post('proof_date'),
            'Explanation'=>$this->input->post('Explanation'),
            'results'=> '0'
            
            
        );
        $this->db->insert('proofargument', $field);

        if($this->db->affected_rows() > 0){
        $updatestatusoff = array(
            'statusoff'=>'1'
            
            
        );
        $this->db->where('ostd.offensestd_ID', $offensestd_ID);
    $this->db->update('offensestd ostd', $updatestatusoff);
    }
    if($this->db->affected_rows() > 0){

            return true;
        }else{
            return false;
        }
        
    
    }
        
    
    public function getoffenseID(){
        $getid = $this->input->post('offensestd_ID');
         $date = $this->input->post('report_date');
        //$id = $this->input->post('id');
        // $getid = [39,40];
        // $date = "2020-01-12";

        $id = $getid == null ? "" :  $getid;
        if($id == null){
            return false;
        }
        for($i=0;$i <count($id);$i++){
        $field = array(
            'offensestd_ID'=>$id[$i],
            'report_date'=>$date, 
            'report_status'=>'0',
            'reason'=>'testinsert'
            
        );
        $this->db->insert('report', $field);
   }

        //var_dump($field);
        //die();
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
        
        
        
        
    }

    function checkfilename($filename){
   // $par_ID = 3;
    $this->db->select('p.proof_name');
    $this->db->from('proofargument p');
    $this->db->where('p.proof_name', $filename);
    $query = $this->db->get();
    $showall = array();
    $showall = $query->result_array();
    if($showall[0]["proof_name"] != null){
        return 'true';
    }else{
        return false;
    }
    
}


public function updatestatusoffAdmitwrongoffensestd(){
    $student = $this->session->userdata('student');
    $offensestd_ID = $this->input->post('offensestd_ID');
   // $offensestd_ID = "72";
    $statusoff = "3"; //รอการบำเพ็ญประโยชน์


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