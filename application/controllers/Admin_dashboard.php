<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_dashboard extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('admin_dashboard_model', 'admin_dashboard_model');
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
		$this->load->view('menu/admin/menu_user_admin');
		$this->load->view('template/template4');
		$this->load->view('admin/firstpage');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	}

	function selectstudentname() {
		$result = $this->admin_dashboard_model->selectstudentname();
	    echo json_encode($result);


	}



	
	
	function checkAutoriry() {
	 
	    
		//$this->session->mark_as_temp('login',1800);
		$this->SettimeSession->SetTime();

	    if($this->session->userdata('login') == true){
	        
	       
	        if($this->session->userdata('autority') == "student"){
	            redirect(base_url() . 'index.php/Student_dashboard');
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
