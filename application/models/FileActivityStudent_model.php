<?php

class FileActivityStudent_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        $this->load->helper('url', 'form');
        $this->load->helper('directory');
        $this->load->helper('number');
         
        
    }

    public function selectparticipationactivities(){
        $student = $this->session->userdata('student');
        $status = 1;
        $this->db->select('p.par_ID,p.confirm_name,p.certificat_date,p.activity_time,s.std_fname,s.std_lname,s.email,s.phone,s.behavior_score,sv.service_name,sv.place,sv.service_date,sv.start_time,sv.end_time,ps.person_fname,ps.person_lname');
        $this->db->from('participationactivities p');
        $this->db->join('student s', 'p.S_ID=s.S_ID');
        $this->db->join('service sv', 'p.service_ID=sv.service_ID');
        $this->db->join('personnel ps', 'sv.person_ID=ps.person_ID');
        $this->db->where('s.username', $student);
        $this->db->where('p.results', $status);
        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
        // var_dump($showall);
        // die();
        
    if($showall > 0){
        return $showall;
    }else{
        return false;
    }
}

public function Updatefileparticipationactivities(){
    $par_ID = $this->input->post('par_ID');
    
      //$count = count($_FILES['myFile']['name']);
		$changename =explode(".",$_FILES["myFile"]["name"]);
		// var_dump($changename[0]);    ชื่อรูปที่ผู้ใช้ใส่
		// var_dump($changename[1]);	นามสกุลไฟล์รูปที่ผู้ใช้ใส่
		//die();

        $_FILES['userfile']['name']     = $par_ID.".".$changename[1];
      $_FILES['userfile']['type']     = $_FILES['myFile']['type'];
      $_FILES['userfile']['tmp_name'] = $_FILES['myFile']['tmp_name'];
      $_FILES['userfile']['error']    = $_FILES['myFile']['error'];
      $_FILES['userfile']['size']     = $_FILES['myFile']['size'];
		$config['upload_path'] = './uploads_pdffile/';
		$config['allowed_types'] = 'pdf';
        $data = $this->checkdocument_file($par_ID);
        if($data == true){
            unlink(FCPATH . 'uploads_pdffile/'.$_FILES['userfile']['name']);
        }

        $this->load->library('upload', $config);
		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
		}else{
			$final_files_data[] = $this->upload->data();
        }


           $field = array(
    'document_file'=>$_FILES['userfile']['name']
    );
    $this->db->where('par_ID',$par_ID);
    $this->db->update('participationactivities', $field);
   
    
if($this->db->affected_rows() > 0){
    return true;
}else{
    return false;
}
}

function checkdocument_file($par_ID){
   // $par_ID = 3;
    $this->db->select('p.document_file');
    $this->db->from('participationactivities p');
    $this->db->where('p.par_ID', $par_ID);
    $query = $this->db->get();
    $showall = array();
    $showall = $query->result_array();
    if($showall[0]["document_file"] != ""){
        return true;
    }else{
        return false;
    }
    
}


}