<?php
require_once('Student_dashboard.php');
defined('BASEPATH') or exit('No direct script access allowed');

class Notifyoffense extends Student_dashboard
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
		$this->load->view('menu/student/menu_user_student');
		$this->load->view('template/template4');
		$this->load->view('student/notify/NotifyUserStudentPage');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
		$result = $this->Notifyoffense_model->showAll();
		echo json_encode($result);
	}
	public function testemail()
	{
		$result = $this->Notifyoffense_model->testemail();
		echo json_encode($result);
	}

	public function testt()
	{
		$result = $this->Notifyoffense_model->testt();
		echo json_encode($result);
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
