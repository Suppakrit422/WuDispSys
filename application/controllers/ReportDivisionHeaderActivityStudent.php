<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDivisionHeaderActivityStudent extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('div_models', 'div_models');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}
	
	public function template(){

		$this->load->view('template/template1');
	    $this->load->view('template/template2');
		$this->load->view('menu/training/menu_training'); //ส่วนเมนู
		$this->load->view('template/template4');
		$this->load->view('report/header_activity_student/report_chart_divisions_header_activity_student');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	    
	    
	}
	public function chart(){
	    $result = $this->div_models->chart();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function chartdorm(){
	    $result = $this->div_models->chartdorm();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function chartdiv(){
	    $result = $this->div_models->chartdiv();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตาราง Usertype
	public function checkkey(){
	    $result = $this->div_models->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
}


