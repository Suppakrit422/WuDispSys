<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_dashboard extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('student_dashboard_model', 'model');
		$this->load->model('SettimeSession','SettimeSession');
		$this->load->model('ServiceProfile','ServiceProfile');
	}

	public function index()
	{
	    
	    $this->checkAutoriry();
	    $this->template();

	}
	
	public function template(){
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
		$this->load->view('menu/student/menu_user_student');
		$this->load->view('template/template4');
		$this->load->view('student/StudentPersonal/std_infopage');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	}
	
	function selectstudentstatus(){
	    //  $username = $this->session->userdata('username');
	    
	    $result = $this->model->selectstudentstatus();
	    echo json_encode($result);
	}


	//Check user login
	function selectfname_lname(){
	    $result = $this->ServiceProfile->selectfname_lname();
	    echo json_encode($result);
	}


	function selectstudentfirstpage(){
	    //  $username = $this->session->userdata('username');
	    
	    $result = $this->model->selectstudentfirstpage();
	    echo json_encode($result);
	}
	
	function selectdetailfirstpage(){
	    //  $username = $this->session->userdata('username');
	    
	    $result = $this->model->selectdetailfirstpage();
	    echo json_encode($result);
	}

	function selectstudentpoint(){
	    
	    
	    $result = $this->model->selectstudentpoint();
	    echo json_encode($result);
	}

	function selectstudentname(){
	    
	    
	    $result = $this->model->selectstudentname();
	    echo json_encode($result);
	}
	/*
	function selectstudent(){
	   // $username = $this->session->userdata('username');
	   // echo $username;
	    
	    $result = $this->model->selectstudent();
	    //var_dump($result);
	    echo json_encode($result);
	}
*/
	
	function checkAutoriry() {

	    
		// $this->session->mark_as_temp('login',1800);
		$this->SettimeSession->SetTime();
		
	    if($this->session->userdata('login') == true){
 
	        if($this->session->userdata('autority') == "admin"){
	            redirect(base_url() . 'index.php/Admin_dashboard');
	            }
	            
	            if($this->session->userdata('autority') == "teacher"){
	                redirect(base_url() . 'index.php/Teacher_dashboard');
				}

				if($this->session->userdata('autority') == "discipline_officer"){
					redirect(base_url() . 'index.php/Discipline_officer_dashboard');
				}

				if($this->session->userdata('autority') == "headofstudent_affairs"){
					redirect(base_url() . 'index.php/Headofstudent_affairs_dashboard');
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
}