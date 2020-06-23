<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportChartDivisions extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('dean_dv_model', 'dean_dv_model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}
	
	public function template(){
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/Dean/menu_user_dean');
		$this->load->view('template/template4');
		$this->load->view('report/dean/report_chart_divi');
		//$this->load->view('Test');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	    
	    
	}
	public function chart(){
	    $result = $this->dean_dv_model->chart();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function chartdorm(){
	    $result = $this->dean_dv_model->chartdorm();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function chartdiv(){
	    $result = $this->dean_dv_model->chartdiv();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function chartdivinfo(){
	    $result = $this->dean_dv_model->chartdivinfo();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตาราง Usertype
	public function checkkey(){
	    $result = $this->dean_dv_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
}


