<?php
require_once('Student_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class FileActivityStudent extends Student_dashboard {
    function __construct(){
        parent:: __construct();
        $this->load->model('FileActivityStudent_model', 'FileActivityStudent_model');
    }
    public function index()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->checkAutoriry();
        $this->template();
        
    }
    
    
    public function template(){
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/student/menu_user_student'); //ส่วนเมนู
        $this->load->view('template/template4');
        $this->load->view('student/VolunteerAc/view_file_activity_student');//ส่วนเนื้อหา
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
        
        
    }

    public function selectparticipationactivities(){
		$result = $this->FileActivityStudent_model->selectparticipationactivities();
		echo json_encode($result);
    }
    
    public function Updatefileparticipationactivities(){
		$result = $this->FileActivityStudent_model->Updatefileparticipationactivities();
		echo json_encode($result);
    }
    
    public function test()
	{
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		die;
	}


}

