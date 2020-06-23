<?php

class Notifyoffense_model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->helper('url', 'form');
        $this->load->helper('directory');
        $this->load->helper('number');
    }





    //แสดงเฉพาะรายการแจ้งเหตุที่ผู้ใช้ลบ
    function spc_showoffhead()
    {
        $n = 0;
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
        $this->db->where('o.oh_ID', $id);
        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();




        foreach ($showall as $value) {
            // echo $value['offensestd_ID'];
            // $this->db->select('v.regist_num');
            // $this->db->select('*');
            // $this->db->from('verhicles');
            // $this->db->from('offensehead oh');
            //$this->db->join('offensestd ostd', 'oh.oh_ID=ostd.oh_ID');
            // $this->db->join('vehicles v', 'ostd.S_ID=v.S_ID');
            //$this->db->where('oh.oh_ID' ,$id);
            // $this->db->where('S_ID' ,$value['S_ID']);
            $id =  $value['S_ID'];

            $this->db->where('S_ID', $id);
            $query = $this->db->get("vehicles");
            $showall[$n]['verhicles'] = $query->result_array();
            //$showall[$n]['verhicles'] = $query->result_array();
            $n += 1;
        }




        //var_dump($query->result());
        //die();

        if ($showall > 0) {
            return $showall;
        } else {
            return false;
        }
    }
    public function showAll()
    {
        $student = $this->session->userdata('username');
        $this->db->select('*');
        $this->db->from('offensehead o');
        $this->db->join('place p', 'o.place_ID=p.place_ID');
        $this->db->join('offensestd ostd', 'o.oh_ID=ostd.oh_ID');
        $this->db->join('Offense os', 'o.off_ID=os.off_ID');
        $this->db->join('student s', 'ostd.S_ID=s.S_ID');
        $this->db->join('offevidence ov', 'o.oh_ID=ov.oh_ID');
        $this->db->where('o.informer', $student);
        $this->db->order_by('o.oh_ID DESC');
        $this->db->group_by('o.oh_ID','p.place_ID');

        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
        //var_dump($query->result());
        //die();

        if ($showall > 0) {
            return $showall;
        } else {
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




        
    //ฟังก์ชันเพิ่มข้อมูล ลงในtable notify
    public function addnotify()
    {
        // var_dump($this->input->post('std_id'));
        //      die();           
        //$testname = "L631";
        $testname = $this->input->post('oh_ID');
        $count = count($_FILES['myFile']['name']);
        $getfilename = [];
        for ($i = 0; $i < $count; $i++) {
            //var_dump($_FILES["myFile"]["name"][$i]);
            $changename = explode(".", $_FILES["myFile"]["name"][$i]);
            // var_dump($changename[0]);    ชื่อรูปที่ผู้ใช้ใส่
            // var_dump($changename[1]);	นามสกุลไฟล์รูปที่ผู้ใช้ใส่
            //die();

            $_FILES['userfile']['name']     = $testname . "_" . ($i + 1) . "." . $changename[1];
            $getfilename[$i] =  $_FILES['userfile']['name'];
            $_FILES['userfile']['type']     = $_FILES['myFile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['myFile']['tmp_name'][$i];
            $_FILES['userfile']['error']    = $_FILES['myFile']['error'][$i];
            $_FILES['userfile']['size']     = $_FILES['myFile']['size'][$i];
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            //$config['file_name'] = $_FILES['myFile']['name'][$i];
            // $config['max_size'] = 2000;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                //$this->load->view('upload_form', $error);
            } else {
                $final_files_data[] = $this->upload->data();
            }
        }
        $usergroup = $this->session->userdata('username');

       $off_ID = (int) $this->input->post('txt_off');
        $committed_date =$this->input->post('committed_date');
        // for ($i = 0; $i < count($this->input->post('std_id[]')); $i++) {

        //     $S_ID = $this->input->post('std_id['. $i .']');
        $S_ID = $this->input->post('std_id[0]');
        // $off_ID = 22;
        // $committed_date = "2019-10-08";
        // $S_ID = 59456789;

        $OffenseHead_oh_ID = $this->checkoh_ID($off_ID, $committed_date, $S_ID);
        // var_dump($OffenseHead_oh_ID);
        // die();
        // }   
        $field = array(

            'oh_ID' => $this->input->post('oh_ID'),
            'off_ID' => $off_ID,
            'informer' => $usergroup,
            'place_ID' => (int) $this->input->post('place_ID'),
            'committed_date' =>  $committed_date,
            'committed_time' => $this->input->post('committed_time'),
            'notifica_date' => $this->input->post('notifica_date'),
            'explanation' => $this->input->post('explanation'),
            'OffenseHead_oh_ID' => $OffenseHead_oh_ID
        );

        

        //var_dump($field);
        //die();


        // $this->db->set($field)->get_compiled_insert('offensehead');
        $this->db->insert('offensehead', $field);
    
        // var_dump("1");
        if ($this->db->affected_rows() > 0) {


            foreach ($getfilename as $row) {
                //echo $row;
                $field2 = array(
                    'oh_ID' => $this->input->post('oh_ID'),
                    'evidenre_name' => $row,
                    'evidenre_date' => $this->input->post('committed_date')
                );
                $this->db->insert('offevidence', $field2);
            }
            //    $field2 = array(
            //     'oh_ID'=>$this->input->post('oh_ID'),
            //     'evidenre_name'=>$getfilename,
            //     'evidenre_date'=>$this->input->post('committed_date')
            //     );
            //     var_dump($field2);
            // $this->db->insert('offevidence', $field2);



            if ($this->db->affected_rows() > 0) {

                for ($i = 0; $i < count($this->input->post('std_id[]')); $i++) {
                    $field3 = null;
                    $field3 = array(
                        'oh_ID' => $this->input->post('oh_ID'),
                        'S_ID' => $this->input->post('std_id[' . $i . ']'),
                        'statusoff' => '0',
                    );

                    $this->db->insert('offensestd', $field3);
                }
                //var_dump("3");
                //die();
               // if ($this->db->affected_rows() > 0) {
                    // for ($i = 0; $i < count($this->input->post('std_id[]')); $i++) {
                    //     $field4 = null;

                    //     $n1 = $this->input->post("txt_oc");
                    //     $n2 = $this->input->post('std_id[' . $i . ']');

                    //     $query = $this->db->query('SELECT * 
                    //                                     FROM offcategory 
                    //                                     WHERE S_ID = ' . $n2 . '
                    //                                     AND  oc_ID = ' . $n1 . '
                    //                                     ');
                        // var_dump($query->num_rows());
                    //     if ($query->num_rows() > 0) {
                    //         foreach ($query->result() as $row) {
                    //             $r = $row->num_of + 1;
                    //             $query = $this->db->query('UPDATE offcategory 
                    //                                                 SET num_of = ' . $r . '
                    //                                                 WHERE oc_ID = ' . $n1 . ' 
                    //                                                 AND S_ID = ' . $n2 . ' ');
                    //             //var_dump($field4);
                    //             //die();
                    //             //$this->db->where('S_ID', $this->input->post('std_id['.$i.']'));
                    //             //$this->db->where('oc_ID', $this->input->post('oc_ID'));
                    //             //$this->db->update('offcategory', $field4);
                    //             //$this->db->insert('offcategory', $field4);
                    //         }
                    //     // } else {
                    //     //     $field4 = array(
                    //     //         'oc_ID' => $this->input->post('txt_oc'),
                    //     //         'S_ID' => $this->input->post('std_id[' . $i . ']'),
                    //     //         'num_of' => '1',
                    //     //     );
                    //     //     //var_dump($field4);
                    //     //     $this->db->insert('offcategory', $field4);
                    //     // } //

                    // }

                    if ($this->db->affected_rows() > 0) {
                        for ($i = 0; $i < count($this->input->post('std_id[]')); $i++) {

                            $std = $this->input->post('std_id[' . $i . ']');
                            // var_dump($std);
                            // $this->db->select('offensestd_ID');
                            // $this->db->from('offensestd');
                            // $this->db->where('S_ID', $std);
                            $this->db->select('offensestd_ID');
                            $this->db->from('offensestd ostd');
                            $this->db->where('ostd.S_ID', $std);
                            // $this->db->orderby('offensestd_ID');
                            $this->db->order_by('ostd.offensestd_ID','DESC');
                            $this->db->limit(1);  

                            $query = $this->db->get();
                            // $id = array();
                            // $id = $query->result_array();
                            // var_dump($query->result());

                            foreach ($query->result() as $row) {
                                $ostd = $row->offensestd_ID;
                            }

                            $field5 = array(
                                'offensestd_ID' => $ostd,
                                'report_date' => $this->input->post('notifica_date')
                                //'explanoff'=>$this->input->post('explanoff'),
                            );
                    
                            $this->db->insert('report', $field5);
                    }
                    if ($this->db->affected_rows() > 0) {
                        for ($i = 0; $i < count($this->input->post('std_id[]')); $i++) {

                            $std = $this->input->post('std_id[' . $i . ']');
                            $this->db->select('*');
                            $this->db->from('student');
                            $this->db->where('S_ID', $std);

                            // $query = $this->db->query("SELECT behavior_score FROM student WHERE S_ID = '.$std.'");
                            $query = $this->db->get();
                            // var_dump($query->result());
                            // $sumpoint = ;
                            $behavior_score = 0;
                            $sumpoint = 0;
                            foreach ($query->result() as $row) {
                                $behavior_score = $row->behavior_score + 0;
                                $sumpoint = $row->behavior_score - 5;
                            }
                            
                            $field7 = array(
                                'S_ID' => $this->input->post('std_id[' . $i . ']'),
                                'before_score' => $behavior_score,
                                'after_score' => $sumpoint,
                                'date' =>$this->input->post('notifica_date'),
                                'explanation' => $this->input->post('explanation'),
                                'informer' => $usergroup
                            );
                            //echo "field6";
                            //var_dump($field6);

                            $this->db->insert('getlog', $field7);
                        }
                        


                        if ($this->db->affected_rows() > 0) {
                            for ($i = 0; $i < count($this->input->post('std_id[]')); $i++) {

                                $std = $this->input->post('std_id[' . $i . ']');
                                $this->db->select('*');
                                $this->db->from('student');
                                $this->db->where('S_ID', $std);

                                // $query = $this->db->query("SELECT behavior_score FROM student WHERE S_ID = '.$std.'");
                                $query = $this->db->get();
                                // var_dump($query->result());
                                $sumpoint = 0;
                                if($OffenseHead_oh_ID == ""){
                                foreach ($query->result() as $row) {
                                    $sumpoint = $row->behavior_score - 5;
                                }
                                //echo "foreach";
                                //var_dump($sumpoint);
                                // for ($i=0; $i < count($this->input->post('std_id[]')); $i++) { 
                                // $field6 = null;
                                // $std = $this->input->post('std_id['.$i.']');
                                $field6 = array(
                                    'behavior_score' => $sumpoint,

                                );
                                //echo "field6";
                                //var_dump($field6);

                                $this->db->where('S_ID', $std);
                                $this->db->update('student', $field6);
                            }
                            }


                            if ($this->db->affected_rows() > 0) {
                                


//                                 require 'phpmailer/PHPMailerAutoload.php'; 

//     // header('Content-Type: text/html; charset=utf-8');
//     for ($i = 0; $i < count($this->input->post('std_id[]')); $i++) {
//         $std = $this->input->post('std_id[' . $i . ']');
//         $this->db->select('s.email');
//          $this->db->from('student s');
//          $this->db->where('s.S_ID', $std);
//          $query = $this->db->get();
//          $student = array();
//          $student = $query->result_array();
//          $emailstd = $student[0]['email'];
    
//     $mail = new PHPMailer;
//     $mail->CharSet = "utf-8";
//     $mail->isSMTP();
//     $mail->Host = 'smtp.gmail.com';
//     $mail->Port = 587;
//     $mail->SMTPSecure = 'tls';
//     $mail->SMTPAuth = true;
    
    
//     $gmail_username = "wusystem2020@gmail.com"; // gmail ที่ใช้ส่ง
//     $gmail_password = "wusystemtest2020"; // รหัสผ่าน gmail
//     // ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1
    
    
//     $sender = "WUSYSTEM"; // ชื่อผู้ส่ง
//     $email_sender = "wusystem2020@gmail.com"; // เมล์ผู้ส่ง 
    
//     $email_receiver =  $emailstd; // เมล์ผู้รับ ***
    
//     $subject = "ทดสอบระบบ WU "; // หัวข้อเมล์
    
    
//     $mail->Username = $gmail_username;
//     $mail->Password = $gmail_password;
//     $mail->setFrom($email_sender, $sender);
//     $mail->addAddress($email_receiver);
//     $mail->Subject = $subject;
    
//     $email_content = "โดนหักคะแนนแล้วจ้า";
    
//     //  ถ้ามี email ผู้รับ
//     if($email_receiver){
//         $mail->msgHTML($email_content);
//         if (!$mail->send()) {  // สั่งให้ส่ง email
//             return true;
//             // กรณีส่ง email ไม่สำเร็จ
//            // echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
//             //echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
//         }else{
//             return true;
//             // กรณีส่ง email สำเร็จ
//            // echo "ระบบได้ส่งข้อความไปเรียบร้อย";
//         }	
//     }
// }
                                
                                return true;
   
                            } else {
                                return false;
                            }
                        }
                    }
               }
            }
        }
    }



    function checkoh_ID($off_ID,$committed_date,$S_ID){
        $this->db->select('*');
        $this->db->from('offensehead oh');
        $this->db->join('offensestd ostd', 'oh.oh_ID=ostd.oh_ID');
        $this->db->where('oh.off_ID',$off_ID);
        $this->db->where('oh.committed_date',$committed_date);
        $this->db->where('oh.OffenseHead_oh_ID',"");
        $this->db->where('ostd.S_ID', $S_ID);
        $query = $this->db->get();
        $showall = array();
        $showall = $query->result_array();
        if($showall == null){
            $oh_ID = "";
        }else{
        $oh_ID = $showall[0]["oh_ID"];
         }
        //var_dump($showall);
        return $oh_ID;
    }

function testemail(){

    require 'phpmailer/PHPMailerAutoload.php'; 

    header('Content-Type: text/html; charset=utf-8');
    // for ($i = 0; $i < count($this->input->post('std_id[]')); $i++) {
    //     $std = $this->input->post('std_id[' . $i . ']');
    //     $this->db->select('s.email');
    //      $this->db->from('student s');
    //      $this->db->where('s.S_ID', $std);
    //      $query = $this->db->get();
    //      $student = array();
    //      $student = $query->result_array();
    //      $emailstd = $student[0]['email'];
    
    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    
    
    $gmail_username = "wusystem2020@gmail.com"; // gmail ที่ใช้ส่ง
    $gmail_password = "wusystemtest2020"; // รหัสผ่าน gmail
    // ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1
    
    
    $sender = "WUSYSTEM"; // ชื่อผู้ส่ง
    $email_sender = "wusystem2020@gmail.com"; // เมล์ผู้ส่ง 
    
    $email_receiver = "Guppiya80130@hotmail.com"; // เมล์ผู้รับ ***
    
    $subject = "ระบบวินัยนักศึกษา WU "; // หัวข้อเมล์
    
    
    $mail->Username = $gmail_username;
    $mail->Password = $gmail_password;
    $mail->setFrom($email_sender, $sender);
    $mail->addAddress($email_receiver);
    $mail->Subject = $subject;
    
    $email_content = "โดนหักคะแนนความประพฤติ กรุณาตรวจสอบในระบบ";
    
    //  ถ้ามี email ผู้รับ
    if($email_receiver){
        $mail->msgHTML($email_content);
    
    
        if (!$mail->send()) {  // สั่งให้ส่ง email
    
            // กรณีส่ง email ไม่สำเร็จ
            echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
            echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
        }else{
            // กรณีส่ง email สำเร็จ
            echo "ระบบได้ส่งข้อความไปเรียบร้อย";
        }	
    }
    //}
}


    //test
    // public function testt(){
    //     $id=59123456;
    //     // $query = $this->db->query("SELECT behavior_score FROM student where S_ID='59123456'");
    //     $this->db->select('behavior_score');
    //     $this->db->from('student');
    //     $this->db->where('S_ID',$id);

    //     // $query = $this->db->get();

    //             foreach ($query->result() as $row) {
    //                 $sumpoint = $row->behavior_score-5;

    //             }
    //             $field6 = array(
    //                 'behavior_score'=>$sumpoint,

    //                 );

    //             $this->db->where('S_ID',$id);
    //             $this->db->update('student',$field6);

    //     if($query->num_rows() > 0){

    //         return $query->row();
    //     }else{
    //         return false;
    //     }

    //         }





    //ฟังก์ชันแสดงข้อมูลการแก้ไข จากtable notify
    public function editnotify()
    {
        $id = $this->input->get('id');
        $this->db->select('*');
        $this->db->from('offensehead o');
        $this->db->join('offevidence ov', 'o.oh_ID=ov.oh_ID');
        $this->db->join('offensestd os', 'ov.oh_ID=os.oh_ID');
        $query = $this->db->get();
        //var_dump($query->result());
        //die();
        if ($query->num_rows() > 0) {

            return $query->row();
        } else {
            return false;
        }
    }

    function selectoffensehead()
    {
        $oh_ID = $this->input->get('oh_ID');
        // $oh_ID = 1;
        //$this->db->select('*');
        //$this->db->from('offensecate o');
        //$this->db->join('Offense oc', 'o.oc_ID=oc.oc_ID');
        //$this->db->where('oc_ID',$oc_ID);

        $query = $this->db->query('SELECT * FROM offensehead,offevidence  WHERE offensehead.oh_ID = ' . $oh_ID . ' AND offensehead.oh_ID=offevidence.oh_ID');
        // var_dump($query->result());
        //die();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    //ฟังก์ชันอัพเดตข้อมูลในtable notify
    public function updatenotify()
    {
        $id = $this->input->post('editID');


        $off_ID = $this->input->post('off_ID');
        $person_ID = $this->input->post('person_ID');
        $std_ID = $this->input->post('std_ID');
        $place_ID = $this->input->post('place_ID');
        $committed_date = $this->input->post('committed_date');
        $committed_time = $this->input->post('committed_time');
        $notifica_date = $this->input->post('notifica_date');
        $num_off = $this->input->post('num_off');
        $explanation = $this->input->post('explanation');
        $proof_results = $this->input->post('proof_results');
        $offeviden_ID = $this->input->post('offeviden_ID');
        $oh_ID = $this->input->post('oh_ID');
        $evidenre_name = $this->input->post('evidenre_name');
        // $evidenre_date=$this->input->post('record_date');
        $this->db->query("UPDATE offensehead o 
                            INNER JOIN offevidence ov ON o.oh_ID = ov.oh_ID 
                            SET o.off_ID = '" . $off_ID . "', o.person_ID = '" . $person_ID . "', o.std_ID = '" . $std_ID . "', o.place_ID = '" . $place_ID . "',
                                o.committed_date = '" . $committed_date . "', o.committed_time = '" . $committed_time . "', o.notifica_date = '" . $notifica_date . "',
                                o.num_off = '" . $num_off . "', o.explanation = '" . $explanation . "',o.proof_results = '" . $proof_results . "', 
                                ov.offeviden_ID = '" . $offeviden_ID . "', ov.oh_ID = '" . $oh_ID . "', ov.evidenre_name = '" . $evidenre_name . "',
                                ov.record_date = '" . $evidenre_name . "',
                            WHERE o.oh_ID = '" . $oh_ID . "' ");

        if ($this->db->affected_rows() > 0) {

            return true;
        } else {
            return false;
        }
    }
    //ฟังก์ชันลบข้อมูลในtable notify
    function deletenotify()
    {
        $id = $this->input->post('delID');
        $this->db->where('oh_ID', $id);
        $this->db->delete('offensehead');
        //$this->db->update('notify', $field);
        if ($this->db->affected_rows() > 0) {
            $this->db->where('oh_ID', $id);
            $this->db->delete('offevidence');

            if ($this->db->affected_rows() > 0) {
                $this->db->where('oh_ID', $id);
                $this->db->delete('offensestd');




                return true;
            } else {
                return false;
            }
        }
    }
    function selectplaceall()
    {
        $this->db->order_by('place_ID', 'ASC');
        $query = $this->db->get('place');

        if ($query->result() > 0) {

            return $query->result();
        } else {
            return false;
        }
    }



    function selectplace()
    {

        $keyword = $_POST["query"];
        $this->db->like('place_name', $keyword, 'both');
        $this->db->order_by('place_ID', 'ASC');

        $query = $this->db->get('place');

        if ($query->result() > 0) {

            return $query->result();
        } else {
            return false;
        }
    }







    // select หมวดและฐานความผิด
    function selectOffenseoffevidence()
    {
        $oc_ID = $this->input->get('oc_ID');
        //$oc_ID = 8;
        //$this->db->select('*');
        //$this->db->from('offensecate o');
        //$this->db->join('Offense oc', 'o.oc_ID=oc.oc_ID');
        //$this->db->where('oc_ID',$oc_ID);

        $query = $this->db->query('SELECT * FROM offensecate,offense  WHERE offensecate.oc_ID = ' . $oc_ID . ' AND offensecate.oc_ID=offense.oc_ID');
        //var_dump($query->result());

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }



    function selectstudent()
    {
        // $username = $this->session->userdata('username');
        //$username= $this->input->post('S_ID');
        $std_ID = $this->input->post('S_ID');
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
        $this->db->where('s.S_ID', $std_ID);
        $query = $this->db->get();
        $student = array();
        $student = $query->result_array();



        $this->db->where('S_ID', $std_ID);
        $query = $this->db->get("vehicles");
        $student['verhicles'] = $query->result_array();


        /* $student = array(
            "studentID" => "",
            "stName" => ""
            "vehicles" => array("id"=>"xx","name":"xxx")
        );

  */
        if ($student > 0) {
            return $student;
        } else {
            return false;
        }
    }


    function selectvehiclescar()
    {
        $car = "รถยนต์";
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


        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function selectvehiclesmotorcycle()
    {
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


        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    function selectoffensecate()
    {
        $this->db->order_by('oc_ID', 'ASC');
        $query = $this->db->get('offensecate');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function check_id()
    {

        $query = $this->db->query('SELECT MAX(oh_ID) AS oh_ID FROM offensehead');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function selectregist_num()
    {
        //$id='กขค123';
        $id = $this->input->post('registnumber');


        $this->db->select('*');
        $this->db->from('vehicles v');
        $this->db->join('vehiclestype vt', 'v.vetype_ID=vt.vetype_ID');
        $this->db->join('student s', 'v.S_ID=s.S_ID');
        $this->db->join('curriculum c', 's.cur_ID=c.cur_ID');
        $this->db->join('divisions d', 'c.dept_ID=d.dept_ID');
        $this->db->where('regist_num', $id);
        $query = $this->db->get();
        // var_dump($query->result());


        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
