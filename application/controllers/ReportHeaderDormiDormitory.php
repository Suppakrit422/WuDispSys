<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportHeaderDormiDormitory extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('dormad_model', 'dormad_model');
		$this->load->model('getOffenseCate_model', 'getOffenseCate_model'); //เปลี่ยน //model สร้างฟังชั่นเลือก
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
	    $this->load->view('menu/Dormitory_advisor/menu_user_dormitory_advisor');
	    $this->load->view('template/template4');
	    $this->load->view('report/header_dormitory/report_chart_dorm');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
		
	    $result = $this->offd_model->showAll();
		echo json_encode($result);
	}
	public function getDORM_ID()
	{
	    $result = $this->offd_model->getDORM_ID();
		echo json_encode($result);
	}
	
	public function checkkey(){
	    $result = $this->offd_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	public function getGraphData(){
		$result = $this->offc_model->getGraphData();
		echo json_encode($result);
	}
}
