<?php

class Service_Feedback_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }


    //select ข้อมูลที่บุคลากรแต่ละคนต้องอนุมัติ   
    function selectservice(){
        $usergroup =$this->session->userdata('username');
    //     $usergroup =$this->session->userdata('student') == null ? "":$this->session->userdata('student');
    // if($usergroup == ""){
    // $usergroup =$this->session->userdata('admin') == null ? "":$this->session->userdata('admin');
    // }
    // if($usergroup == ""){
    // $usergroup =$this->session->userdata('teacher') == null ? "":$this->session->userdata('teacher');
    // }
    // if($usergroup == ""){
    // $usergroup =$this->session->userdata('discipline_officer') == null ? "":$this->session->userdata('discipline_officer');
    // }
    // if($usergroup == ""){
    // $usergroup =$this->session->userdata('headofstudent_affairs') == null ? "":$this->session->userdata('headofstudent_affairs');
    // }
    // if($usergroup == ""){
    // $usergroup =$this->session->userdata('dormitory_supervisor') == null ? "":$this->session->userdata('dormitory_supervisor');
    // }
    // if($usergroup == ""){
    // $usergroup =$this->session->userdata('dormitory_advisor') == null ? "":$this->session->userdata('dormitory_advisor');
    // }
    // if($usergroup == ""){
    // $usergroup =$this->session->userdata('branch_head') == null ? "":$this->session->userdata('branch_head');
    // }
    // if($usergroup == ""){
    // $usergroup =$this->session->userdata('dean') == null ? "":$this->session->userdata('dean');
    // }
    // if($usergroup == ""){
    // $usergroup =$this->session->userdata('security_guard') == null ? "":$this->session->userdata('security_guard');
    // }
    // if($usergroup == ""){
    // $usergroup =$this->session->userdata('employee') == null ? "":$this->session->userdata('employee');
    // }
        //$usergroup = "jsomsri";
        // echo $usergroup;
        //die();
        //$status =0;
        $i=0;


        $this->db->select('s.service_ID,s.service_name,s.proposer,s.place,s.service_date,s.start_time,s.end_time,s.received,s.number_of,s.status,s.activity_type1,s.explanation,p.person_fname,p.person_lname,p.position,p.email,p.phone1,p.phone2');
        $this->db->from('service s');
        //$this->db->join('student std', 's.proposer=std.S_ID');
        $this->db->join('personnel p', 's.person_ID=p.person_ID');
       // $this->db->join('usertype ut', 'std.usertype_ID=ut.usertype_ID');
        
        $this->db->where('p.username', $usergroup);
        $this->db->order_by('s.service_date ASC');
        //$this->db->where('s.status',$status);
        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
        foreach($showall as $row){
           $proposer= $this->selectproposer($row['proposer']);
        //    var_dump($proposer);
        //    die();
           $showall[$i]['proposer_fname'] =  $proposer[0]['proposer_fname'];
           $showall[$i]['proposer_lname'] =  $proposer[0]['proposer_lname'];
           $showall[$i]['usertype_name'] =  $proposer[0]['usertype_name'];
            $statusname = $this->statusservice($row['status']);
            $showall[$i]['statusname'] = $statusname;
            $activity_type =$this->acticity_type($row['activity_type1']);
            $showall[$i]['activity_type_name'] = $activity_type;
            $i+=1;
        }
        // var_dump($showall);
        // die();
      
       if($query->num_rows() > 0){
           return $showall;
       }else{
           return false;
       }

    }
    //select ชื่อ-สกุล ผู้แจ้ง
     function selectproposer($usergroup){
       // $usergroup = "jsomsri";
        $this->db->select('std.std_fname as proposer_fname,std.std_lname as proposer_lname,ut.usertype_name as usertype_name');
        $this->db->from('student std');
        $this->db->join('usertype ut', 'std.usertype_ID=ut.usertype_ID');
        $this->db->where('std.username', $usergroup);
        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
       

        if($showall == null){
        $this->db->select('p.person_fname as proposer_fname,p.person_lname as proposer_lname,ut.usertype_name as usertype_name');
        $this->db->from('personnel p');
        $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
        $this->db->where('p.username', $usergroup);
        $queryper = $this->db->get();
        $showall = array();
        $showall = $queryper->result_array();
        }

        return $showall;
        // var_dump($showall);
        // die();

    }


    //รออนุมัติการเสนอกิจกรรมบำเพ็ญประโยชน์ สำหรับบุคลากร
    function Updateactivityforperson(){
        $service_ID = $this->input->get('service_ID');
        $getstatus = $this->input->get('status');
        $getannotation = $this->input->get('annotation');
        // $getexplanation = "อิอิ";
        // $service_ID =2;
        // $status = 1;

        // 2 =อนุมัติ 3=ไม่อนุมัติ
        $status = $getstatus == 1? $getstatus: 3;
        $annotation =$status == 1?  "":  $getannotation; 
        
        $field = array(
                
            'status'=>$status,
            'annotation'=>$annotation 
    );
    $this->db->where('service_ID',$service_ID);
    $this->db->update('service', $field);

        //$query = $this->db->get();
    //    var_dump($query->result());
    //    die();
      
       if($this->db->affected_rows() > 0){
           return true;
       }else{
           return false;
       }

    }

    //รออนุมัติการเสนอกิจกรรมบำเพ็ญประโยชน์ สำหรับเจ้าหน้าที่วินัย
    function Updateactivityfordiscipline_officer(){
        $service_ID = $this->input->get('service_ID');
        $getstatus = $this->input->get('status');
        $getannotation = $this->input->get('annotation');
        //  $getexplanation = "อิอิ";
        //  $service_ID =3;
        //  $getstatus = 0;

         $status = $getstatus == 1? 2: 4;
         $annotation =$status == 2?  "": $getannotation; 
         // 2 =อนุมัติ 3=ไม่อนุมัติ
         
        
        
        $field = array(
                
            'status'=>$status,
            'annotation'=>$annotation 
    );
    $this->db->where('service_ID',$service_ID);
    $this->db->update('service', $field);

        //$query = $this->db->get();
    //    var_dump($query->result());
    //    die();
      
       if($this->db->affected_rows() > 0){
           return true;
       }else{
           return false;
       }

    }
    function statusservice($getstatus){
        $status = ['รอบุคลากรอนุมัติ','รอเจ้าหน้าที่วินัยอนุมัติ','อนุมัติเรียบร้อย','บุคลากรไม่อนุมัติ','เจ้าหน้าที่วินัยไม่อนุมัติ',''];
         return $status[$getstatus];


    }

    function acticity_type($a_type){
        $status = ['','บำเพ็ญประโยชน์','อบรม',''];
         return $status[$a_type];


    }

    //selectข้อมูลเสนอกิจกรรมให้กับบุคากรผู้รับรอง
    function Allactivity(){
        //$service_ID= $this->input->post('txtdelID');
        //$student=59111111;
        //echo $person_ID;
        //$student = $this->session->userdata('student');
        $this->db->select('*');
        $this->db->from('Service sv');
        $this->db->join('personnel p', 'sv.person_ID=p.person_ID');
        //$this->db->where('s.S_ID', $student);
        $query = $this->db->get();
        //var_dump($query->result());
        //die;
        
        if($query->result() > 0){
            return $query->result();
        }else{
            return false;
        }

    }

    function Updatestatusparticipationactivities(){
        $usergroup =$this->session->userdata('username');
        $setstatusrs = 0;
       // $S_ID=['59123456'];
       //$service_ID= 3;
        $service_ID= $this->input->post('service_ID');
         $S_ID= $this->input->post('S_ID');
        
        foreach($S_ID as $value){
        $field = array(
            'results'=>$setstatusrs
            
    );
    $this->db->where('S_ID',$value);
    $this->db->where('service_ID',$service_ID);
    $this->db->update('participationactivities', $field);


    $this->db->select('std.std_fname,std.std_lname,std.behavior_score');
        $this->db->from('student std');
        $this->db->where('std.S_ID', $value);
        $query = $this->db->get();
        $data = $query->result();
        $score = $data[0]->behavior_score+5;
        $fieldscore = array(
            'behavior_score'=>$score
            
    );
        $this->db->where('student.S_ID',$value);
        $this->db->update('student', $fieldscore);

    
    if($this->db->affected_rows() > 0){

        $this->db->select('*');
        $this->db->from('student s');
        $this->db->where('s.S_ID',$value);

        $query = $this->db->get();
        $behavior_score = 0;
        $sumpoint = 0;
        foreach ($query->result() as $row) {
            $behavior_score = $row->behavior_score -5;
            $sumpoint = $row->behavior_score;
        }
        
        $field7 = array(
            'S_ID' => $value,
            'before_score' => $behavior_score,
            'after_score' => $sumpoint,
            'date' =>$this->input->post('date_current'),
            'explanation' => 'คืนคะแนนบำเพ็ญประโยชน์',
            'informer' => $usergroup
        );
        //echo "field6";
        //var_dump($field6);

        $this->db->insert('getlog', $field7);
    } 
       if($this->db->affected_rows() > 0){
           return true;
       }else{
           return false;
       }
    }
    
}



    function selectActivity(){
        $usergroup =$this->session->userdata('username');
        $status =2;
        $i=0;
    
    
        $this->db->select('s.service_ID,s.service_name,s.proposer,s.place,s.service_date,s.start_time,s.end_time,s.received,s.number_of,s.status,s.activity_type1,s.explanation,p.person_fname,p.person_lname,p.position');
        $this->db->from('service s');
        $this->db->join('personnel p', 's.person_ID=p.person_ID');
        $this->db->where('s.status',$status);
        $this->db->where('p.username',$usergroup);
        
        $this->db->order_by('s.service_date ASC');
        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
        foreach($showall as $row){
           $proposer= $this->selectproposer($row['proposer']);
        //    var_dump($proposer);
        //    die();
           $showall[$i]['proposer_fname'] =  $proposer[0]['proposer_fname'];
           $showall[$i]['proposer_lname'] =  $proposer[0]['proposer_lname'];
           $showall[$i]['usertype_name'] =  $proposer[0]['usertype_name'];
            $statusname = $this->statusservice($row['status']);
            $showall[$i]['statusname'] = $statusname;
            $activity_type =$this->acticity_type($row['activity_type1']);
            $showall[$i]['activity_type_name'] = $activity_type;
            $i+=1;
        }
        // var_dump($showall);
        // die();
      
       if($query->num_rows() > 0){
           return $showall;
       }else{
           return false;
       }


    }
    




}