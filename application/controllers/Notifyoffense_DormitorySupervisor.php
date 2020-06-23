<?php
require_once('Dormitory_supervisor_dashboard.php');
defined('BASEPATH') or exit('No direct script access allowed');

class Notifyoffense_DormitorySupervisor extends Dormitory_supervisor_dashboard
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Notifyoffense_model', 'Notifyoffense_model');
	}



	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
		$this->template();
		$this->checkAutoriry();
	}




	public function template()
	{
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/DormitortSupervisor/menu_user_dormsupervisor');
		$this->load->view('template/template4');
		//$this->load->view('student/notify/notify_page');
		//$this->load->view('student/notify/NotifyUserStudentPage');
		$this->load->view('student/notify/blank');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
		$result = $this->Notifyoffense_model->showAll();
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
            
            if($this->session->userdata('autority') == "headofstudent_affairs"){
	            redirect(base_url() . 'index.php/Headofstudent_affairs_dashboard');
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

	//ฟังก์ชันเพิ่มข้อมูล เมื่อเพิ่มข้อมูลเสร็จสิ้นจะแสดงข้อความ เพิ่มข้อมูลเรียบร้อย
	public function addnotify()
	{
		 $result = $this->Notifyoffense_model->addnotify();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		/*
		
		if($result){
		    $msg['success'] = true;
		    
		    
		}else{
		    $msg['success'] = false;
		    redirect(base_url() . 'index.php/notify_page/index');
		}*/
		 echo json_encode($result);
	}

	public function test()
	{
			echo "<pre>";
			print_r($_POST);
			print_r($_FILES);   
			echo "</pre>";  
		die;

	}

	//ฟังก์ชันแสดงการแก้ไขข้อมูล
	public function editnotify()
	{

		$result = $this->Notifyoffense_model->editnotify();
		echo json_encode($result);
	}

	//ฟังก์ชันการอัพเดตข้อมูล เมื่ออัพเดตข้อมูลเสร็จสิ้นจะแสดงข้อความ แก้ไขข้อมูลเรียบร้อย
	public function updatenotify()
	{
		$result = $this->Notifyoffense_model->updatenotify();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if ($result) {
			$msg['success'] = true;
		} else {
			$msg['success'] = false;
			redirect(base_url() . 'index.php/notify_page/index');
		}
		echo json_encode($msg);
	}

	//ฟังก์ชันการลบข้อมูล เมื่อลบข้อมูลเสร็จสิ้นจะแสดงข้อความ ลบข้อมูลเรียบร้อย
	public function deletenotify()
	{
		$result = $this->Notifyoffense_model->deletenotify();
		/*
		if($result){
		    $msg['success'] = true;     
		}else{
		    $msg['success'] = false;
		    redirect(base_url() . 'index.php/notify_page/index');
		}*/
		//echo json_encode();
		echo "";
	}
	function selectstudent()
	{
		$result =  $this->Notifyoffense_model->selectstudent();
		echo json_encode($result);
	}

	function selectplace()
	{


		$result = $this->Notifyoffense_model->selectplace();
		echo json_encode($result);
	}
	function selectvehicles()
	{


		$result = $this->Notifyoffense_model->selectvehicles();

		echo json_encode($result);
	}
	function selectoffevidence()
	{


		$result = $this->Notifyoffense_model->selectoffevidence();

		echo json_encode($result);
	}
	function selectoffensecate()
	{


		$result = $this->Notifyoffense_model->selectoffensecate();

		echo json_encode($result);
	}


	function selectOffenseoffevidence()
	{


		$result = $this->Notifyoffense_model->selectOffenseoffevidence();
		//print_r($result);
		echo json_encode($result);
	}

	function spc_showoffhead()
	{
		$result = $this->Notifyoffense_model->spc_showoffhead();
		echo json_encode($result);
	}

	function check_id()
	{
		//เช็คค่า id ที่มากสุด
		$result = $this->Notifyoffense_model->check_id();
		echo json_encode($result);
		//ยังไม่ได้เขียน model
	}


	function selectplaceall()
	{
		//เช็คค่า id ที่มากสุด
		$result = $this->Notifyoffense_model->selectplaceall();
		echo json_encode($result);
		//ยังไม่ได้เขียน model
	}
	function selectregist_num()
	{
		$result = $this->Notifyoffense_model->selectregist_num();
		echo json_encode($result);
	}
}
