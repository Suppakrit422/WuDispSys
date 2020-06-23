<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportDeanDivisions extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('dean_div_model', 'dean_div_model');
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
		$this->load->view('menu/Dean/menu_user_dean');
		$this->load->view('template/template4');
		$this->load->view('report/dean/report_data_divisions');
		//$this->load->view('Test');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	    
	    
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
		
	    $result = $this->dean_div_model->showAll();
		echo json_encode($result);
	}
	
	
	public function checkkey(){
	    $result = $this->dean_div_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	public function getGraphData(){
		$result = $this->dean_div_model->getGraphData();
		echo json_encode($result);
	}
}
