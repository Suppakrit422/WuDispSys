<?php
require_once('Student_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteer_regis extends Student_dashboard {

	function __construct(){
        parent:: __construct();
        $this->load->model('Volunteer_regis_model', 'Volunteer_regis_model');
    }
    public function index()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->checkAutoriry();
        $this->template();
        
    }
    
	
	public function template()
	{
	    
	    //List ข้อมูลมาแสดงในหน้าจอ
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
		$this->load->view('menu/student/menu_user_student');
		$this->load->view('template/template4');
	    $this->load->view('student/VolunteerAc/view_regis_volunteer');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	}

	public function showAll(){
		$result = $this->Volunteer_regis_model->showAll();
		echo json_encode($result);
	}


	public function show_whereid(){
		$result = $this->Volunteer_regis_model->show_whereid();
		echo json_encode($result);
	}
	
	function regisnotify(){
		$result = $this->Volunteer_regis_model->regisnotify();
		echo json_encode($result);
	}

	function wherecheck(){
		$result = $this->Volunteer_regis_model->wherecheck();
		echo json_encode($result);
	}
	
    


    
	
	

}
