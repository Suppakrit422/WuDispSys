<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class headofstudent_training extends CI_Controller {
    function __construct(){
        parent:: __construct();
		$this->load->model('headofstudent_training_model', 'headofstudent_training_model');
		$this->load->model('SettimeSession','SettimeSession');
    }


	public function index()
	{
	    $this->checkAutoriry();
	    $this->template();

	}
	
	public function template()
	{
	    
	    //List ข้อมูลมาแสดงในหน้าจอ
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
		$this->load->view('menu/training/menu_training'); //ส่วนเมนู
		$this->load->view('template/template4');
		$this->load->view('headofstudent_affairs/firstpage/firstpage');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	}
	
	public function showall(){
		$result = $this->headofstudent_training_model->showall();
		echo json_encode($result);
        
	}	
	
	public function selecttraining(){
		$result = $this->headofstudent_training_model->selecttraining();
		echo json_encode($result);
        
	}
	public function selectoffensecate(){
		$result = $this->headofstudent_training_model->selectoffensecate();
		echo json_encode($result);
        
	}
	public function tableprint(){
		$result = $this->headofstudent_training_model->tableprint();
		echo json_encode($result);
        
    }
	
	public function addtraining(){
		$result = $this->headofstudent_training_model->addtraining();
		echo json_encode($result);
        
	}
	public function deletetraining(){
		$result = $this->headofstudent_training_model->deletetraining();
		echo json_encode($result);
        
    }
	
	
	function checkAutoriry() {
	    //$admin = $this->session->userdata('admin');
	    // $student = $this->session->userdata('student');
	    //echo $username;
	    // die();
	    
		// $this->session->mark_as_temp('login',1800);
		$this->SettimeSession->SetTime();
		
	    if($this->session->userdata('login') == true){
			
	        if($this->session->userdata('autority') == "admin"){
	            redirect(base_url() . 'index.php/Admin_dashboard');
	        }
	       
	        if($this->session->userdata('autority') == "student"){
	            redirect(base_url() . 'index.php/Student_dashboard');
	        }
	        
	        if($this->session->userdata('autority') == "teacher"){
	            redirect(base_url() . 'index.php/Teacher_dashboard');
            }
            
			if($this->session->userdata('autority') == "discipline_officer"){
	            redirect(base_url() . 'index.php/Discipline_officer_dashboard');
            }

            if($this->session->userdata('autority') == "dormitory_supervisor"){
	            redirect(base_url() . 'index.php/Dormitory_supervisor_dashboard');
			}
			
			if($this->session->userdata('autority') == "dormitory_advisor"){
	            redirect(base_url() . 'index.php/Dormitory_advisor_dashboard');
			}

			if($this->session->userdata('autority') == "branch_head"){
	            redirect(base_url() . 'index.php/Branch_head_dashboard');
			}

			if($this->session->userdata('autority') == "dean"){
	            redirect(base_url() . 'index.php/Dean_dashboard');
			}

			if($this->session->userdata('autority') == "security_guard"){
	            redirect(base_url() . 'index.php/Security_guard_dashboard');
			}

			if($this->session->userdata('autority') == "employee"){
	            redirect(base_url() . 'index.php/Employee_dashboard');
			}
            
	    }else{
	        redirect(base_url() . 'index.php/Loginuser');
	        
	        
	    }
	    
	    
	    
	}

	public function new()
	{
	    //แสดงหน้าจอ form สำหรับบันทึกข้อมูลใหม่
	}

	public function addnew()
	{
	    //รับข้อมูลจาก form  insert ลง DB
	}

	public function edit()
	{
	    //แสดงหน้าจอ form สำแก้ไขข้อมูลใหม่
	}

	public function update()
	{
	    //รับข้อมูลจาก form  update ลง DB
	}
}
