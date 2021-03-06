<?php

class teacher_dashboard_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
    
    
    public function selectscorestudent(){
        //SELECT COUNT(DISTINCT S_ID) FROM offensestd
        // $this->db->select('COUNT(DISTINCT S_ID) as numberstudent');
        // $this->db->from('offensestd');

        $teacher = $this->session->userdata('teacher');
      $this->db->distinct();
        $this->db->select('COUNT(DISTINCT ostd.S_ID) as numberstudent');
        $this->db->group_by('oc.oc_ID');
        
        //$this->db->select('*');
        $this->db->from('personnel p');
        $this->db->join('student s','p.person_ID=s.person_ID');     
        $this->db->join('offensestd ostd','s.S_ID=ostd.S_ID');
        $this->db->join('offensehead oh','ostd.oh_ID=oh.oh_ID');      
        $this->db->join('offense o','oh.off_ID=o.off_ID'); 
        $this->db->join('offensecate oc','o.oc_ID=oc.oc_ID'); 
        
        $this->db->where('p.username',$teacher);

 
        
        // $this->db->join('offevidence ov', 'o.oh_ID=ov.oh_ID');
         //$this->db->join('offensestd os', 'ov.oh_ID=os.oh_ID');
         $query = $this->db->get();
         //var_dump($query->result());
         //die();
         if($query->num_rows() > 0){
             
             return $query->row();
         }else{
             return false;
         }
     }

     public function selectstudentall(){
        //$student = $this->session->userdata('student');
        //SELECT DISTINCT offensestd.S_ID,student.std_fname,student.std_lname,student.behavior_score FROM offensestd,student WHERE offensestd.S_ID=student.S_ID


        $this->db->distinct();
        $this->db->select('ostd.S_ID,s.std_fname,s.std_lname,s.behavior_score,x.prefix_name');
        //$this->db->select('*');
        $this->db->from('offensestd ostd');
        $this->db->order_by('s.behavior_score ASC');
        $this->db->join('student s','ostd.S_ID=s.S_ID');
        $this->db->join('prefix x','s.prefixID=x.prefixID');

        $query = $this->db->get();
        $student = array();
        $student = $query->result_array();
 
        
        if($student > 0){
            return $student;
         }else{
         return false;
         }
    }
    
    




    public function student_offense(){ 
        $teacher = $this->session->userdata('teacher');
        //SELECT DISTINCT offensestd.S_ID,student.std_fname,student.std_lname,student.behavior_score FROM offensestd,student WHERE offensestd.S_ID=student.S_ID
        //,s.std_fname,s.std_lname,s.behavior_score
        //COUNT(DISTINCT ostd.S_ID) as numberstudent
        //var_dump($teacher);
       // die();
       //COUNT(DISTINCT ostd.S_ID) as numberstudent ,oc.oc_ID,oh.off_ID
      $this->db->distinct();
      // $this->db->order_by('oc.oc_ID');
      // $this->db->group_by('COUNT(ostd.S_ID),oc.oc_ID');
        $this->db->select('oc.oc_ID,oc.oc_desc as label,count(ostd.S_ID) as y');
        $this->db->group_by('oc.oc_ID');
        
        //$this->db->select('*');
        $this->db->from('personnel p');
        $this->db->join('student s','p.person_ID=s.person_ID');     
        $this->db->join('offensestd ostd','s.S_ID=ostd.S_ID');
        $this->db->join('offensehead oh','ostd.oh_ID=oh.oh_ID');      
        $this->db->join('offense o','oh.off_ID=o.off_ID'); 
        $this->db->join('offensecate oc','o.oc_ID=oc.oc_ID'); 
        
        $this->db->where('p.username',$teacher);
       
        $query = $this->db->get();
        $student = array();
        $student = $query->result_array();
 
        
        if($student > 0){
            return $student;
         }else{
         return false;
         }
    }

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
    function studentinactivity(){
        $id = $this->input->get('id');
        //$id = 3;
        $this->db->select('s.S_ID,s.std_fname,s.std_lname,s.email,s.phone,d.dname,p.results,p.document_file');
        $this->db->from('service sv');
        $this->db->join('participationactivities p','sv.service_ID=p.service_ID');
        $this->db->join('student s','p.S_ID=s.S_ID');
        $this->db->join('dormitory d','s.dorm_ID=d.dorm_ID');
        $this->db->where('sv.service_ID',$id);
        $query = $this->db->get();
        $stdacticity = array();
        $stdacticity = $query->result_array();
        // var_dump($stdacticity);
        // die();
        
        if($stdacticity > 0){
            return $stdacticity;
         }else{
         return false;
         }

	}

       // =======================================================================================================================
    //แสดงเฉพาะรายการแจ้งเหตุที่ผู้ใช้ลบ
    function spc_showoffhead(){
        $n=0;
            $id = $this->input->get('id');
            //$id='L62101';
            
            $this->db->select('*');
            $this->db->from('offensehead o');
            $this->db->join('place p', 'o.place_ID=p.place_ID');
            $this->db->join('offensestd ov', 'o.oh_ID=ov.oh_ID');
            $this->db->join('Offense os', 'o.off_ID=os.off_ID');
            //$this->db->join('vehicles v', 'ov.S_ID=v.S_ID');
            $this->db->join('offensecate oc', 'os.oc_ID=oc.oc_ID');
            $this->db->join('student s', 'ov.S_ID=s.S_ID');
            $this->db->join('curriculum c', 's.cur_ID=c.cur_ID');
            $this->db->join('divisions d', 'c.dept_ID=d.dept_ID');
            $this->db->where('o.oh_ID' ,$id);
          $query = $this->db->get();
          $showall = array();
          $showall = $query->result_array();




foreach($showall as $value){
   // echo $value['offensestd_ID'];
  // $this->db->select('v.regist_num');
   // $this->db->select('*');
   // $this->db->from('verhicles');
   // $this->db->from('offensehead oh');
    //$this->db->join('offensestd ostd', 'oh.oh_ID=ostd.oh_ID');
   // $this->db->join('vehicles v', 'ostd.S_ID=v.S_ID');
   //$this->db->where('oh.oh_ID' ,$id);
  // $this->db->where('S_ID' ,$value['S_ID']);
   $id=  $value['S_ID'];

   $this->db->where('S_ID',$id);
   $query = $this->db->get("vehicles");
   $showall[$n]['verhicles'] = $query->result_array();
   //$showall[$n]['verhicles'] = $query->result_array();
    $n+=1;


}


        
        
          //var_dump($query->result());
          //die();
    
      if($showall > 0){
          return $showall;
      }else{
          return false;
      }
  }
     public function showAll(){
            // $student = $this->session->userdata('student');
            $this->db->select('*');
            $this->db->from('place p');
            $this->db->join('offensehead o', 'p.place_ID=o.place_ID');
            $this->db->join('offensestd ov', 'o.oh_ID=ov.oh_ID');
            $this->db->join('Offense os', 'o.off_ID=os.off_ID');
            // $this->db->where('informer', $student);
            $query = $this->db->get();
            $showall = array();
            $showall = $query->result_array();
            //var_dump($query->result());
            //die();
            
        if($showall > 0){
            return $showall;
        }else{
            return false;
        }
    }

          
    /*
//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางstudent
    public function checkkey(){
        $S_ID = $this->input->post('S_ID');
        $this->db->where('S_ID', $S_ID);
        $query = $this->db->get('student');
        if($query->num_rows($query) == 0){
            return true;
        }
        else{
            return false;
        }
        
    }
    
        */
    
            

        public function selectscoreservice(){
            $activity=1;
            //SELECT COUNT(DISTINCT S_ID) FROM offensestd
            $this->db->select('COUNT(DISTINCT Service_ID) as numberservice');
            $this->db->from('service s');
            $this->db->where('s.activity_type1', $activity);
            
            
            // $this->db->join('offevidence ov', 'o.oh_ID=ov.oh_ID');
            //$this->db->join('offensestd os', 'ov.oh_ID=os.oh_ID');
            $query = $this->db->get();
            //var_dump($query->result());
            //die();
            if($query->num_rows() > 0){
                
                return $query->row();
            }else{
                return false;
            }
        }
        
        
        public function selectscoretraining(){
            $activity=2;
            //SELECT COUNT(DISTINCT S_ID) FROM offensestd
            $this->db->select('COUNT(DISTINCT Service_ID) as numbertraining');
            $this->db->from('service s');
            $this->db->where('s.activity_type1', $activity);
    
            
            
            
            
            
            // $this->db->join('offevidence ov', 'o.oh_ID=ov.oh_ID');
            //$this->db->join('offensestd os', 'ov.oh_ID=os.oh_ID');
            $query = $this->db->get();
            //var_dump($query->result());
            //die();
            if($query->num_rows() > 0){
                
                return $query->row();
            }else{
                return false;
            }
        }
        

    //ฟังก์ชันเพิ่มข้อมูล ลงในtable notify


  public function addnotify(){

        // var_dump($this->input->post('std_id'));
          //      die();           
                    
       $field = array(
                
                'oh_ID'=>$this->input->post('oh_ID'),
                'off_ID'=>$this->input->post('txt_off'),
                'informer'=>$this->session->userdata('student'),
                'place_ID'=>$this->input->post('place_ID'),
                'committed_date'=>$this->input->post('committed_date'),
                'committed_time'=>$this->input->post('committed_time'),
                'notifica_date'=>$this->input->post('notifica_date'),
                'explanation'=>$this->input->post('explanation')
        );
        
      
               // $this->db->set($field)->get_compiled_insert('offensehead');
                $this->db->insert('offensehead', $field);
               
               // var_dump("1");
        if($this->db->affected_rows() > 0){

            
            $field2 = array(
                'oh_ID'=>$this->input->post('oh_ID'),
                'evidenre_name'=>$this->input->post('evidenre_name'),
                'evidenre_date'=>$this->input->post('evidenre_date'),
                'explanoff'=>$this->input->post('explanoff'),
                );
            $this->db->insert('offevidence', $field2);
            //var_dump("2");

                if($this->db->affected_rows() > 0){
      
                    for ($i=0; $i < count($this->input->post('std_id[]')) ; $i++) {
                        $field3 = null;    
                        $field3 = array(
                        'oh_ID'=>$this->input->post('oh_ID'),
                        'S_ID'=>$this->input->post('std_id['.$i.']'),
                        'statusoff'=>'0',
                        );
                
                        $this->db->insert('offensestd', $field3);
                            
                    }
                    //var_dump("3");
                    //die();
                    if($this->db->affected_rows() > 0){
                        for ($i=0; $i < count($this->input->post('std_id[]')); $i++) { 
                            $field4 = null;
                           //$query = $this->db->get('offcategory');
                           /*$field4 = array(
                            'oc_ID'=>$this->input->post('txt_oc'),
                            'S_ID'=>$this->input->post('std_id['.$i.']'),
                            'num_of'=>'1',
                            );
                            //var_dump($field4);
                        $this->db->insert('offcategory', $field4);*/
                           /*$this->db->select('*');
                            $this->db->from('offcategory');
                            $this->db->where('S_ID', $this->input->post('std_id['.$i.']'));
                            $this->db->where('oc_ID', $this->input->post('oc_ID'));
                            $query = $this->db->get();*/
                            
                            $n1 = $this->input->post("txt_oc");
                            $n2 = $this->input->post('std_id['.$i.']');
                            
                            $query = $this->db->query('SELECT * 
                                                        FROM offcategory 
                                                        WHERE S_ID = '.$n2.'
                                                        AND  oc_ID = '.$n1.'
                                                        ');
                           // var_dump($query->num_rows());
                            if($query->num_rows() > 0){
                                foreach ($query->result() as $row) {
                                    $r = $row->num_of+1;
                                        $query = $this->db->query('UPDATE offcategory 
                                                                    SET num_of = '.$r.'
                                                                    WHERE oc_ID = '.$n1.' 
                                                                    AND S_ID = '.$n2.' ');
                                        //var_dump($field4);
                                        //die();
                                        //$this->db->where('S_ID', $this->input->post('std_id['.$i.']'));
                                        //$this->db->where('oc_ID', $this->input->post('oc_ID'));
                                        //$this->db->update('offcategory', $field4);
                                    //$this->db->insert('offcategory', $field4);
                                }
                                }else{
                                    $field4 = array(
                                        'oc_ID'=>$this->input->post('txt_oc'),
                                        'S_ID'=>$this->input->post('std_id['.$i.']'),
                                        'num_of'=>'1',
                                        );
                                        //var_dump($field4);
                                    $this->db->insert('offcategory', $field4);
                                } //
	                       
                        }
                        
                        if($this->db->affected_rows() > 0){
                            
                            $this->db->select('max(offensestd_ID) as maxid');
                            $this->db->from('offensestd ostd');
                            $query = $this->db->get();
                            $id = array();
                            $id = $query->result_array();

                            foreach($id as $value){
                               // echo $value['maxid'];
                                $maxid =   $value['maxid'];
                                //echo  $offensestd_ID;

                           }
                           // var_dump($maxid);
                           // die();
                            
            
                            $field5 = array(
                                'offensestd_ID'=>$maxid
                                //'evidenre_name'=>$this->input->post('evidenre_name'),
                                //'evidenre_date'=>$this->input->post('evidenre_date'),
                                //'explanoff'=>$this->input->post('explanoff'),
                                );
                            $this->db->insert('report', $field5);


                        if($this->db->affected_rows() > 0){
                             return true;
                        }else{
                            return false;
                        }
                       
                    }
                }
            }
        }
    }
                   

            

    //ฟังก์ชันแสดงข้อมูลการแก้ไข จากtable notify
    public function editnotify(){
       $id = $this->input->get('id');
        $this->db->select('*');
        $this->db->from('offensehead o');
        $this->db->join('offevidence ov', 'o.oh_ID=ov.oh_ID');
        $this->db->join('offensestd os', 'ov.oh_ID=os.oh_ID');
        $query = $this->db->get();
        //var_dump($query->result());
        //die();
        if($query->num_rows() > 0){
            
            return $query->row();
        }else{
            return false;
        }
    }
    
    function selectoffensehead(){
       $oh_ID = $this->input->get('oh_ID');
       // $oh_ID = 1;
        //$this->db->select('*');
        //$this->db->from('offensecate o');
        //$this->db->join('Offense oc', 'o.oc_ID=oc.oc_ID');
        //$this->db->where('oc_ID',$oc_ID);
        
        $query = $this->db->query('SELECT * FROM offensehead,offevidence  WHERE offensehead.oh_ID = '.$oh_ID.' AND offensehead.oh_ID=offevidence.oh_ID');
       // var_dump($query->result());
  //die();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    //ฟังก์ชันอัพเดตข้อมูลในtable notify
    public function updatenotify(){
        $id = $this->input->post('editID');

 
            $off_ID =$this->input->post('off_ID');
            $person_ID=$this->input->post('person_ID');
            $std_ID=$this->input->post('std_ID');
            $place_ID=$this->input->post('place_ID');
            $committed_date=$this->input->post('committed_date');
            $committed_time=$this->input->post('committed_time');
            $notifica_date=$this->input->post('notifica_date');
            $num_off=$this->input->post('num_off');
            $explanation=$this->input->post('explanation');
            $proof_results=$this->input->post('proof_results');
            $offeviden_ID=$this->input->post('offeviden_ID');
            $oh_ID = $this->input->post('oh_ID');
            $evidenre_name=$this->input->post('evidenre_name');
            $evidenre_date=$this->input->post('record_date');
        $this->db->query("UPDATE offensehead o 
                            INNER JOIN offevidence ov ON o.oh_ID = ov.oh_ID 
                            SET o.off_ID = '".$off_ID."', o.person_ID = '".$person_ID."', o.std_ID = '".$std_ID."', o.place_ID = '".$place_ID."',
                                o.committed_date = '".$committed_date."', o.committed_time = '".$committed_time."', o.notifica_date = '".$notifica_date."',
                                o.num_off = '".$num_off."', o.explanation = '".$explanation."',o.proof_results = '".$proof_results."', 
                                ov.offeviden_ID = '".$offeviden_ID."', ov.oh_ID = '".$oh_ID."', ov.evidenre_name = '".$evidenre_name."',
                                ov.record_date = '".$record_date."',
                            WHERE o.oh_ID = '".$oh_ID."' ");
               
        if($this->db->affected_rows() > 0){
            
            return true;
        }else{
            return false;
        }
    }
    //ฟังก์ชันลบข้อมูลในtable notify
    function deletenotify(){
            $id = $this->input->post('delID');
            $this->db->where('oh_ID', $id);
            $this->db->delete('offensehead');
        //$this->db->update('notify', $field);
        if($this->db->affected_rows() > 0){
                $this->db->where('oh_ID', $id);
                $this->db->delete('offevidence');
               
                if($this->db->affected_rows() > 0){
                    $this->db->where('oh_ID', $id);
                    $this->db->delete('offensestd');
                   
                   
               
               
                return true;
        
        
            }else{
                return false;
            }
        }
    }
    function selectplaceall()
	{
        $this->db->order_by('place_ID','ASC');
	    $query = $this->db->get('place');

        if($query->result() > 0){
                
            return $query->result();
        }else{
            return false;
        }
    }


   
    function selectplace()
	{       

        $keyword = $_POST["query"];
        $this->db->like('place_name', $keyword, 'both'); 
        $this->db->order_by('place_ID','ASC');
        
	    $query = $this->db->get('place');
	    
        if($query->result() > 0){
                
            return $query->result();
        }else{
            return false;
        }
    }


  
    
    


// select หมวดและฐานความผิด
    function selectOffenseoffevidence(){
        $oc_ID = $this->input->get('oc_ID');
        //$oc_ID = 8;
        //$this->db->select('*');
        //$this->db->from('offensecate o');
        //$this->db->join('Offense oc', 'o.oc_ID=oc.oc_ID');
        //$this->db->where('oc_ID',$oc_ID);
        
        $query = $this->db->query('SELECT * FROM offensecate,offense  WHERE offensecate.oc_ID = '.$oc_ID.' AND offensecate.oc_ID=offense.oc_ID');
        //var_dump($query->result());
  
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

 
     
    function selectstudent(){
       // $username = $this->session->userdata('username');
        //$username= $this->input->post('S_ID');
        $std_ID= $this->input->post('S_ID');
       // $std_ID = 59123456;
        /*
        $this->db->select('*');
        $this->db->from('vehiclestype vt');
        $this->db->join('vehicles v', 'vt.vetype_ID=v.vetype_ID');
        $this->db->join('student s', 'v.S_ID=s.S_ID');
        $this->db->join('curriculum c', 's.cur_ID=c.cur_ID');
        $this->db->join('divisions d', 'c.dept_ID=d.dept_ID');
        */
        
        
        $this->db->select('*');
        $this->db->from('student s');
        $this->db->join('curriculum c', 's.cur_ID=c.cur_ID');
        $this->db->join('divisions d', 'c.dept_ID=d.dept_ID');
        $this->db->where('s.S_ID',$std_ID);
        $query = $this->db->get();
        $student = array();
        $student = $query->result_array();
        


        $this->db->where('S_ID',$std_ID);
        $query = $this->db->get("vehicles");
        $student['verhicles'] = $query->result_array();
   

       /* $student = array(
            "studentID" => "",
            "stName" => ""
            "vehicles" => array("id"=>"xx","name":"xxx")
        );

  */
        if($student > 0){
            return $student;
        }else{
            return false;
        }
    }


    function selectvehiclescar(){
        $car ="รถยนต์";
         $student = $this->session->userdata('student');
        
         //echo $student;

         $this->db->select('*');
         $this->db->from('vehicles v');
         $this->db->join('vehiclestype vt', 'v.vetype_ID=vt.vetype_ID');
         //$this->db->where('vetype_name','รถยนต์ ');
         $this->db->where('S_ID', $student);
         $this->db->where('vetype_name', $car);
         $query = $this->db->get();
       // var_dump($query->result());
        
       
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
       
    }
    
    function selectvehiclesmotorcycle(){
        $motorcycle = "รถจักรยานยนต์";
        $student = $this->session->userdata('student');
        $this->db->select('*');
        $this->db->from('vehicles v');
        $this->db->join('vehiclestype vt', 'v.vetype_ID=vt.vetype_ID');
        //$this->db->where('vetype_name','รถยนต์ ');
        $this->db->where('S_ID', $student);
        $this->db->where('vetype_name', $motorcycle);
        $query = $this->db->get();
        //var_dump($query->result());
        
        
         if($query->num_rows() > 0){
         return $query->result();
         }else{
         return false;
         }
        
    }


    function selectoffensecate()
	{
	    $this->db->order_by('oc_ID','ASC');
	    $query = $this->db->get('offensecate');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
    }

    function check_id (){
        
        $query = $this->db->query('SELECT MAX(oh_ID) AS oh_ID FROM offensehead');
        
  
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }


    }


    function selectregist_num(){
        //$id='กขค123';
                $id= $this->input->post('registnumber');


         $this->db->select('*');
         $this->db->from('vehicles v');
         $this->db->join('vehiclestype vt', 'v.vetype_ID=vt.vetype_ID');
         $this->db->join('student s', 'v.S_ID=s.S_ID');
         $this->db->join('curriculum c', 's.cur_ID=c.cur_ID');
         $this->db->join('divisions d', 'c.dept_ID=d.dept_ID');
         $this->db->where('regist_num', $id);
         $query = $this->db->get();
       // var_dump($query->result());
        
       
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
       
    }


    public function selectstudentscore(){
        //$student = $this->session->userdata('student');
        //SELECT DISTINCT offensestd.S_ID,student.std_fname,student.std_lname,student.behavior_score FROM offensestd,student WHERE offensestd.S_ID=student.S_ID
        
        
        $this->db->distinct();
        $this->db->select('ostd.S_ID,s.std_fname,s.std_lname,s.behavior_score,x.prefix_name,cr.cur_name,ps.person_fname,ps.person_lname,dr.dname,dr.room_number,s.phone,s.email');
        $this->db->from('offensestd ostd');
        $this->db->order_by('s.behavior_score ASC');
        $this->db->join('student s','ostd.S_ID=s.S_ID');
        $this->db->join('prefix x','s.prefixID=x.prefixID');
        $this->db->join('curriculum cr','s.cur_ID=cr.cur_ID');
        $this->db->join('personnel ps','s.person_ID=ps.person_ID');
        $this->db->join('dormitory dr','s.dorm_ID=dr.dorm_ID');
        $query = $this->db->get();
        $student = array();
        $student = $query->result_array();
         
        if($student > 0){
            return $student;
        }else{
            return false;
        }
    }
    public function searchoffensestudent(){
        // $Student_ID = "59111111";
        $i= 0;
        // $getmonth ="09";
        // $getyear = "2019";
        $Student_ID =$_GET['getstdID'];
       // $getday =$_GET['getday'];
        //$getmonth =$_GET['getmonth'];
       // $getyear =$_GET['getyear'];
    
       
         $S_ID = $Student_ID == null ? "": $this->db->where('ostd.S_ID',$Student_ID);
       // $day = $getday == null ? "": $this->db->where('DAY(oh.committed_date)',$getday);
       // $month = $getmonth == null ? "": $this->db->where('MONTH(oh.committed_date)',$getmonth);       
       // $year = $getyear == null ? "": $this->db->where('YEAR(oh.committed_date)',$getyear);
        
           
        //$year =$_GET['getyear'];
       //SELECT offensehead.committed_date,offensehead.committed_time,offensestd.S_ID,student.std_fname , student.std_lname,offense.off_desc FROM `offensehead`,`offensestd`,`offense`,`student` WHERE  YEAR(committed_date)='2019' and offensestd.oh_ID=offensehead.oh_ID and offensehead.off_ID=offense.off_ID and offensestd.S_ID=student.S_ID
       //$query= $this->db->query("SELECT offensehead.committed_date,offensehead.committed_time,offensestd.S_ID,student.std_fname , student.std_lname,offense.off_desc FROM `offensehead`,`offensestd`,`offense`,`student` WHERE  YEAR(committed_date)='".$year."' and offensestd.oh_ID=offensehead.oh_ID and offensehead.off_ID=offense.off_ID and offensestd.S_ID=student.S_ID");
        
    
       //query จาก นศ ที่ยอมรับผิด
    //    $this->db->select('oh.committed_date,oh.committed_time,ostd.S_ID,std.std_fname , std.std_lname,o.off_desc');   
    //    $this->db->from('report rp');
    //     $this->db->join('offensestd ostd','rp.offensestd_ID=ostd.offensestd_ID');
    //    $this->db->join('offensehead oh','ostd.oh_ID=oh.oh_ID');
    //    $this->db->join('offense o','oh.off_ID=o.off_ID');
    //    $this->db->join('student std','ostd.S_ID=std.S_ID'); 
    //    $this->db->where('YEAR(oh.committed_date)',$year);
    //    $this->db->order_by('oh.committed_date ASC');
    
       $this->db->select('oh.committed_date,oh.committed_time,ostd.S_ID,std.std_fname,std.std_lname,o.off_desc,point,statusoff,behavior_score,prefix_name');   
       $this->db->from('offensestd ostd');
       $this->db->join('offensehead oh','ostd.oh_ID=oh.oh_ID');
       $this->db->join('offense o','oh.off_ID=o.off_ID');
       $this->db->join('student std','ostd.S_ID=std.S_ID'); 
       $this->db->join('prefix x','std.prefixID=x.prefixID'); 
       
       //$day;
       //$month;
      // $year;
       //$this->db->where('YEAR(oh.committed_date)',$year);
        //$this->db->order_by('oh.committed_date ASC');
        $query = $this->db->get();
        $student = array();
        $student = $query->result_array();
        foreach($student as $value){
            
            $data = $value['statusoff'];
            $status = $this->utilstatus($data);
            $student[$i]["statusoffname"] = $status;
            $i+=1;
    
        }
        
        //var_dump($student);   
       // die();     
        if($student > 0){
            return $student;
        }else{
            return false;
        }
    }  
    public function utilstatus($statusID){
    
        $data = array("รอรายงานตัว","รอการอนุมัติหลักฐาน","หมดเขตการรายงานตัวกรุณาติดต่อเจ้าหน้าที่"  ,"รอการบำเพ็ญประโยชน์","รอการรับรองกิจกรรม","เกินระยะเวลาการบำเพ็ญประโยชน์กรุณาติดต่อเจ้าหน้าที่","คืนคะแนนความประพฤติ"  );
        return $data[$statusID];
    }  
    
    function showAlll(){
        
        $i=0;
        $activity=1;
        // $this->db->select('s.service_ID,s.service_name,s.proposer,s.place,s.service_date,s.start_time,s.end_time,s.received,s.number_of,s.status,s.activity_type1,s.explanation,p.person_fname,p.person_lname,p.position,p.email,p.phone1,p.phone2');
        $this->db->select('*');
        $this->db->from('Service s');
        $this->db->join('personnel p', 's.person_ID=p.person_ID');
        $this->db->where('s.activity_type1', $activity);
        $query = $this->db->get();
        //var_dump($query->result());
        //die;
        // $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
        foreach($showall as $row){
        //    $proposer= $this->selectproposer($row['proposer']);
        // //    var_dump($proposer);
        // //    die();
        //    $showall[$i]['proposer_fname'] =  $proposer[0]['proposer_fname'];
        //    $showall[$i]['proposer_lname'] =  $proposer[0]['proposer_lname'];
        //    $showall[$i]['usertype_name'] =  $proposer[0]['usertype_name'];
            $statusname = $this->statusservice($row['status']);
            $showall[$i]['statusname'] = $statusname;
            $activity_type =$this->acticity_type($row['activity_type1']);
            $showall[$i]['activity_type_name'] = $activity_type;
            $i+=1;
        }
        
        if($query->num_rows() > 0){
            return $showall;
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
        }
    function showactity(){
        $i=0;
        $activity=2;
        // $this->db->select('s.service_ID,s.service_name,s.proposer,s.place,s.service_date,s.start_time,s.end_time,s.received,s.number_of,s.status,s.activity_type1,s.explanation,p.person_fname,p.person_lname,p.position,p.email,p.phone1,p.phone2');
        $this->db->select('*');
        $this->db->from('Service s');
        $this->db->join('personnel p', 's.person_ID=p.person_ID');
        $this->db->where('s.activity_type1', $activity);
        $query = $this->db->get();
        //var_dump($query->result());
        //die;
        // $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
        foreach($showall as $row){
        //    $proposer= $this->selectproposer($row['proposer']);
        // //    var_dump($proposer);
        // //    die();
        //    $showall[$i]['proposer_fname'] =  $proposer[0]['proposer_fname'];
        //    $showall[$i]['proposer_lname'] =  $proposer[0]['proposer_lname'];
        //    $showall[$i]['usertype_name'] =  $proposer[0]['usertype_name'];
            $statusname = $this->statusservice($row['status']);
            $showall[$i]['statusname'] = $statusname;
            $activity_type =$this->acticity_type($row['activity_type1']);
            $showall[$i]['activity_type_name'] = $activity_type;
            $i+=1;
        }
        
        if($query->num_rows() > 0){
            return $showall;
        }else{
            return false;
        }
 
     }    


     function selectActivity(){
        $discipline_officer = $this->session->userdata('username');
        $status =1;
        $i=0;
    
    
        $this->db->select('s.service_ID,s.service_name,s.proposer,s.place,s.service_date,s.start_time,s.end_time,s.received,s.number_of,s.status,s.activity_type1,s.explanation,p.person_fname,p.person_lname,p.position');
        $this->db->from('service s');
        $this->db->join('personnel p', 's.person_ID=p.person_ID');
        $this->db->where('s.status',$status);
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





