<?php

class Proofargumentfor_discipline_officer_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
    public function selectproofargument(){
        $i=0;
        $results = 0;
       // $discipline_officer = $this->session->userdata('discipline_officer');
        $this->db->select('pfm.*,c.*,d.*,r.*,os.*,oh.*,o.*,p.*,s.S_ID,s.prefixID,s.std_fname,s.std_lname,s.sex,s.email,s.image,s.behavior_score');
        $this->db->from('proofargument pfm');
        $this->db->join('student s', 'pfm.S_ID=s.S_ID');
        $this->db->join('curriculum c', 's.cur_ID=c.cur_ID');
        $this->db->join('divisions d', 'c.dept_ID=d.dept_ID');
        $this->db->join('report r', 'pfm.report_ID=r.report_ID');
        $this->db->join('offensestd os', 'r.offensestd_ID=os.offensestd_ID');
        $this->db->join('offensehead oh', 'os.oh_ID=oh.oh_ID');
        $this->db->join('place p', 'oh.place_ID=p.place_ID');
        $this->db->join('offense o', 'oh.off_ID=o.off_ID');
        $this->db->where('pfm.results',$results);
        
        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
        
        foreach($showall as $value){
            
            $data = $value['results'];
            $oh_ID = $value['oh_ID'];
            $status = $this->utilstatus($data);
            $showall[$i]["resultsname"] = $status;

           $image = $this->selectimage($oh_ID);
           $showall[$i]["image"] = $image;
            $i+=1;

        }

        
        
        
        if($showall > 0){
            return $showall;
        }else{
            return false;
        }
    }

    public function utilstatus($statusID){

        $data = array("รอการอนุมัติ","อนุมัติ","ไม่อนุมัติ");
        return $data[$statusID];
    } 

    public function showdetailproofargument(){
        // $proof_ID = $this->input->post('proof_ID');
        $i=0;
        $this->db->select('*');
        $this->db->from('proofargument pfm');
        $this->db->join('report r', 'pfm.report_ID=r.report_ID');
        $this->db->join('offensestd os', 'r.offensestd_ID=os.offensestd_ID');
        $this->db->join('offensehead oh', 'os.oh_ID=oh.oh_ID');
        $this->db->join('offense o', 'oh.off_ID=o.off_ID');
        // $this->db->where('pfm.proof_ID',$proof_ID);
        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
        foreach($showall as $value){
            
            $data = $value['results'];
            $status = $this->utilstatus($data);
            $showall[$i]["resultsname"] = $status;
            $i+=1;

        }
        if($showall > 0){
            return $showall;
        }else{
            return false;
        }

    }

    public function Updatestatusproofargument(){
        $usergroup = $this->session->userdata('username');

         $getstatus = $this->input->post('status');
         $S_ID = $this->input->post('S_ID');
         $proof_ID = $this->input->post('proof_ID');
        //  $S_ID = "59111111";
        // $getstatus = 1;
        //  $proof_ID =27;

        // 1=อนุมัติ , 2 = ไม่อนุมัติ
        $status = $getstatus == 1? $getstatus:2;

        if($status != 2){

            $this->db->select('*');
        $this->db->from('proofargument p');
        $this->db->join('report r', 'p.report_ID=r.report_ID');
        $this->db->join('offensestd ostd', 'r.offensestd_ID=ostd.offensestd_ID');
        $this->db->where('p.proof_ID', $proof_ID);
        $query = $this->db->get();
        $data = $query->result();
        $offensestd_ID = $data[0]->offensestd_ID;
        // 6 =คืนคะแนนความประพฤติ
        $fieldupdatestatus = array(
            'statusoff'=>'6'
            
    );
        $this->db->where('o.offensestd_ID',$offensestd_ID);
    $this->db->update('offensestd o', $fieldupdatestatus);

        if($this->db->affected_rows() > 0){
        
   
        $this->db->select('std.std_fname,std.std_lname,std.behavior_score');
        $this->db->from('student std');
        $this->db->where('std.S_ID', $S_ID);
        $query = $this->db->get();
        $data = $query->result();
        $score = $data[0]->behavior_score+5;

        $fieldscore = array(
            'behavior_score'=>$score
            
    );
        $this->db->where('student.S_ID',$S_ID);
    $this->db->update('student', $fieldscore);
}
        }
         

   
        $field = array(
            'results'=>$status
            
    );
    $this->db->where('proofargument.proof_ID',$proof_ID);
    $this->db->update('proofargument', $field);
   

    if($this->db->affected_rows() > 0){
        // $usergroup = $this->session->userdata('username');

        $this->db->select('*');
        $this->db->from('student s');
        $this->db->where('s.S_ID', $S_ID);

        // $query = $this->db->query("SELECT behavior_score FROM student WHERE S_ID = '.$std.'");
        $query = $this->db->get();
        // var_dump($query->result());
        // $sumpoint = ;
        $behavior_score = 0;
        $sumpoint = 0;
        foreach ($query->result() as $row) {
            $behavior_score = $row->behavior_score -5;
            $sumpoint = $row->behavior_score;
        }
        
        $field7 = array(
            'S_ID' => $S_ID,
            'before_score' => $behavior_score,
            'after_score' => $sumpoint,
            'date' =>$this->input->post('date_current'),
            'explanation' => 'คืนคะแนนอุทธรณ์',
            'informer' => $usergroup
        );
        //echo "field6";
        //var_dump($field6);

        $this->db->insert('getlog', $field7);
                        
        if($this->db->affected_rows() > 0){

            return true;
        }else{
            return false;
        }
    }
}
function selectimage($oh_ID){

        $this->db->select('o.evidenre_name');
        $this->db->from('offevidence o');
        $this->db->where('o.oh_ID',$oh_ID);
        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
        return  $showall;
}

  
    
    
}