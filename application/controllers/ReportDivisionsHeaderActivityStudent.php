<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportDivisionsHeaderActivityStudent extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('dv_model', 'dv_model');
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
		$this->load->view('menu/training/menu_training'); //ส่วนเมนู
		$this->load->view('template/template4');
		$this->load->view('report/header_activity_student/report_chart_divisions_header_activity_student');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll(){
	    $result = $this->dv_model->showAll();
		echo json_encode($result);
	}
	
	
	public function checkkey(){
	    $result = $this->dv_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	public function getdept_ID()
	{
	    $result = $this->dv_model->getdept_ID();
		echo json_encode($result);
	}
	public function getGraphData(){
		$result = $this->dv_model->getGraphData();
		echo json_encode($result);
	}
}
    
