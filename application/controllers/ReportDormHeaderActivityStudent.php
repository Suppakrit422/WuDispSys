<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportDormHeaderActivityStudent extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('dmt_model', 'dmt_model');
		$this->load->model('getOffenseCate_model', 'getOffenseCate_model');
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
		$this->load->view('menu/training/menu_training');
		$this->load->view('template/template4');
		//$this->load->view('student/notify/notify_page');
		//$this->load->view('student/notify/NotifyUserStudentPage');
		$this->load->view('report/header_activity_student/report_data_dormitory_header_activity_student');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
	    $result = $this->dmt_model->showAll();
		echo json_encode($result);
	}
	public function getDORM_ID()
	{
	    $result = $this->dmt_model->getDORM_ID();
		echo json_encode($result);
	}
	public function checkkey(){
	    $result = $this->dmt_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
    
}
