<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportChartOffencecateyearHeader extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('report_Chart_offencecate_year_header_model','report_Chart_offencecate_year_header_model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}
	
	public function template(){
	    $this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/affairs/menu_affairs');
	    $this->load->view('template/template4');
	    $this->load->view('report/header_activity_student/report_Chart_offencecate_year_header');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	    
	    
	}
	public function chart(){
	    $result = $this->report_Chart_offencecate_year_header_model->chart();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตาราง Usertype
	public function checkkey(){
	    $result = $this->report_Chart_offencecate_year_header_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
}


