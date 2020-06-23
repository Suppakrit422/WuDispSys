<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportTeacher extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('teacher_model', 'teacher_model');
		//$this->load->model('getOffenseCate_model', 'getOffenseCate_model'); //เปลี่ยน //model สร้างฟังชั่นเลือก
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}



	public function template()
	{
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/Teacher/menu_user_teacher');
		$this->load->view('template/template4');
		//$this->load->view('teacher/firstpage');
		$this->load->view('report/teacher/report_data_teacher');
		//$this->load->view('teacher/VolunteerAc/test');
		//$this->load->view('teacher/VolunteerAc/AcceptActivityOffVolunteer');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
		//$cur_ID = $this->input->post('cur_ID');
		//$off_ID =  $this->input->post('off_ID');
	    $result = $this->teacher_model->showAll();
		echo json_encode($result);
	}
	
	
	
	public function checkkey(){
	    $result = $this->teacher_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	public function getGraphData(){
		$result = $this->teacher_model->getGraphData();
		echo json_encode($result);
	}
}
